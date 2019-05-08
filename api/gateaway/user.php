<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/core.php';
include_once '../libs/php-jwt/src/BeforeValidException.php';
include_once '../libs/php-jwt/src/ExpiredException.php';
include_once '../libs/php-jwt/src/SignatureInvalidException.php';
include_once '../libs/php-jwt/src/JWT.php';
use \Firebase\JWT\JWT;

include_once '../config/database.php';
include_once '../objects/user.php';

$database = new Database();
$db = $database->getConnection();

if ($database->getStatusCode() != 200){
    echo "Database Connectrion Error";
    echo "Error Status : ".$database->getStatusCode();
    exit();
}

$user = new User($db);
$request_method = $_SERVER["REQUEST_METHOD"];

$data = json_decode(file_get_contents("php://input"));
$jwt = isset($data->jwt) ? $data->jwt : "";


switch ($request_method){
    case "GET":
        try {
            if (!isset($_GET["user"])) {
                $user->getUserAll();
            } else {
                $user->getUser($_GET["user"]);
            }
        } catch (Exception $e){
            http_response_code(400);
            echo json_encode(array("message" => "Failed Get User Data"));
        }
        break;
    case "POST":
        $user->username = $data->username;
        $user->password = $data->password;
        $user->whatsapp = $data->whatsapp;

        if ($user->userExists()){
            http_response_code(400);
            echo json_encode(array("message" => "Unable to Create User","data" => array($data)));
            break;
        }

        if($user->create()){
            http_response_code(200);
            echo json_encode(array("message" => "User was Created","data" => array($data)));
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "Unable to Create User","reason(s)" => "user exist"));
        }
        break;
    case "PUT":
        if($jwt) {
            try {
                $decoded = JWT::decode($jwt, $key, array('HS256'));

                if (isset($data->username)) {
                    $user->username = $data->username;
                }

                $user->password = $data->password;
                $user->whatsapp = $data->whatsapp;

                if ($user->update()) {
                    $token = array(
                        "iss" => $iss,
                        "aud" => $aud,
                        "iat" => $iat,
                        "nbf" => $nbf,
                        "data" => array(
                            "username" => $user->username,
                            "password" => $user->password,
                            "whatsapp" => $user->whatsapp
                        )
                    );

                    $jwt = JWT::encode($token, $key);
                    http_response_code(200);

                    echo json_encode(array(
                        "message" => "User was updated",
                        "jwt" => $jwt
                    ));
                } else {
                    http_response_code(401);
                    echo json_encode(array("message" => "Unable to update user."));
                }
            } catch (Exception $e){
                http_response_code(401);
                echo json_decode(array(
                    "message" => "Access Denied.",
                    "error" => $e->getMessage()
                ));
            }
        }else {
            http_response_code(401);
            echo json_encode(array("message" => "Access denied."));
        }
        break;
    case "DELETE":
        $user->username = $data->username;

        if($user->delete()) {
            http_response_code(200);
            echo json_encode(array("message" => "User Deleted"));
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "Error While Deteling User"));
        }
        break;
}
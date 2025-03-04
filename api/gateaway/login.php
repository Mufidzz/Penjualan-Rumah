<?php
header("Access-Control-Allow-Origin: http://localhost/rest-api-authentication-example/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once "../config/database.php";
include_once "../objects/user.php";

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$data = json_decode(file_get_contents("php://input"));

$user->username = $data->username;
$user_exist = $user->userExists();

include_once "../config/core.php";
include_once "../libs/php-jwt/src/BeforeValidException.php";
include_once "../libs/php-jwt/src/ExpiredException.php";
include_once "../libs/php-jwt/src/SignatureInvalidException.php";
include_once "../libs/php-jwt/src/JWT.php";

use \Firebase\JWT\JWT;

if($user_exist && password_verify($data->password,$user->password)){

    $token = array(
        "iss" => $iss,
        "aud" => $aud,
        "iat" => $iat,
        "nbf" => $nbf,
        "data" => array(
            "username" => $user->username,
            "whatsapp" => $user->whatsapp,
        )
    );

    http_response_code(200);

    $jwt = JWT::encode($token, $key);
    echo json_encode(
        array(
            "message" => "Successful Login",
            "jwt" => $jwt
        )
    );
} else {
    http_response_code(401);
    echo json_encode(array("message" => "Login Failed"));
}

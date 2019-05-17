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
include_once '../objects/sell.php';

$database = new Database();
$db = $database->getConnection();

if ($database->getStatusCode() != 200){
    echo "Database Connectrion Error";
    echo "Error Status : ".$database->getStatusCode();
    exit();
}

$sell = new Sell($db);
$request_method = $_SERVER["REQUEST_METHOD"];

$data = json_decode(file_get_contents("php://input"));
$jwt = isset($data->jwt) ? $data->jwt : "";

switch ($request_method) {
    case "GET":
        try {
            if (!isset($_GET["id"]) && !isset($_GET["issuer"])) {
                $sell->getSellListAll();
            } else if (isset($_GET["id"])) {
                $sell->getSellListByID($_GET["id"]);
            }else {
                $sell->getSellListByIssuer($_GET["issuer"]);
            }
        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode(array("message" => "Failed Get List"));
        }
        break;
    case "POST":

        if ($jwt) {
            try {
                $decoded = JWT::decode($jwt, $key, array('HS256'));

                $sell->issuer = $decoded->data->username;
                $sell->title = $data->title;
                $sell->alamat = $data->alamat;
                $sell->idlokasi = $data->idlokasi;
                $sell->shm = $data->shm;

                if ($sell->create()) {
                    http_response_code(200);
                    echo json_encode(array("message" => "List was Created", "data" => array($data)));
                } else {
                    http_response_code(400);
                    echo json_encode(array("message" => "Unable to Create New List"));
                }

            } catch (Exception $e){
                http_response_code(401);
                echo json_decode(array(
                    "message" => "Access Denied.",
                    "error" => $e->getMessage()
                ));
            }
        } else {
            http_response_code(401);
            echo json_encode(array("message" => "Access denied."));
        }
        break;
    case "PUT":
        if ($jwt) {
            try {
                $decoded = JWT::decode($jwt, $key, array('HS256'));

                if (isset($data->id)) {
                    $sell->id = $data->id;
                }

                $sell->issuer = $decoded->data->username;
                $sell->title = $data->title;
                $sell->alamat = $data->alamat;
                $sell->idlokasi = $data->idlokasi;
                $sell->shm = $data->shm;

                if ($sell->update()) {

                    http_response_code(200);
                    echo json_encode(array(
                        "message" => "List was updated",
                        "new_data" => array($data)
                    ));
                } else {
                    http_response_code(401);
                    echo json_encode(array("message" => "Unable to update List."));
                }
            } catch (Exception $e) {
                http_response_code(401);
                echo json_decode(array(
                    "message" => "Access Denied.",
                    "error" => $e->getMessage()
                ));
            }
        } else {
            http_response_code(401);
            echo json_encode(array("message" => "Access denied."));
        }
        break;
    case "DELETE":
        $sell->id = $data->id;

        if ($sell->delete()) {
            http_response_code(200);
            echo json_encode(array("message" => "House Deleted"));
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "Error While Deteling House"));
        }
        break;
}

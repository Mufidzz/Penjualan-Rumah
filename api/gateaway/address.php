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
include_once '../objects/address.php';

$database = new Database();
$db = $database->getAddressConnection();

if ($database->getStatusCode() != 200){
    echo "Database Connectrion Error";
    echo "Error Status : ".$database->getStatusCode();
    exit();
}

$addr = new address($db);
$request_method = $_SERVER["REQUEST_METHOD"];

$data = json_decode(file_get_contents("php://input"));

switch ($request_method){
    case "POST":

        try {
            if (!isset($data)) {
                $addr->getKecamatan();
            } else {
                $addr->getKelurahan($data->id_kec);
            }
        } catch (Exception $e){
            http_response_code(400);
            echo json_encode(array("message" => "Failed Get Data"));
        }

        break;
}

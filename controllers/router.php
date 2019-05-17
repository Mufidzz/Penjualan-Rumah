<?php

$main_request = $_SERVER['REQUEST_URI'];
$request = explode('/',$main_request);

switch ($request[1]) {
    case '/' :
        require __DIR__ . "/../views/index.php";
        break;
    case '' :
        require __DIR__ . "/../views/index.php";
        break;
    case 'sell' :
        require __DIR__ . "/../views/sell.php";
        break;
    case 'user' :
        require __DIR__ . "/../views/user.php";
        break;
    case 'login' :
        require __DIR__ . "/../views/login.php";
        break;
    case 'register' :
        require __DIR__ . "/../views/register.php";
        break;
    case 'logout' :
        require __DIR__ . "/logout.php";
        break;
    case 'house' :
        require __DIR__ . "/house.php";
        break;
    default:
        require __DIR__ . "/../views/404.php";
        break;
}
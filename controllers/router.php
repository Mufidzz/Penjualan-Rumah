<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
        require __DIR__ . "/../views/index.php";
        break;
    case '' :
        require __DIR__ . "/../views/index.php";
        break;
    case '/sell' :
        require __DIR__ . "/../views/sell.php";
        break;
    case '/user' :
        require __DIR__ . "/../views/user.php";
        break;
    case '/login' :
        require __DIR__ . "/../views/login.php";
        break;
    case '/register' :
        require __DIR__ . "/../views/register.php";
        break;
    default:
        require __DIR__ . "/../views/404.php";
        break;
}
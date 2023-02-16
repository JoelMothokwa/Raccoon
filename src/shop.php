<?php

require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "config/app.php");
require_once(CONTROLLERS. "shop.controller.php");

$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$path = explode('/', $uri);
$requestType = $_SERVER['REQUEST_METHOD'];

$userInput = file_get_contents('php://input');

$controller = new ShopController();

switch ($requestType) {
    case "POST":

        break;

    case "DELETE":

        break;
    case "PUT":

        break;
    default:
        $items = $controller->items;

        $smarty->assign("items", $items);
        $smarty->display('shop.tpl');
        break;
}
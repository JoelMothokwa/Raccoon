<?php


//var_dump(file_exists(dirname(__DIR__).'/config' . DIRECTORY_SEPARATOR . 'app.php'));
//die();
require dirname(__DIR__).'\config' . DIRECTORY_SEPARATOR . 'app.php';
//var_dump(file_exists('\config' . DIRECTORY_SEPARATOR . 'app.php'));



if (strpos($_SERVER["REQUEST_URI"], "?") > 0) {
    $REQUEST_URI = substr($_SERVER["REQUEST_URI"], 0, strpos($_SERVER["REQUEST_URI"], "?"));
} else {
    $REQUEST_URI = $_SERVER["REQUEST_URI"];
}



$arURI = explode("/", $REQUEST_URI);

$page = isset($arURI[0]) && $arURI[0] != "" ? $arURI[0] : "shop";

var_dump(file_exists(SRC .  $page), file_exists(SRC .  $page.".php"));
die();

if (file_exists(SRC .  $page)) {
    require_once(SRC .  $page);
} elseif (file_exists(SRC . $page . "php")) {
    require SRC .  $page . ".php";
    
} else {
    require_once(SRC .  "error.php");
}


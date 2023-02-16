<?php

if (ini_get("session.auto_start") !== 1) {
    session_start();
}


define("DB_HOST", "127.0.0.1");
define("DB_NAME", "roomraccoom_shop");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");

/**
 * Use the DS to separate the directories in other defines
 */
if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

/**
 * The full path to the directory which holds "src", WITHOUT a trailing DS.
 */
define('ROOT', dirname(__DIR__));
/*
 * Path to the application's directory.
 */
define('SRC', ROOT . DS . "src" );

/**
 * Path to the config directory.
 */
define('CONFIG', ROOT . DS . 'config' );

/**
 * File path to the webroot directory.
 */
define('WWW_ROOT', ROOT . DS . 'webroot' );
define('CLASSES', SRC . DS . 'classes' );
define('TEMPLATES', SRC . DS . 'templates' );
define('CONTROLLERS', SRC . DS . 'controllers');
define('MODULES', SRC . DS . 'controllers' );
define('TEMPLATES_C', SRC . DS . 'templates_c' );
define('VENDOR', ROOT . DS . 'vendor' );

/**
 * Path to the temporary files directory.
 */
define('TMP', ROOT . DS . 'tmp' );

/**
 * Path to the logs directory.
 */
define('LOGS', ROOT . DS . 'logs' );

/**
 * Path to the cache files directory. It can be shared between hosts in a multi-server setup.
 */
define('CACHE', TMP . 'cache' );


require VENDOR . '/smarty/smarty/libs/Smarty.class.php';
$smarty = new Smarty;
//$smarty->force_compile = true;
$smarty->debugging = false;
//$smarty->caching = true;
$smarty->cache_lifetime = 120;

$smarty->setTemplateDir(TEMPLATES);
$smarty->setCompileDir(TEMPLATES_C);
$smarty->setConfigDir(CONFIG);
$smarty->setCacheDir(CACHE);

$sServerName = isset($_SERVER["SERVER_NAME"])?$_SERVER["SERVER_NAME"]:"";


require_once(VENDOR . DS . "autoload.php");

try {
    $DSN = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";";
    $con = new \PDO($DSN, DB_USERNAME, DB_PASSWORD);
    $con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
} catch (\PDOException $pdo) {
    echo $pdo->getMessage();
} catch (\Exception $ex) {
    echo $ex->getMessage();
}

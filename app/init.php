<?php
/**
 * Created by PhpStorm.
 * User: dalibor
 * Date: 12/17/16
 * Time: 19:51
 */

// Constants
//define('TEMPLATES_PATH', $_SERVER['DOCUMENT_ROOT'] . '/Pages');
//define('PARTIALS_PATH', $_SERVER['DOCUMENT_ROOT'] . '/Pages/partials');
if(!session_id()) {
    session_start();
}

$GLOBALS['config'] = array(
    'mysql' => array(
        'username' => 'root',
        'password' => '',
        'host' => 'localhost',
        'db' => 'dacha_local'
    ),
);

require_once '../vendor/autoload.php';
require_once 'database.php';
require_once 'core/App.php';
require_once 'core/Controller.php';
require_once '../Classes/Flash.php';
//spl_autoload_register(function ($class){
//    require_once '../Classes/' . $class . '.php';
//});

//require_once 'functions/sanitize.php';




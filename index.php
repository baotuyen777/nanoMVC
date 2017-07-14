<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('DB_DSN', 'mysql:host=localhost;dbname=nanoMVC');
define('DB_USER', 'root');
define('DB_PASS', '1');

//mail
define('MAIL_USERNAME', 'test123.qsoft@gmail.com');
define('MAIL_NAME', 'ZAIKO SYSTEM');
define('MAIL_PASSWORD', '!@#$%$#@!');
define('SITE_ROOT', 'http://localhost/nanoMVC/');

define('DS', DIRECTORY_SEPARATOR);
define('SERVER_ROOT', __DIR__ . DS);
define('IS_REWRITE', false);
define('TIMTHUMB', SITE_ROOT . 'libs/timthumb.php?src=');

define('IMAGE_SIZE', 5000000);
define('IMAGE_FILE_TYPE', "gif|png|jpg");
/* * library */
require 'libs/Bootstrap.php';
require 'libs/Controller.php';
require 'libs/Model.php';
require 'libs/View.php';
require 'libs/DB.php';

require 'libs/Helper.php';
require 'libs/Session.php';
require 'libs/UploadHandler.php';
//lang
//require 'libs/function.php';
//$lang_get= Session::get('lang');
//        if ($lang_get=='en') {
//            require 'libs/lang/en.lang.php';
//        }else{
//            require 'libs/lang/vi.lang.php';
//        }



session_start();
$app = new Bootstrap();
?>

<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

define('DB_DSN', 'mysql:host=localhost;dbname=nanoMVC');
define('DB_USER', 'root');
define('DB_PASS', '1');

//mail
define('MAIL_USERNAME', 'test123.qsoft@gmail.com');
define('MAIL_NAME','ZAIKO SYSTEM');
define('MAIL_PASSWORD', '!@#$%$#@!');
define('SITE_ROOT', 'http://localhost/nanoMVC/');

define('DS', DIRECTORY_SEPARATOR);
define('SERVER_ROOT', __DIR__ . DS);
/**config */
//require 'config.php';
/**library */
require 'libs/Bootstrap.php';
require 'libs/Controller.php';
require 'libs/Model.php';
require 'libs/View.php';
require 'libs/DB.php';

require 'libs/Helper.php';
//lang
error_reporting(E_ALL & ~E_DEPRECATED);
//require 'libs/function.php';
 
//$lang_get= Session::get('lang');
//        if ($lang_get=='en') {
//            require 'libs/lang/en.lang.php';
//        }else{
//            require 'libs/lang/vi.lang.php';
//        }
$app = new Bootstrap();
?>

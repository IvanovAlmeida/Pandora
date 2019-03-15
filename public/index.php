<?php
define('DS', DIRECTORY_SEPARATOR);

define('__PUBLIC__', '');
define('__CSS__', __PUBLIC__ . '/css/');
define('__JS__', __PUBLIC__ . '/js/');
define('__IMG__', __PUBLIC__ . '/img/');

require_once __DIR__ . '/../vendor/autoload.php';

use App\App;

/**** CORS ****/
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH");
header("Access-Control-Allow-Headers: Content-Type");
/**** CORS ****/

$app = new App();
$app->start();
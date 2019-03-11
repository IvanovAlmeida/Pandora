<?php
require_once __DIR__ . '/../vendor/autoload.php';

use \PlugRoute\PlugRoute;

$route = new PlugRoute();

$route->get('/itens', '\App\Controller\ItemController@index');
$route->get('/itens/{id:\d+}', '\App\Controller\ItemController@ver');

$route->get('/users', '\App\Controller\UsersController@index');
$route->get('/users/{id:\d+}', '\App\Controller\UsersController@ver');



$route->on();
<?php
define('DS', DIRECTORY_SEPARATOR);

require_once __DIR__ . '/../vendor/autoload.php';

use \PlugRoute\PlugRoute;

$route = new PlugRoute();

$route->get('/', '\App\Controller\ReservesController@index');

$route->group(['prefix' => '/items'], function(PlugRoute $route){
    $route->get('', '\App\Controller\ItemController@index');
    $route->get('/{id:\d+}', '\App\Controller\ItemController@view');
});
$route->group(['prefix' => '/users'], function(PlugRoute $route){
    $route->get('', '\App\Controller\UsersController@index');
    $route->get('/{id:\d+}', '\App\Controller\UsersController@view');
});

$route->match(['GET', 'POST'], '/login', '\App\Controller\UsersController@login');

$route->on();
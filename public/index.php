<?php
define('DS', DIRECTORY_SEPARATOR);

define('__PUBLIC__', '');
define('__CSS__', __PUBLIC__ . '/css/');
define('__JS__', __PUBLIC__ . '/js/');
define('__IMG__', __PUBLIC__ . '/img/');

require_once __DIR__ . '/../vendor/autoload.php';

use \PlugRoute\PlugRoute;

$route = new PlugRoute();

$route->setRouteError('\App\Controller\ExceptionsController@error404');

$route->get('/', '\App\Controller\ReservesController@index');

$route->group(['prefix' => '/items'], function(PlugRoute $route){
    $route->get('', '\App\Controller\ItemController@index')->name('items');
    $route->get('/{id:\d+}', '\App\Controller\ItemController@view')->name('items.view');
});
$route->group(['prefix' => '/users'], function(PlugRoute $route){
    $route->get('', '\App\Controller\UsersController@index')->name('users');
    $route->get('/{id:\d+}', '\App\Controller\UsersController@view')->name('users.view');
    $route->get('/cadastrar', '\App\Controller\UsersController@add')->name('users.add');
    $route->post('/cadastrar', '\App\Controller\UsersController@add');
});

$route->match(['GET', 'POST'], '/login', '\App\Controller\UsersController@login');

$route->on();
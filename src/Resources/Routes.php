<?php

use PlugRoute\PlugRoute;
use App\Middlewares\AuthMiddleware;

$route = new PlugRoute();

$route->setRouteError('\App\Controller\ExceptionsController@error404');

$route->get('/', '\App\Controller\ReservesController@index')
        ->middleware(AuthMiddleware::class)
        ->name('home');

$route->match(['GET', 'POST'], '/login', '\App\Controller\UsersController@login');
$route->get('/logout', '\App\Controller\UsersController@logout')->name('logout');

$route->group(['prefix' => '/itens', 'middleware' => [AuthMiddleware::class]], function(PlugRoute $route){
    $route->get('', '\App\Controller\ItemController@index')->name('items');
    $route->get('/{id:\d+}', '\App\Controller\ItemController@view')->name('items.view');
});

$route->group(['prefix' => '/users', 'middleware' => [AuthMiddleware::class]], function(PlugRoute $route){
    $route->get('', '\App\Controller\UsersController@index')->name('users');
    $route->get('/{id:\d+}', '\App\Controller\UsersController@view')->name('users.view');
    $route->get('/cadastrar', '\App\Controller\UsersController@add')->name('users.add');
    $route->post('/cadastrar', '\App\Controller\UsersController@add');
});

return $route;
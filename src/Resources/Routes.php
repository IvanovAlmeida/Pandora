<?php

use PlugRoute\PlugRoute;
use App\Middlewares\AuthMiddleware;

$route = new PlugRoute();

$route->setRouteError('\App\Controller\ExceptionsController@error404');

$route->get('/', '\App\Controller\ReservesController@home')
        ->middleware(AuthMiddleware::class)
        ->name('home');

$route->match(['GET', 'POST'], '/login', '\App\Controller\UsersController@login');
$route->get('/logout', '\App\Controller\UsersController@logout')->name('logout');

$route->group(['prefix' => '/reservas', 'middleware' => [AuthMiddleware::class]], function(PlugRoute $route){
    $route->get('', '\App\Controller\ReservesController@index')->name('reserves');
    $route->get('/ver/{id:\d+}', '\App\Controller\ReservesController@view')->name('reserves.view');

    $route->get('/cadastrar', '\App\Controller\ReservesController@add');
    $route->post('/cadastrar', '\App\Controller\ReservesController@add');

    $route->get('/editar/{id:\d+}', '\App\Controller\ReservesController@edit');
    $route->post('/editar/{id:\d+}', '\App\Controller\ReservesController@edit');

    $route->match(['DELETE'],'/apagar/{id:\d+}', '\App\Controller\ReservesController@delete');
});

$route->group(['prefix' => '/clientes', 'middleware' => [AuthMiddleware::class]], function(PlugRoute $route){
    $route->get('', '\App\Controller\ClientsController@index')->name('clients');
    $route->get('/ver/{id:\d+}', '\App\Controller\ClientsController@view')->name('clients.view');

    $route->get('/cadastrar', '\App\Controller\ClientsController@add');
    $route->post('/cadastrar', '\App\Controller\ClientsController@add');

    $route->get('/editar/{id:\d+}', '\App\Controller\ClientsController@edit');
    $route->post('/editar/{id:\d+}', '\App\Controller\ClientsController@edit');

    $route->delete('/apagar/{id:\d+}', '\App\Controller\ClientsController@delete');
});

$route->group(['prefix' => '/espacos', 'middleware' => [AuthMiddleware::class]], function(PlugRoute $route){
    $route->get('', '\App\Controller\SpacesController@index')->name('spaces');
    $route->get('/ver/{id:\d+}', '\App\Controller\SpacesController@view')->name('spaces.view');

    $route->get('/cadastrar', '\App\Controller\SpacesController@add');
    $route->post('/cadastrar', '\App\Controller\SpacesController@add');

    $route->get('/editar/{id:\d+}', '\App\Controller\SpacesController@edit');
    $route->post('/editar/{id:\d+}', '\App\Controller\SpacesController@edit');

    $route->delete('/apagar/{id:\d+}', '\App\Controller\SpacesController@delete');
});

$route->group(['prefix' => '/itens', 'middleware' => [AuthMiddleware::class]], function(PlugRoute $route){
    $route->get('', '\App\Controller\ItemsController@index')->name('items');
    $route->get('/ver/{id:\d+}', '\App\Controller\ItemsController@view')->name('items.view');

    $route->get('/cadastrar', '\App\Controller\ItemsController@add');
    $route->post('/cadastrar', '\App\Controller\ItemsController@add');

    $route->get('/editar/{id:\d+}', '\App\Controller\ItemsController@edit');
    $route->post('/editar/{id:\d+}', '\App\Controller\ItemsController@edit');

    $route->delete('/apagar/{id:\d+}', '\App\Controller\ItemsController@delete');
});

$route->group(['prefix' => '/servicos', 'middleware' => [AuthMiddleware::class]], function(PlugRoute $route){
    $route->get('', '\App\Controller\ServicesController@index')->name('services');
    $route->get('/ver/{id:\d+}', '\App\Controller\ServicesController@view')->name('services.view');

    $route->get('/cadastrar', '\App\Controller\ServicesController@add');
    $route->post('/cadastrar', '\App\Controller\ServicesController@add');

    $route->get('/editar/{id:\d+}', '\App\Controller\ServicesController@edit');
    $route->post('/editar/{id:\d+}', '\App\Controller\ServicesController@edit');

    $route->delete('/apagar/{id:\d+}', '\App\Controller\ServicesController@delete');
});

$route->group(['prefix' => '/users', 'middleware' => [AuthMiddleware::class]], function(PlugRoute $route){
    $route->get('', '\App\Controller\UsersController@index')->name('users');
    $route->get('/ver/{id:\d+}', '\App\Controller\UsersController@view')->name('users.view');

    $route->get('/cadastrar', '\App\Controller\UsersController@add')->name('users.add');
    $route->post('/cadastrar', '\App\Controller\UsersController@add');

    $route->get('/editar/{id:\d+}', '\App\Controller\UsersController@edit')->name('users.edit');
    $route->post('/editar/{id:\d+}', '\App\Controller\UsersController@edit');

    $route->delete('/apagar/{id:\d+}', '\App\Controller\UsersController@delete')->name('users.delete');
});

return $route;
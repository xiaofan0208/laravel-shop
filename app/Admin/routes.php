<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->get('users', 'UsersController@index');

    $router->get('products', 'ProductsController@index'); //后台商品列表
    $router->get('products/create','ProductsController@create');
    $router->post('products', 'ProductsController@store');
    $router->get('products/{id}/edit','ProductsController@edit'); // 编辑 后台商品
    $router->put('products/{id}', 'ProductsController@update');
});
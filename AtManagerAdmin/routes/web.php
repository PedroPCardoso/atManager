<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/category','CategoryTemplateController@index');
$router->post('/category','CategoryTemplateController@store');
$router->patch('/category','CategoryTemplateController@update');



$router->get('/items','ItemsController@index');
$router->post('/items','ItemsController@store');


$router->get('/', function () use ($router) {
    return $router->app->version();
});

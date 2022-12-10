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

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });

$router->get('/', function (){
 return["App_Nmae"=>"My Lumen App"];
});

// $router->group(['prifix'=>'api/lumen/'], function () use ($router){
//     $router->get('products','ProductController@index');
//     $router->post('product','ProductController@add');
// });
$router->post('product/add','ProductController@add');
$router->post('product/getall','ProductController@getall');
$router->get('product/get','ProductController@get');
$router->post('product/update','ProductController@update');
// $router->post('/products','ProductController@index');
// $router->post('/products','ProductController');
// $router->post('/products','ProductController@index');
// $router->post('/products','ProductController@index');

$router->get('/articles','ArticlesController@store');
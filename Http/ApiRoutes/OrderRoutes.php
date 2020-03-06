<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => 'orders'], function (Router $router) {

  $router->get('/', [
    'as' => 'api.ipayu.orders.index',
    'uses' => 'OrdersApiController@index',
    'middleware' => ['auth:api']
  ]);

  $router->post('/', [
    'as' => 'api.ipayu.orders.create',
    'uses' => 'OrdersApiController@create',
    'middleware' => ['auth:api']
  ]);

  $router->get('/{criteria}', [
    'as' => 'api.ipayu.orders.show',
    'uses' => 'OrdersApiController@show',
    'middleware' => ['auth:api']
  ]);


});

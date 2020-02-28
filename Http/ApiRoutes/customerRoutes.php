<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => 'customers'], function (Router $router) {

  $router->post('/', [
    'as' => 'api.ipayu.customers.create',
    'uses' => 'CustomersApiController@create',
  ]);

  $router->put('/{criteria}', [
    'as' => 'api.ipayu.customers.update',
    'uses' => 'CustomersApiController@update',
  ]);

  $router->get('/{criteria}', [
    'as' => 'api.ipayu.customers.show',
    'uses' => 'CustomersApiController@show',
  ]);

  $router->delete('/{criteria}', [
    'as' => 'api.ipayu.customers.delete',
    'uses' => 'CustomersApiController@delete',
  ]);

});

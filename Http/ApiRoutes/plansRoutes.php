<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => 'plans'], function (Router $router) {

  $router->post('/', [
    'as' => 'api.ipayu.plans.create',
    'uses' => 'PlansApiController@create',
    'middleware' => ['auth:api']
  ]);

  $router->put('/{criteria}', [
    'as' => 'api.ipayu.plans.update',
    'uses' => 'PlansApiController@update',
    'middleware' => ['auth:api']
  ]);

  $router->get('/{criteria}', [
    'as' => 'api.ipayu.plans.show',
    'uses' => 'PlansApiController@show',
  ]);

  $router->delete('/{criteria}', [
    'as' => 'api.ipayu.plans.delete',
    'uses' => 'PlansApiController@delete',
    'middleware' => ['auth:api']
  ]);

});



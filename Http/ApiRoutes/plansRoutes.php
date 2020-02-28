<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => 'plans'], function (Router $router) {

  $router->post('/', [
    'as' => 'api.ipayu.plans.create',
    'uses' => 'PlansApiController@create',
  ]);

  $router->put('/{criteria}', [
    'as' => 'api.ipayu.plans.update',
    'uses' => 'PlansApiController@update',
  ]);

  $router->get('/{criteria}', [
    'as' => 'api.ipayu.plans.show',
    'uses' => 'PlansApiController@show',
  ]);

  $router->delete('/{criteria}', [
    'as' => 'api.ipayu.plans.delete',
    'uses' => 'PlansApiController@delete',
  ]);

});



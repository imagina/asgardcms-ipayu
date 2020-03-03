<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => 'subscriptions'], function (Router $router) {

  $router->post('/', [
    'as' => 'api.ipayu.subscriptions.create',
    'uses' => 'SubscriptionsApiController@create',
    'middleware' => ['auth:api']
  ]);

  $router->delete('/{criteria}', [
    'as' => 'api.ipayu.subscriptions.delete',
    'uses' => 'SubscriptionsApiController@delete',
    'middleware' => ['auth:api']
  ]);

});


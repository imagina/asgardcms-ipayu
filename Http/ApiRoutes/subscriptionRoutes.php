<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => 'subscriptions'], function (Router $router) {

  $router->post('/', [
    'as' => 'api.ipayu.subscriptions.create',
    'uses' => 'SubscriptionsApiController@create',
  ]);

  $router->put('/{criteria}', [
    'as' => 'api.ipayu.subscriptions.update',
    'uses' => 'SubscriptionsApiController@update',
  ]);

  $router->get('/{criteria}', [
    'as' => 'api.ipayu.subscriptions.show',
    'uses' => 'SubscriptionsApiController@show',
  ]);

  $router->delete('/{criteria}', [
    'as' => 'api.ipayu.subscriptions.delete',
    'uses' => 'SubscriptionsApiController@delete',
  ]);

});


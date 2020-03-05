<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => 'credit-cards'], function (Router $router) {

  $router->get('/', [
    'as' => 'api.ipayu.credit-cards.index',
    'uses' => 'CreditCardsApiController@index',
    'middleware' => ['auth:api']
  ]);

  $router->post('/', [
    'as' => 'api.ipayu.credit-cards.create',
    'uses' => 'CreditCardsApiController@create',
    'middleware' => ['auth:api']
  ]);

  $router->put('/{criteria}', [
    'as' => 'api.ipayu.credit-cards.update',
    'uses' => 'CreditCardsApiController@update',
    'middleware' => ['auth:api']
  ]);

  $router->get('/{criteria}', [
    'as' => 'api.ipayu.credit-cards.show',
    'uses' => 'CreditCardsApiController@show',
    'middleware' => ['auth:api']
  ]);

  $router->delete('/{criteria}', [
    'as' => 'api.ipayu.credit-cards.delete',
    'uses' => 'CreditCardsApiController@delete',
    'middleware' => ['auth:api']
  ]);

});

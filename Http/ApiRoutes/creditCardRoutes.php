<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => 'credit-cards'], function (Router $router) {

  $router->post('/', [
    'as' => 'api.ipayu.credit-cards.create',
    'uses' => 'CreditCardsApiController@create',
  ]);

  $router->put('/{criteria}', [
    'as' => 'api.ipayu.credit-cards.update',
    'uses' => 'CreditCardsApiController@update',
  ]);

  $router->get('/{criteria}', [
    'as' => 'api.ipayu.credit-cards.show',
    'uses' => 'CreditCardsApiController@show',
  ]);

  $router->delete('/{criteria}', [
    'as' => 'api.ipayu.credit-cards.delete',
    'uses' => 'CreditCardsApiController@delete',
  ]);

});

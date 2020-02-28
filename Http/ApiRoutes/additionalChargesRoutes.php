<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => 'additional-charges'], function (Router $router) {

  $router->post('/', [
    'as' => 'api.ipayu.additional-charges.create',
    'uses' => 'AdditionalChargesApiController@create',
  ]);

  $router->put('/{criteria}', [
    'as' => 'api.ipayu.additional-charges.update',
    'uses' => 'AdditionalChargesApiController@update',
  ]);

  $router->get('/{criteria}', [
    'as' => 'api.ipayu.additional-charges.show',
    'uses' => 'AdditionalChargesApiController@show',
  ]);

  $router->delete('/{criteria}', [
    'as' => 'api.ipayu.additional-charges.delete',
    'uses' => 'AdditionalChargesApiController@delete',
  ]);

});

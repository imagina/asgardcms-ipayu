<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => 'queries'], function (Router $router) {

  $router->get('/ping', [
    'as' => 'api.ipayu.queries.ping',
    'uses' => 'QueriesApiController@ping',
  ]);

});

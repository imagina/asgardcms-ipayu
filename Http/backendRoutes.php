<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/ipayu'], function (Router $router) {
    $router->bind('creditcard', function ($id) {
        return app('Modules\Ipayu\Repositories\CreditCardRepository')->find($id);
    });
    $router->get('creditcards', [
        'as' => 'admin.ipayu.creditcard.index',
        'uses' => 'CreditCardController@index',
        'middleware' => 'can:ipayu.creditcards.index'
    ]);
    $router->get('creditcards/create', [
        'as' => 'admin.ipayu.creditcard.create',
        'uses' => 'CreditCardController@create',
        'middleware' => 'can:ipayu.creditcards.create'
    ]);
    $router->post('creditcards', [
        'as' => 'admin.ipayu.creditcard.store',
        'uses' => 'CreditCardController@store',
        'middleware' => 'can:ipayu.creditcards.create'
    ]);
    $router->get('creditcards/{creditcard}/edit', [
        'as' => 'admin.ipayu.creditcard.edit',
        'uses' => 'CreditCardController@edit',
        'middleware' => 'can:ipayu.creditcards.edit'
    ]);
    $router->put('creditcards/{creditcard}', [
        'as' => 'admin.ipayu.creditcard.update',
        'uses' => 'CreditCardController@update',
        'middleware' => 'can:ipayu.creditcards.edit'
    ]);
    $router->delete('creditcards/{creditcard}', [
        'as' => 'admin.ipayu.creditcard.destroy',
        'uses' => 'CreditCardController@destroy',
        'middleware' => 'can:ipayu.creditcards.destroy'
    ]);
    $router->bind('order', function ($id) {
        return app('Modules\Ipayu\Repositories\OrderRepository')->find($id);
    });
    $router->get('orders', [
        'as' => 'admin.ipayu.order.index',
        'uses' => 'OrderController@index',
        'middleware' => 'can:ipayu.orders.index'
    ]);
    $router->get('orders/create', [
        'as' => 'admin.ipayu.order.create',
        'uses' => 'OrderController@create',
        'middleware' => 'can:ipayu.orders.create'
    ]);
    $router->post('orders', [
        'as' => 'admin.ipayu.order.store',
        'uses' => 'OrderController@store',
        'middleware' => 'can:ipayu.orders.create'
    ]);
    $router->get('orders/{order}/edit', [
        'as' => 'admin.ipayu.order.edit',
        'uses' => 'OrderController@edit',
        'middleware' => 'can:ipayu.orders.edit'
    ]);
    $router->put('orders/{order}', [
        'as' => 'admin.ipayu.order.update',
        'uses' => 'OrderController@update',
        'middleware' => 'can:ipayu.orders.edit'
    ]);
    $router->delete('orders/{order}', [
        'as' => 'admin.ipayu.order.destroy',
        'uses' => 'OrderController@destroy',
        'middleware' => 'can:ipayu.orders.destroy'
    ]);
// append


});

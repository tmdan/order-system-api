<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['namespace' => 'Api'], function () {


    Route::group(['prefix' => 'products'], function () {
        Route::get('', 'ProductController@index')->name('api.products');
    });

    Route::group(['prefix' => 'orders'], function () {
        Route::get('', 'OrderController@index')->name('api.orders');
        Route::post('', 'OrderController@store')->name('api.orders.store');
        Route::put('{id}', 'OrderController@update')->name('api.orders.update');
        Route::patch('{id}', 'OrderController@update');
    });

});


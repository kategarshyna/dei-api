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
//Route::group([],function () {
//    Route::apiResource('products', 'ProductController');
//});

Route::post('customers/login', 'UserController@login')->name('api.customers.login');
Route::post('customers/register', 'UserController@register');

Route::middleware(['auth:api'])->group(function(){
    Route::get('/launch', 'LaunchController@index');
    Route::get('/customer/detail', 'UserController@show');
    Route::get('/customer/orders', 'OrderController@ordersByUserId');
    Route::put('/customer/password', 'UserController@update');
    Route::get('products', 'ProductController@index');
    Route::get('products/{id}/detail', 'ProductController@show');
    Route::get('products/categories', 'CategoryController@index');
    Route::get('/product/category/{id}', 'CategoryController@show');
    Route::get('/stores', 'StoreController@index');
    Route::get('/stores/{id}/detail', 'StoreController@show');
    Route::get('/products/store/{id}', 'ProductController@productsByStore');
    Route::get('/orders', 'OrderController@index');
    Route::post('/order/add', 'OrderController@store');
    Route::put('/order/{id}', 'OrderController@update');
    Route::get('/carts/{user_id}', 'CartController@show');
});

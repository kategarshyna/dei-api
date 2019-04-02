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


Route::post('customers/login', 'UserController@login');
Route::post('customers/register', 'UserController@register');
Route::middleware(['auth:api'])->group(function(){
    Route::get('customers/user-detail', 'UserController@details');
    Route::get('products', 'ProductController@index');
    Route::get('products/{id}/detail', 'ProductController@show');
    Route::get('products/categories', 'CategoryController@index');
    Route::get('/product/category/{id}', 'CategoryController@show');
    Route::get('/stores', 'StoreController@index');
    Route::get('/stores/{id}/detail', 'StoreController@show');
});

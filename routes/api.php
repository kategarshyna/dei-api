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
    Route::get('details', 'UserController@details');
    Route::get('products', 'ProductController@index');
});

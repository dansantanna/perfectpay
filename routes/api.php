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


Route::prefix('sales')->group(function () {
    Route::get('/groups', 'SaleController@groups');
    Route::get('/', 'SaleController@list');
    Route::get('/{id}', 'SaleController@show');
    Route::put('/{id}', 'SaleController@update');
    Route::patch('/{id}', 'SaleController@update');
});

Route::get('/customers', 'CustomerController@list');
Route::get('/products', 'ProductController@list');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

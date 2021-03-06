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


Route::get('/categorias', 'ControllerCategoria@indexJson');


Route::prefix('produtos')->group(function(){

	Route::get('/', 'ControllerProduto@index');

	Route::post('/', 'ControllerProduto@store');
	
	Route::get('/{id}', 'ControllerProduto@show');

	Route::PUT('/{id}', 'ControllerProduto@update');
	
	Route::delete('/{id}', 'ControllerProduto@destroy');
});
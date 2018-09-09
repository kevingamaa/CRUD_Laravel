<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/produtos', 'ControllerProduto@indexView');


Route::prefix('categorias')->group(function(){
	// get
	Route::get('/', 'ControllerCategoria@index');
	Route::get('/novo', 'ControllerCategoria@create');

	Route::get('/editar/{id}', 'ControllerCategoria@edit');

	Route::get('/apagar/{id}', 'ControllerCategoria@destroy');
	Route::get('/apagartodos', 'ControllerCategoria@destroyAll');

	// post
	Route::post('/', 'ControllerCategoria@store');
	Route::post('/{id}', 'ControllerCategoria@update');
});
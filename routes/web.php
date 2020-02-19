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
use \App\User;
Route::get('/', function () {

    //return User::all();
    return view('welcome');
});
Route::prefix('admin')->namespace('Admin')->group(function(){

	Route::prefix('store')->group(function(){
		Route::get('/','StoreController@index'); //Lista as lojas existentes
		Route::get('/create','StoreController@create'); //Abre o formulario para criaçao
		Route::post('/store','StoreController@store'); //Grava na Base de Dados

		Route::get('/{store}/edit', 'StoreController@edit');
        Route::post('/update/{store}', 'StoreController@update');
        Route::get('/{store}/delete', 'StoreController@delete');
	});
});

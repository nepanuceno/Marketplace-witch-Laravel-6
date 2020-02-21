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
Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){

	Route::prefix('store')->name('store.')->group(function(){
		Route::get('/','StoreController@index')->name('index'); //Lista as lojas existentes
		Route::get('/create','StoreController@create')->name('create'); //Abre o formulario para criaçao
		Route::post('/store','StoreController@store')->name('store'); //Grava na Base de Dados
		Route::get('/{store}/edit', 'StoreController@edit')->name('edit');
        Route::post('/update/{store}', 'StoreController@update')->name('update');
        Route::get('/{store}/destroy', 'StoreController@destroy')->name('destroy');
	});

	Route::resource('/product','ProductController');
});

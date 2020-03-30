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
Route::get('/', 'HomeController@index')->name('home');
Route::get('/product/{slug}', 'HomeController@single')->name('product.single');

Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){

    Route::group(['middleware'=>['auth']], function(){
        Route::resource('/store','StoreController');
        Route::resource('/products','ProductController');
        Route::resource('/categories','CategoryController');

        Route::post('photos/remove', 'ProductPhotoController@removePhoto')->name('photo.remove');

    });

});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

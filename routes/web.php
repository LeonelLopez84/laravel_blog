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
    	return view('welcome');
	});

Route::group(['prefix'=>'admin'],function(){

	Auth::routes();

	Route::get('/', function () {
    	return view('admin.welcome');
	});

	Route::get('/home', 'HomeController@index');

	Route::resource('users','UsersController');
	Route::resource('categories','CategoriesController');
	Route::resource('tags','TagsController');

});


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

Route::get('/',['as' => 'home', 
				'uses' => 'FrontController@index']);

Route::get('/articles/{slug}',['as' => 'articles', 
								'uses' => 'FrontController@viewArticle']);

Route::get('/categories/{name}','FrontController@searchCategory');

Route::get('/tags/{name}', 'FrontController@searchTag');

Route::group(['prefix'=>'admin'],function(){

	Auth::routes();

	Route::get('/', function () {
    	return view('admin.welcome');
	});

	Route::get('/home', 'AdminController@index');

	Route::resource('users','UsersController');
	Route::resource('categories','CategoriesController');
	Route::resource('tags','TagsController');
	Route::resource('articles','ArticlesController');

});

Route::get('articles/images/{filename}',function($filename){

	$path=storage_path("app/public/images/$filename");

	if(!\File::exists($path)) abort(404);

	$file = \File::get($path);

	$type =\File::mimeType($path);

	$response = Response::make($file,200);

	$response->header("Content-Type",$type);

	return $response;

});


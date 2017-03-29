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
Route::get('/articles/addshare/{slug}',['as' => 'articles.share', 
                                  'uses' => 'FrontController@addShare']);
Route::get('/categories/{padre}/{slug}','FrontController@searchSubCategory');
Route::get('/tags/{slug}', 'FrontController@searchTag');
Route::get('/pagenotfound',['as' => 'notfound', 
                                'uses' => 'FrontController@notfound']);

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
    Route::resource('images','ImagesController');
    Route::post('/articles/api', 'ArticlesController@api');
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



// 

Route::get('sitemap', function(){

    // create new sitemap object
    $sitemap = App::make("sitemap");

    // set cache key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean)
    // by default cache is disabled
    //$sitemap->setCache('laravel.sitemap',5,true);

    // check if there is cached sitemap and build new only if is not
    if (!$sitemap->isCached())
    {
         // add item to the sitemap (url, date, priority, freq)
         $sitemap->add(URL::to('/'), date('Y-m-d H:i:s'), '1.0', 'daily');
         
         $categories = App\Category::orderBy('created_at', 'desc')->get();
         foreach ($categories as $category)
         {
            foreach($category->downcategory as $subcategory){
			    $sitemap->add(URL::to('categories/'.$category->slug.'/'.$subcategory->slug), $category->updated_at,'0.9','monthly');
            }

         }

         $tags = App\Tag::orderBy('created_at', 'desc')->get();
         foreach ($tags as $tag)
         {
			$sitemap->add(URL::to('/tags/'.$tag->slug), $tag->updated_at,'0.9','daily');

         }


         $posts = App\Article::orderBy('created_at', 'desc')->get();
         foreach ($posts as $post)
         {
            $images = array();
            foreach ($post->images as $image) {
                $images[] = array(
                    'url' => URL::to('/articles/images/'.$image->name),
                    'title' => $image->article->title,
                    'caption' => 'image Caption'
                );
            }

            $sitemap->add(URL::to('/articles/'.$post->slug), $post->updated_at,'0.9','monthly', $images);
         }
    }

    // show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
    return $sitemap->render('xml');

});
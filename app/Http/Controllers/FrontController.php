<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Article;
use App\Category;
use App\Tag;
use App\Subscription;
use Carbon\Carbon;
use SEOMeta;
use OpenGraph;
use Twitter;

class FrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        Carbon::setLocale('es');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $articles=Article::SearchArticle($request->search)
                        ->where('statu_id', '=', '2')
                        ->orderBy('created_at','DESC')->paginate(6);

        SEOMeta::setTitle('Home Blog');
        SEOMeta::setDescription('Blog de la pagina de la empresa');
        SEOMeta::setCanonical(url('/'));

        OpenGraph::setDescription('This is my page description');
        OpenGraph::setTitle('Home');
        OpenGraph::setUrl(url('/'));
        OpenGraph::addProperty('type', 'articles');

        Twitter::setTitle('Home Blog');
        Twitter::setSite('@webstagemx');

        return view('front.home')
                ->with('articles',$articles)
                 ->with('search',$request->search);

    }


    public function searchSubCategory($padre,$slug)
    {
        $category=Category::SearchCategory($slug)->first();

        if(empty($category)) abort(404);

        $articles=$category->articles()->where('statu_id', '=', '2')->paginate(10);

        SEOMeta::setTitle($category->name);
        SEOMeta::setDescription($category->name);
        SEOMeta::setCanonical(url('/categories/'.$category->upcategory->slug.'/'.$category->slug));

        OpenGraph::setDescription($category->name);
        OpenGraph::setTitle($category->name);
        OpenGraph::setUrl(url('/categories/'.$category->upcategory->slug.'/'.$category->slug));
        OpenGraph::addProperty('type', 'Categories');

        Twitter::setTitle("Blog Laravel > {$category->upcategory->name} > {$category->name}");
        Twitter::setSite('@webstagemx');

        return view('front.subcategory')
                ->with('articles',$articles)
                ->with('category', $category)
                ->with('search','');
    }

     public function searchTag($slug)
    {
        $articles=Article::withTag($slug)
                        ->where('statu_id', '=', '2')
                        ->paginate(10);

        if(count($articles)==0) abort(404);

    
        SEOMeta::setTitle($slug);
        SEOMeta::setDescription($slug);
        SEOMeta::setCanonical(url('/tags/'.$slug));

        OpenGraph::setDescription($slug);
        OpenGraph::setTitle($slug);
        OpenGraph::setUrl(url('/tags/'.$slug));
        OpenGraph::addProperty('type', 'Tags');

        Twitter::setTitle('Blog Laravel > '.$slug);
        Twitter::setSite('@webstagemx');
        
        return view('front.tag')
                ->with('articles',$articles)
                ->with('padre','')
                ->with('slug', $slug)
                ->with('search','');
                

    }

    public function viewArticle($slug)
    {
    	$article = Article::where('slug','=',$slug)->first();

        if(empty($article)) abort(404);

        $related=Article::where('category_id','=',$article->category_id)
                            ->where('statu_id', '=', '2')
                            ->inRandomOrder()
                            ->take(3)->get();

        SEOMeta::setTitle($article->title);
        SEOMeta::setDescription($article->preview);
        SEOMeta::addMeta('article:published_time', $article->created_at, 'property');
        SEOMeta::addMeta('article:section', $article->category->name, 'property');
        SEOMeta::addKeyword(['key1', 'key2', 'key3']);

        OpenGraph::setDescription($article->preview);
        OpenGraph::setTitle($article->title);
        OpenGraph::setUrl('http://current.url.com');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'es-mx');
        OpenGraph::addProperty('locale:alternate', ['es-mx', 'en-us']);

        foreach($article->images as $image){
            OpenGraph::addImage(url("/articles/images/$image->name"));
        }

        Twitter::setTitle('Blog Laravel > '.$article->title);
        Twitter::setSite('@webstagemx');

 		return view('front.article')
                ->with('article',$article)
                ->with('related',$related)
                ->with('search','');
    	
    }

    public function shared($slug)
    {
        $Article = Article::where('slug','=',$slug)->first();
        if(empty($Article)) abort(404);
        $Article->shares = ($Article->shares + 1);
        $Article->save();
        return response()->json( $Article->shares);
    } 

    public function visited($slug)
    {
        $Article = Article::where('slug','=',$slug)->first();
        if(empty($Article)) abort(404);
        $Article->visits= ($Article->visits + 1);
        $Article->save();
        return response()->json( $Article->visits);
        
    } 

    public function subscribe(Request $request)
    {
        try {
            if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
                $Subscription = new Subscription(['email'=>$request->email]);
                $Subscription->save();
            }
            return 1;
        }catch(\Exception $e){
            return;
        }
    } 
}

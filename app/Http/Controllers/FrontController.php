<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Article;
use App\Category;
use App\Tag;
use Carbon\Carbon;
use SEO;

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
        SEO::twitter()->setSite('@webstagemx');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $articles=Article::SearchArticle($request->search)->orderBy('created_at','DESC')->paginate(6);
    
        return view('front.home')
                ->with('articles',$articles)
                 ->with('search',$request->search);

    }


    public function searchSubCategory($padre,$category)
    {
        $category=Category::SearchCategory($category)->first();
        $articles=$category->articles()->paginate(10);

        SEO::setTitle($category->name);
        SEO::setDescription($category->name);
        SEO::opengraph()->setUrl(url('/categories/'.$category->name));
        SEO::setCanonical(url('/categories/'.$category->name));
        SEO::opengraph()->addProperty('type', 'categories');
        return view('front.home')
                ->with('articles',$articles)
                ->with('padre',$padre)
                ->with('category',$category)
                ->with('search','');
    }

     public function searchTag($name)
    {
        $tag=Tag::SearchTag($name)->first();
        $articles=$tag->articles()->paginate(10);

        SEO::setTitle($tag->name);
        SEO::setDescription($tag->name);
        SEO::opengraph()->setUrl(url('/tags/'.$tag->name));
        SEO::setCanonical(url('/tags/'.$tag->name));
        SEO::opengraph()->addProperty('type', 'tags');
        

        return view('front.home')
                ->with('articles',$articles)
                ->with('padre','Tag')
                ->with('name',$name)
                ->with('search','');

    }

    public function viewArticle($slug)
    {
    	$article = Article::where('slug','=',$slug)->first();

        $related=Article::where('category_id','=',$article->category_id)->inRandomOrder()->take(3)->get();

        SEO::setTitle($article->title);
        SEO::setDescription($article->title);
        SEO::opengraph()->setUrl(url('/articles/'.$article->slug));
        SEO::setCanonical(url('/articles/'.$article->slug));
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::twitter()->setSite($article->user->twitter_user);

 		return view('front.article')
                ->with('article',$article)
                ->with('related',$related)
                ->with('search','');
    	
    }
}

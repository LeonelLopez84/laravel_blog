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

        $articles=Article::SearchArticle($request->search)
                        ->where('statu_id', '=', '2')
                        ->orderBy('created_at','DESC')->paginate(6);
    
        return view('front.home')
                ->with('articles',$articles)
                 ->with('search',$request->search);

    }


    public function searchSubCategory($padre,$slug)
    {
        $category=Category::SearchCategory($slug)->first();
        $articles=$category->articles()->where('statu_id', '=', '2')->paginate(10);

        SEO::setTitle($category->name);
        SEO::setDescription($category->name);
        SEO::opengraph()->setUrl(url('/categories/'.$category->slug));
        SEO::setCanonical(url('/categories/'.$category->slug));
        SEO::opengraph()->addProperty('type', 'categories');

        return view('front.subcategory')
                ->with('articles',$articles)
                ->with('category', $category)
                ->with('search','');
    }

     public function searchTag($slug)
    {
        $tag=Tag::SearchTag($slug)->first();
        $articles=$tag->articles()
                        ->where('statu_id', '=', '2')
                        ->paginate(10);
        
        SEO::setTitle($tag->name);
        SEO::setDescription($tag->name);
        SEO::opengraph()->setUrl(url('/tags/'.$tag->slug));
        SEO::setCanonical(url('/tags/'.$tag->slug));
        SEO::opengraph()->addProperty('type', 'tags');
        
        return view('front.tag')
                ->with('articles',$articles)
                ->with('padre','Tag')
                ->with('tag', $tag)
                ->with('search','');

    }

    public function viewArticle($slug)
    {
    	$article = Article::where('slug','=',$slug)->first();

        $related=Article::where('category_id','=',$article->category_id)
                            ->where('statu_id', '=', '2')
                            ->inRandomOrder()
                            ->take(3)->get();

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

    public function notfound()
    {
        return view('errors.404');    
    }
}

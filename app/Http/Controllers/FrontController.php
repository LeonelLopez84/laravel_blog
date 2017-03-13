<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Tag;
use Carbon\Carbon;

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
    public function index()
    {
        $articles=Article::orderBy('created_at','DESC')->paginate(10);
        return view('front.home')
                ->with('articles',$articles);

    }

    public function searchCategory($name)
    {
        $category=Category::SearchCategory($name)->first();
        $articles=$category->articles()->paginate(10);
        return view('front.home')
                ->with('articles',$articles);

    }

     public function searchTag($name)
    {
        $tag=Tag::SearchTag($name)->first();
        $articles=$tag->articles()->paginate(10);
        return view('front.home')
                ->with('articles',$articles);

    }

    public function viewArticle($slug)
    {
    	$article = Article::where('slug','=',$slug)->first();
 		return view('front.article')
                ->with('article',$article);
    	
    }
}

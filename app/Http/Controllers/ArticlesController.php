<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Laracasts\Flash\Flash;
use App\Article;
use App\Tag;
use App\Category;
use App\Image;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $articles=Article::orderBy('title','ASC')->paginate(15);
        return view('admin.articles.index')->with('articles',$articles);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags=Tag::orderBy('name','ASC')->pluck('name','id');
        $categories=Category::orderBy('name','ASC')->pluck('name','id');
        return view("admin.articles.create")->with('categories',$categories)->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file("image")){

            $file = $request->file("image");
            $name = 'blog_'.time().'.'.$file->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('images',$name);

            $article = new Article($request->all());
            $article->user_id= \Auth::user()->id;
            $article->save();

            $article->tags()->sync($request->tags);

            $image= new Image();
            $image->name = $name ;
            $image->article()->associate($article);
        }

        Flash::success("Se ha creado el articulo <b>$article->name</b>");

        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

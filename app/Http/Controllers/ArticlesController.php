<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Laracasts\Flash\Flash;
use Illuminate\Support\Str;
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

    public function index(Request $request)
    {
        $articles=Article::search($request->title)->orderBy('title','ASC')->paginate(15);
        return view('admin.articles.index')
                ->with('articles',$articles)
                ->with('title',$request->title);
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
    public function store(ArticleRequest $request)
    {

        $article = new Article();
        $article->title =$request->title;
        $article->category_id =$request->category_id;
        $article->preview = $request->preview;
        $article->content = $request->content;
        $article->slug = Str::slug($request->title);
        $article->user_id= \Auth::user()->id;
        $article->save();

        $article->tags()->sync($request->tags);

        if($request->file("image")){

            $file = $request->file("image");
            $name = 'blog_'.time().'.'.$file->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('images',$name);

            $image= new Image();
            $image->name = $name ;
            $image->article()->associate($article);
            $image->save();
        }

        Flash::success("Se ha creado el articulo <b>$article->title</b>");

        return redirect()->route('articles.index');
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
        $article=Article::find($id);
        $tags=Tag::orderBy('name','ASC')->pluck('name','id');
        $categories=Category::orderBy('name','ASC')->pluck('name','id');
        $selected_tags=$article->tags->pluck('id')->toArray();

        return view('admin.articles.edit')
                ->with('article',$article)
                ->with('categories',$categories)
                ->with('tags',$tags)
                ->with('selected_tags',$selected_tags);
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(ArticleRequest $request, $id)
    {

        $article =Article::find($id);
        $article->title =$request->title;
        $article->preview = $request->preview;
        $article->content = $request->content;
        $article->slug = Str::slug($request->title);
        $article->user_id = \Auth::user()->id;
        $article->save();

        $article->tags()->sync($request->tags);

        if($request->file("image")){

            $file = $request->file("image");
            $name = 'blog_'.time().'.'.$file->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('images',$name);
        
            $image= new Image();
            $image->name = $name ;
            $image->article()->associate($article);
            $image->save();
        }
        
        Flash::success("Se ha actualizado el articulo <b>$article->title</b>");

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article=Article::find($id);
        $article->delete();
        Flash::error('El articulo <b>'.$article->title.'</b> ha sido borrado');
        return redirect()->route('articles.index');
    }
}

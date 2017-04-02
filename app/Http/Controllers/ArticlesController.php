<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Laracasts\Flash\Flash;
use Illuminate\Support\Str;
use App\Article;
use App\Category;
use App\Image;
use App\Statu;
use Carbon\Carbon;
use DB;

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

    public function api()
    {
        $model= DB::table('articles')
        ->join('categories', 'articles.category_id', '=', 'categories.id')
        ->join('users', 'articles.user_id', '=', 'users.id')
        ->join('status', 'articles.statu_id', '=', 'status.id')
        ->leftJoin('categories as padres', 'categories.category_id', '=', 'padres.id')
        ->select('articles.id',
                    'articles.title',
                    'users.name as user',
                    'padres.name as padre',
                    'categories.name as category',
                    "status.name as status",
                    'articles.created_at',
                    'articles.id');


        return app('datatables')->queryBuilder($model)->make(true); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=[];
     
        $categories=Category::where('category_id', '=', '0')
                            ->orderBy('name','ASC')
                            ->get()
                            ->map(function($category){
                                return ['name' => $category->name, 'categories' => $category->downcategory->pluck('name','id')->toArray()];
                            })->keyBy('name')->map(function($categories) {
                                return $categories['categories'];
                            });
                            
        //dd($categories);
        return view("admin.articles.create")
                ->with('categories',$categories);
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

        $article->tag($request->tags);

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
        
        $tags=array();
        foreach($article->tags as $val){
            $tags[]=$val->name;
        }
        
        $selected_tags=implode(',',$tags);

        $categories=Category::where('category_id', '=', '0')
                            ->orderBy('name','ASC')
                            ->get()
                            ->map(function($category){
                                return ['name' => $category->name, 'categories' => $category->downcategory->pluck('name','id')->toArray()];
                            })->keyBy('name')->map(function($categories) {
                                return $categories['categories'];
                            });

        return view('admin.articles.edit')
                ->with('article',$article)
                ->with('categories',$categories)
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
        $article->category_id = $request->category_id;
        $article->content = $request->content;
        $article->statu_id = $request->statu_id;
        $article->slug = Str::slug($request->title);
        $article->user_id = \Auth::user()->id;
        $article->save();

        $article->setTags($request->tags);

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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Laracasts\Flash\Flash;
use Illuminate\Support\Str;
use App\Category;

class CategoriesController extends Controller
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
         $categories=Category::search($request->name)->orderBy('name','ASC')->paginate(15);
        return view('admin.categories.index')
                ->with('categories',$categories)
                ->with('name',$request->name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::where('category_id','=','0')->orderBy('name','ASC')->pluck('name','id');
        return view("admin.categories.create")->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {

        $category = new Category($request->all());
        $category->slug = Str::slug($request->name);
        $category->save();

        Flash::success("La categoría <b>$category->name</b>");
        return redirect()->route('categories.index');

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
        $category=Category::find($id);
        $categories=Category::where('category_id','=','0')->orderBy('name','ASC')->pluck('name','id');

        return view('admin.categories.edit')
                                    ->with('category',$category)
                                    ->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category=Category::find($id);
        $category->fill($request->all());
        $category->slug = Str::slug($request->name);
        $category->save();
        Flash::success('La Categoría <b>'.$category->name.'</b> ha sido editado');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();
        Flash::error('Categoría <b>'.$category->name.'</b> ha sido borrado');
        return redirect()->route('categories.index');
    }
}

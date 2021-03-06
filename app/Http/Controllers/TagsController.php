<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $tags=[];
        foreach(Article::allTags()->get() as $val)
        {
            array_push($tags,$val->name);
        }

        return response()->json($tags);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.tags.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagsRequest $request)
    {
        $tag = new Tag($request->all());
        $tag->slug = Str::slug($request->name);
        $tag->save();

        Flash::success("El Tag <b>$tag->name</b> fue guardado");
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
        $tag=Tag::find($id);

        return view('admin.tags.edit')->with('tag',$tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagsRequest $request, $id)
    {
    	$tag=Tag::find($id);
        $tag->fill($request->all());
        $tag->slug = Str::slug($request->name);
        $tag->save();
        Flash::success('El tag <b>'.$tag->name.'</b> ha sido editado');
        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag=Tag::find($id);
        $tag->delete();
        Flash::error('Tag <b>'.$tag->name.'</b> ha sido borrado');
        return redirect()->route('tags.index');
    }
}

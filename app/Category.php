<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="categories";

    protected $fillable=["name",'slug','category_id'];

    public function upcategory()
    {
        return $this->belongsTo('App\Category','category_id','id');
    }

    public function downcategory()
    {
        return $this->hasMany('App\Category','category_id','id');
    }

    public function articles()
    {
    	return $this->hasMany('App\Article');
    }

    public function scopeSearch($query, $name)
    {
    	return $query->where('name','LIKE',"%{$name}%");
    }

    public function scopeSearchPadreCategory($query, $padre)
    {
        return $query->where('slug','=',"$padre"); 
    }

    public function scopeSearchCategory($query, $slug)
    {
        return $query->where('slug','=',"$slug"); 
    }


}

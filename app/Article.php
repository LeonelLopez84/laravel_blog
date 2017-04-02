<?php

namespace App;

use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\Model;


use Cartalyst\Tags\TaggableTrait;
use Cartalyst\Tags\TaggableInterface;

class Article extends Model implements TaggableInterface
{
    use TaggableTrait;

    protected $table="articles";

    protected $fillable=["title","content",'slug','shares','visits',"category_id","user_id",'statu_id'];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function statu()
    {
        return $this->belongsTo('App\Statu');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function images()
    {
    	return $this->hasMany('App\Image');
    }


    public function scopeSearch($query, $title)
    {
        return $query->where('title','LIKE',"%{$title}%");
    }

    public function scopeSearchArticle($query, $title)
    {
        return $query->where('title','LIKE',"%{$title}%"); 
    }
}

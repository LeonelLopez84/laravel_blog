<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statu extends Model
{
	protected $table="status";

    protected $fillable=["name",'statu_id'];

    public function articles()
    {
    	return $this->hasMany('App\Article');
    }

    public function categories()
    {
    	return $this->hasMany('App\Category');
    }

    public function tags()
    {
    	return $this->hasMany('App\Tag');
    }


}

<?php
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Category;
use App\Tag;

class NavbarComposer
{
	public function compose(View $view)
	{

		$categories=Category::where('category_id', '=', '0')
							->where('status_id', '=', '2')
                            ->orderBy('name','ASC')
                            ->get()
                            ->map(function($category){
                                return ['name' => $category->name, 'categories' => $category->downcategory];
                            })->keyBy('name')->map(function($categories) {
                                return $categories['categories'];
                            });
		$tags = Tag::where('status_id', '=', '2')
                       ->orderBy('name','ASC')->get();

		$view->with('categories',$categories)
			->with('tags',$tags);
	}
}




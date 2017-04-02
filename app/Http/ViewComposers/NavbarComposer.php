<?php
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Category;

class NavbarComposer
{
	public function compose(View $view)
	{

		$categories=Category::where('category_id', '=', '0')
							->where('statu_id', '=', '2')
                            ->orderBy('name','ASC')
                            ->get()
                            ->map(function($category){
                                return ['name' => $category->name, 'categories' => $category->downcategory];
                            })->keyBy('name')->map(function($categories) {
                                return $categories['categories'];
                            });

		$view->with('categories',$categories);
	}
}




<?php
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Article;

class SharedComposer
{
	public function compose(View $view)
	{

		$date=date("Y-m-d H:i:s");
		$ago=date('Y-m-d H:i:s',strtotime("{$date} -1 month"));
		
		$sharedArticles=Article::where('statu_id', '=', '2')
							 ->where('created_at', '>', $ago)
                             ->orderBy('shares','DESC')
        					 ->take(5)
                            ->get();

		$view->with('sharedArticles',$sharedArticles);
	}
}




<?php
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Article;

class BlockComposer
{
	public function compose(View $view)
	{

		$date=date("Y-m-d H:i:s");
		$ago=date('Y-m-d H:i:s',strtotime("{$date} -4 week"));
		
		$lastArticles=Article::where('statu_id', '=', '2')
							 ->where('created_at', '>', $ago)
                             ->orderByRaw('RAND()')
        					 ->take(3)
                            ->get();

		$view->with('lastArticles',$lastArticles);
	}
}




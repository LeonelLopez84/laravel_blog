<?php
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Article;

class VisitedComposer
{
	public function compose(View $view)
	{

		$date=date("Y-m-d H:i:s");
		$ago=date('Y-m-d H:i:s',strtotime("{$date} -4 week"));
		
		$visitedArticles=Article::where('statu_id', '=', '2')
							 ->where('created_at', '>', $ago)
                             ->orderBy('visits','DESC')
        					 ->take(5)
                            ->get();

		$view->with('visitedArticles',$visitedArticles);
	}
}




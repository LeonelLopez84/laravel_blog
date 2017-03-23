<?php
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

use App\Statu;

class AdminComposer
{

	public function compose(View $view)
	{

		$status=Statu::orderBy('name','ASC')
                    ->pluck('name','id')
                    ->toArray();
		$view->with('status',$status);
	}
}
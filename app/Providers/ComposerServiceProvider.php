<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['front.home',
                        'front.article',
                        'front.home',
                        'front.subcategory',
                        'front.tag'
                        ],'App\Http\ViewComposers\NavbarComposer');

        View::composer(['admin.articles.edit',
                        'admin.categories.edit',
                        'tags.edit',
                        ],'App\Http\ViewComposers\AdminComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

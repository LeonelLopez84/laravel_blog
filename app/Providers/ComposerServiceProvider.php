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
                        'admin.tags.edit',
                        ],'App\Http\ViewComposers\AdminComposer');

        View::composer(['front.home',
                        'front.tag',
                        'front.subcategory'],'App\Http\ViewComposers\BlockComposer');
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

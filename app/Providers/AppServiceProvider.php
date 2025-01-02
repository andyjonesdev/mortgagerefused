<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Models\Page;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function($view)
        {
            $navbars_header = Page::where('published','Yes')->where('menu','Header')->orderBy('order')->get();
            $view->with('navbars_header', $navbars_header);
            $navbars_footer = Page::where('published','Yes')->where('menu','Footer')->get();
            $view->with('navbars_footer', $navbars_footer);
        });
    }
}

<?php

namespace App\Providers;

use App\Models\BlogCategories;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
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
        View::composer('*', function ($view){
            $blog_categories = BlogCategories::all();
            $view -> with('blog_categories', $blog_categories);
        });

        Paginator::useBootstrap();
    }
}

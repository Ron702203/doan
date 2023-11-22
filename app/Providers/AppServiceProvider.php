<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\ServiceProvider;

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
        view()->composer('*', function ($view) {
            $view->with('categoryList', Category::all());
            $view->with('blogList', Blog::all());

            // $view -> with('products', Product::all());
            // $view -> with('banners', Banner::all());
            // $view -> with('users', User::all());
        });
    }
}

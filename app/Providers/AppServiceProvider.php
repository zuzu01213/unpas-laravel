<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Category;

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
    public function boot()
    {
        Paginator::useBootstrap();

        // Fetch all categories
        $categories = Category::all();

        // Share categories with specific views
        View::composer(['layouts.main', 'posts', 'categories.index'], function ($view) use ($categories) {
            $view->with('categories', $categories);
        });
    }
}

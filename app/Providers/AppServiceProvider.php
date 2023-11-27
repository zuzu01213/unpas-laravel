<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Gate;


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

        Gate::define('admin', function(User $user){
            return $user->is_admin;
        });

        $categories = Category::all();

        View::composer(['layouts.main', 'posts', 'categories.index'], function ($view) use ($categories) {
            $view->with('categories', $categories);
        });
    }
}

<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Todo;
use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Using closure based composers...
        View::composer('home', function ($view) {
            $categories = Category::orderBy('name')->get();
            $todos = Todo::with('category')->get();

            $view->with([
                'categories' => $categories,
                'todos' => $todos,
            ]);
        });
    }
}

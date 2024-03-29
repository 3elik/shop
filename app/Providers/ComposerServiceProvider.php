<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layout.part.roots', function($view) {
            $view->with(['items' => Category::roots()]);
        });
        View::composer('layout.part.brands', function($view) {
            $view->with(['items' => Brand::popular()]);
        });
    }
}

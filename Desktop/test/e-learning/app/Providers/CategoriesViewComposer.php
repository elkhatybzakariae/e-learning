<?php

namespace App\Providers;

use App\Models\Categorie;
use App\Models\SousCategorie;
use Illuminate\Support\ServiceProvider;

class CategoriesViewComposer extends ServiceProvider
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
        view()->composer('master.layout', function ($view) {
            $categories = Categorie::all();
            $souscategories = SousCategorie::all();
            $view->with([
                'categories' => $categories,
                'souscategories' => $souscategories,
            ]);
        });
    }
}

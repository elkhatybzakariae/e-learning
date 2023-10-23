<?php

namespace App\Providers;

use App\Models\Categorie;
use App\Models\SousCategorie;
use App\Models\Sujet;
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
            $categories = Categorie::take(10)->get();
            $souscategories = SousCategorie::take(10)->get();
            $sujets = Sujet::take(10)->get();
            $view->with([
                'categories' => $categories,
                'souscategories' => $souscategories,
                'sujets' => $sujets,
            ]);
        });
    }
}

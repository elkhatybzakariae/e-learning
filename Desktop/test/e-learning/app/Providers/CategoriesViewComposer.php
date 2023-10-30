<?php

namespace App\Providers;

use App\Models\Categorie;
use App\Models\Section;
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
            $categories = Categorie::all();
            $souscategories = SousCategorie::all();
            $sujets = Sujet::all();
            $sections = Section::all();
            $view->with([
                'categories' => $categories,
                'souscategories' => $souscategories,
                'sujets' => $sujets,
                'sections' => $sections,
            ]);
        });
    }
}

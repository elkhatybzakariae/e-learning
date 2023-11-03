<?php

namespace App\Providers;

use App\Models\Categorie;
use App\Models\Cour;
use App\Models\Section;
use App\Models\Session;
use App\Models\SousCategorie;
use App\Models\Sujet;
use App\Models\Video;
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
            $cours = Cour::all();
            $sections = Section::all();
            $sessions = Session::all();
            $video = Video::all();
            $view->with([
                'categories' => $categories,
                'souscategories' => $souscategories,
                'sujets' => $sujets,
                'cours' => $cours,
                'sections' => $sections,
                'sessions' => $sessions,
                'video' => $video,
            ]);
        });
    }
}

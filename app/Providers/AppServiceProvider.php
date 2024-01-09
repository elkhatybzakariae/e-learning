<?php

namespace App\Providers;

use App\Models\DetailsUser;
use App\Models\Message;
use App\Models\Panier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('master.navbar', function ($view) {
            $numberOfItems = Panier::where('id_U', Auth::id())->count();
            $haveDU = DetailsUser::where('id_U', Auth::id())->exists();

            $view->with(['numberOfItems' => $numberOfItems, 'haveDU' => $haveDU]);
        });
        view()->composer('auth.message', function ($view) {
            $nbmessages = Message::where('lire',0)->count();
            $messages = Message::with('certpasser', 'user')->orderBy('created_at', 'DESC')->get();
            $view->with(['nbmessages' => $nbmessages, 'messages'=>$messages]);
        });
    }
}

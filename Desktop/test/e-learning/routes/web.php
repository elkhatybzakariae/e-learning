<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\Home;
use App\Http\Controllers\SousCategorieController;
use App\Http\Controllers\SujetController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('/', [Home::class, 'index'])->name('home');

Route::group(['middleware' => 'authen'], function () {
    Route::get('/management', [UserController::class, 'management'])->name('management');
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile/{id}', [UserController::class, 'profile'])->name('profile');
    Route::put('/profile/{id}/update', [UserController::class, 'update'])->name('update');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::get('/signup', [UserController::class, 'registerpage'])->name('registerpage');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/signin', [UserController::class, 'loginpage'])->name('loginpage');
Route::post('/login', [UserController::class, 'login'])->name('login');


Route::get('auth/google', [UserController::class,'redirectToGoogle'])->name('google');
Route::get('auth/google/callback', [UserController::class,'handleGoogleCallback'])->name('googleregister');


// Route::get('auth/google', function () {
//     return Socialite::driver('google')->redirect();
// });

// Route::get('auth/google/callback', [UserController::class,'googleregister'])->name('google');


Route::group(['prefix' => 'categories','middleware' => 'authen'], function () {
    Route::get('/', [CategorieController::class, 'index'])->name('categorie.index');
    Route::get('/create', [CategorieController::class, 'create'])->name('categorie.create');
    Route::post('/store', [CategorieController::class, 'store'])->name('categorie.store');
    Route::get('/edit/{id}', [CategorieController::class, 'edit'])->name('categorie.edit');
    // Route::get('/souscat/{id}', [CategorieController::class, 'souscat'])->name('categorie.souscat');
    Route::put('/update/{id}', [CategorieController::class, 'update'])->name('categorie.update');
    Route::delete('/destroy/{id}', [CategorieController::class, 'destroy'])->name('categorie.destroy');
});

Route::group(['prefix' => 'souscategories','middleware' => 'authen'], function () {
    Route::get('/', [SousCategorieController::class, 'index'])->name('souscategorie.index');
    Route::get('/create', [SousCategorieController::class, 'create'])->name('souscategorie.create');
    Route::post('/store', [SousCategorieController::class, 'store'])->name('souscategorie.store');
    Route::get('/edit/{id}', [SousCategorieController::class, 'edit'])->name('souscategorie.edit');
    // Route::get('/souscat/{id}', [SousCategorieController::class, 'souscat'])->name('souscategorie.souscat');
    Route::put('/update/{id}', [SousCategorieController::class, 'update'])->name('souscategorie.update');
    Route::delete('/destroy/{id}', [SousCategorieController::class, 'destroy'])->name('souscategorie.destroy');
});

Route::group(['prefix' => 'sujet','middleware' => 'authen'], function () {
    Route::get('/', [SujetController::class, 'index'])->name('sujet.index');
    Route::get('/create', [SujetController::class, 'create'])->name('sujet.create');
    Route::post('/store', [SujetController::class, 'store'])->name('sujet.store');
    Route::get('/edit/{id}', [SujetController::class, 'edit'])->name('sujet.edit');
    // Route::get('/souscat/{id}', [SujetController::class, 'souscat'])->name('sujet.souscat');
    Route::put('/update/{id}', [SujetController::class, 'update'])->name('sujet.update');
    Route::delete('/destroy/{id}', [SujetController::class, 'destroy'])->name('sujet.destroy');
});

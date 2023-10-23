<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\Home;
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



// Route::get('/', [CategorieController::class, 'index'])->name('categorie.index');
// Route::get('/create', [CategorieController::class, 'create'])->name('categorie.create');
// Route::post('/store', [CategorieController::class, 'store'])->name('categorie.store');
// Route::get('/edit/{id}', [CategorieController::class, 'edit'])->name('categorie.edit');
// Route::put('/update/{id}', [CategorieController::class, 'update'])->name('categorie.update');
// Route::delete('/destroy/{id}', [CategorieController::class, 'destroy'])->name('categorie.destroy');
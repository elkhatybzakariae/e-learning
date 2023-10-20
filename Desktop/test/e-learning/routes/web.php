<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');
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


<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CourController;
use App\Http\Controllers\Home;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SousCategorieController;
use App\Http\Controllers\SujetController;
use App\Http\Controllers\TestQuestionController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\VideoTerminerController;
use App\Http\Controllers\WishListController;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\URL;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/



// URL::forceScheme('https');




// Route::get('/welcome', function () {
//     $lastC= Cour::orderBy('created_at', 'desc')->take(10)->get();
//     return view('welcome',compact('lastC'));
// })->name('welcome');
Route::get('/', [Home::class, 'index'])->name('home');

Route::group(['middleware' => 'superadmin'], function () {
    Route::get('/gestiondescomptes', [UserController::class, 'gestiondescomptes'])->name('gestiondescomptes');
    Route::get('/roleindex', [RoleController::class, 'roleindex'])->name('roleindex');
    Route::get('/role/create', [RoleController::class, 'rolecreate'])->name('rolecreate');
    Route::post('/role/store', [RoleController::class, 'rolestore'])->name('rolestore');
    Route::delete('/delete/role/{id}', [RoleController::class, 'deleterole'])->name('deleterole');
    Route::get('/edit/user/{id}', [UserController::class, 'edituser'])->name('edituser');
    Route::put('/update/user/{id}', [UserController::class, 'updateuser'])->name('updateuser');
});
Route::group(['middleware' => 'authen'], function () {
    Route::get('/home', [UserController::class, 'index'])->name('index');
    Route::get('/teach', [UserController::class, 'teach'])->name('teach');
    Route::get('/teachdashboard', [UserController::class, 'teachdashboard'])->name('teachdashboard')->middleware('formateur');
    Route::get('/management', [UserController::class, 'management'])->name('management')->middleware('moderateur');
    // Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [UserController::class, 'index2'])->name('home2');
    Route::get('/profile/', [UserController::class, 'profile'])->name('profile');
    Route::put('/profile/update', [UserController::class, 'update'])->name('update');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::get('/signup', [UserController::class, 'registerpage'])->name('registerpage');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/signin', [UserController::class, 'loginpage'])->name('loginpage');
Route::post('/login', [UserController::class, 'login'])->name('login');


Route::get('password/reset', [PasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [PasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [PasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [PasswordController::class, 'reset']);


Route::get('auth/google', [UserController::class, 'redirectToGoogle'])->name('google');
Route::get('auth/google/callback', [UserController::class, 'handleGoogleCallback'])->name('googleregister');

Route::get('/login/github', [UserController::class, 'redirectToGithub'])->name('github');
Route::get('/login/github/callback', [UserController::class, 'handleGithubCallback'])->name('githubregister');


Route::group(['prefix' => 'categories', 'middleware' => 'authen'], function () {
    Route::get('/', [CategorieController::class, 'index'])->name('categorie.index');
    Route::get('/create', [CategorieController::class, 'create'])->name('categorie.create');
    Route::post('/store', [CategorieController::class, 'store'])->name('categorie.store');
    Route::get('/edit/{id}', [CategorieController::class, 'edit'])->name('categorie.edit');
    Route::put('/update/{id}', [CategorieController::class, 'update'])->name('categorie.update');
    Route::delete('/destroy/{id}', [CategorieController::class, 'destroy'])->name('categorie.destroy');
});
Route::group(['prefix' => 'souscategories', 'middleware' => 'authen'], function () {
    Route::get('/', [SousCategorieController::class, 'index'])->name('souscategorie.index');
    Route::get('/create', [SousCategorieController::class, 'create'])->name('souscategorie.create');
    Route::post('/store', [SousCategorieController::class, 'store'])->name('souscategorie.store');
    Route::get('/edit/{id}', [SousCategorieController::class, 'edit'])->name('souscategorie.edit');
    Route::put('/update/{id}', [SousCategorieController::class, 'update'])->name('souscategorie.update');
    Route::delete('/destroy/{id}', [SousCategorieController::class, 'destroy'])->name('souscategorie.destroy');
});
Route::group(['prefix' => 'sujet', 'middleware' => 'authen'], function () {
    Route::get('/', [SujetController::class, 'index'])->name('sujet.index');
    Route::get('/create', [SujetController::class, 'create'])->name('sujet.create');
    Route::post('/store', [SujetController::class, 'store'])->name('sujet.store');
    Route::get('/edit/{id}', [SujetController::class, 'edit'])->name('sujet.edit');
    Route::put('/update/{id}', [SujetController::class, 'update'])->name('sujet.update');
    Route::delete('/destroy/{id}', [SujetController::class, 'destroy'])->name('sujet.destroy');
});
Route::group(['prefix' => 'cour', 'middleware' => 'authen'], function () {
    Route::get('/', [CourController::class, 'index'])->name('cour.index');
    Route::get('/create', [CourController::class, 'create'])->name('cour.create');
    Route::post('/store', [CourController::class, 'store'])->name('cour.store');
    Route::get('/edit/{id}', [CourController::class, 'edit'])->name('cour.edit');
    Route::get('/valider/{id}', [CourController::class, 'valider'])->name('cour.valider');
    Route::get('/coursvalider', [CourController::class, 'coursvalider'])->name('cour.coursvalider');
    Route::get('/coursnonvalider', [CourController::class, 'coursnonvalider'])->name('cour.coursnonvalider');
    Route::put('/update/{id}', [CourController::class, 'update'])->name('cour.update');
    Route::delete('/destroy/{id}', [CourController::class, 'destroy'])->name('cour.destroy');

    Route::get('/category/{name}', [CourController::class, 'filterparcat'])->name('cour.filterparcat');
    Route::get('/subcategory/{name}', [CourController::class, 'filterparsouscat'])->name('cour.filterparsouscat');
    Route::get('/subject/{name}', [CourController::class, 'filterparsj'])->name('cour.filterparsj');

    Route::get('/search', [CourController::class, 'search'])->name('cour.search');
    Route::get('/show/{id}', [CourController::class, 'show'])->name('cour.show');
    Route::get('/category/show/{name}', [CourController::class, 'catshow'])->name('cour.catshow');

});
Route::group(['prefix' => 'section', 'middleware' => 'authen'], function () {
    Route::get('/', [SectionController::class, 'index'])->name('section.index');
    Route::get('/create', [SectionController::class, 'create'])->name('section.create');
    Route::post('/store', [SectionController::class, 'store'])->name('section.store');
    Route::get('/edit/{id}', [SectionController::class, 'edit'])->name('section.edit');
    Route::put('/update/{id}', [SectionController::class, 'update'])->name('section.update');
    Route::delete('/destroy/{id}', [SectionController::class, 'destroy'])->name('section.destroy');
});
Route::group(['prefix' => 'session', 'middleware' => 'authen'], function () {
    Route::get('/', [SessionController::class, 'index'])->name('session.index');
    Route::get('/create', [SessionController::class, 'create'])->name('session.create');
    Route::post('/store', [SessionController::class, 'store'])->name('session.store');
    Route::get('/edit/{id}', [SessionController::class, 'edit'])->name('session.edit');
    Route::put('/update/{id}', [SessionController::class, 'update'])->name('session.update');
    Route::delete('/destroy/{id}', [SessionController::class, 'destroy'])->name('session.destroy');
});
Route::group(['prefix' => 'video', 'middleware' => 'authen'], function () {
    Route::get('/create', [VideoController::class, 'create'])->name('video.create');
    Route::get('/', [VideoController::class, 'index'])->name('video.index');
    Route::post('/store', [VideoController::class, 'store'])->name('video.store');
    Route::get('/edit/{id}', [VideoController::class, 'edit'])->name('video.edit');
    Route::get('/show/{id}', [VideoController::class, 'show'])->name('video.show');
    Route::put('/update/{id}', [VideoController::class, 'update'])->name('video.update');
    Route::delete('/destroy/{id}', [VideoController::class, 'destroy'])->name('video.destroy');
});
Route::group(['prefix' => 'media', 'middleware' => 'authen'], function () {
    Route::get('/', [MediaController::class, 'index'])->name('media.index');
    Route::get('/create', [MediaController::class, 'create'])->name('media.create');
    Route::post('/store', [MediaController::class, 'store'])->name('media.store');
    // Route::get('/edit/{id}', [MediaController::class, 'edit'])->name('media.edit');
    // Route::put('/update/{id}', [MediaController::class, 'update'])->name('media.update');
    Route::delete('/destroy/{id}', [MediaController::class, 'destroy'])->name('media.destroy');
    Route::get('/download/{id}', [MediaController::class, 'downloadFile'])->name('file.download');

});
Route::group(['prefix' => 'certificate', 'middleware' => 'authen'], function () {
    Route::get('/', [CertificateController::class, 'index'])->name('certificate.index');
    Route::get('/all', [CertificateController::class, 'choisircert'])->name('certificate.choisircert');
    Route::get('/create', [CertificateController::class, 'create'])->name('certificate.create');
    Route::get('/passer/{id}', [CertificateController::class, 'passer'])->name('certificate.passer');
    Route::post('/store', [CertificateController::class, 'store'])->name('certificate.store');
    Route::delete('/destroy/{id}', [CertificateController::class, 'destroy'])->name('certificate.destroy');
});
Route::group(['prefix' => 'quiz', 'middleware' => 'authen'], function () {
    Route::get('/', [QuizController::class, 'index'])->name('quiz.index');
    Route::get('/create', [QuizController::class, 'create'])->name('quiz.create');
    Route::post('/store', [QuizController::class, 'store'])->name('quiz.store');
    Route::delete('/destroy/{id}', [QuizController::class, 'destroy'])->name('quiz.destroy');
    Route::get('/passer/{id}', [QuizController::class, 'passer'])->name('quiz.passer');
    Route::post('/valider', [QuizController::class, 'valider'])->name('quiz.valider');
});
Route::group(['prefix' => 'testquestion', 'middleware' => 'authen'], function () {
    Route::get('/{id}', [TestQuestionController::class, 'index'])->name('testquestion.index');
    Route::get('/create/{id}', [TestQuestionController::class, 'create'])->name('testquestion.create');
    Route::post('/store/{id}', [TestQuestionController::class, 'store'])->name('testquestion.store');
    Route::delete('/destroy/{id}', [TestQuestionController::class, 'destroy'])->name('testquestion.destroy');
});
Route::group(['prefix' => 'panier', 'middleware' => 'authen'], function () {
    Route::get('/', [PanierController::class, 'index'])->name('panier.index');
    Route::post('/store', [PanierController::class, 'store'])->name('panier.store');
    Route::delete('/delete/{id}', [PanierController::class, 'delete'])->name('panier.delete');
});
Route::group(['prefix' => 'wishlist', 'middleware' => 'authen'], function () {
    Route::get('/', [WishListController::class, 'index'])->name('wishlist.index');
    Route::post('/store', [WishListController::class, 'store'])->name('wishlist.store');
    Route::delete('/delete/{id}', [WishListController::class, 'delete'])->name('wishlist.delete');
});
Route::group(['prefix' => 'videoTerminer', 'middleware' => 'authen'], function () {
    Route::get('/progress', [VideoTerminerController::class, 'progress'])->name('videoTerminer.progress');
    Route::post('/check', [VideoTerminerController::class, 'check'])->name('videoTerminer.check');
    Route::delete('/delete', [VideoTerminerController::class, 'delete'])->name('videoTerminer.delete');
});

Route::fallback(function () {
    return view('404');
});

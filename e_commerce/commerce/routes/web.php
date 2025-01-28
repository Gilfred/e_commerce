<?php

use App\Http\Controllers\AffichagearticleController;
use App\Http\Controllers\ArticltraiteController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');})->name('welcome');
Route::get('/',[AffichagearticleController::class,'index'])->name('welcome');
Route::get('/inscription',[LocationController::class,'index'])->name('enregistrement');
Route::get('/affichage_info',[LocationController::class,'create'])->middleware('auth')->name('image.profile');
Route::get('/validate_page',[LocationController::class,'affichagePage'])->middleware('auth')->name('validate.page');
//Route::delete('/location_refuser{id}',[RegisteredUserController::class,'destroy'])->middleware('auth')->name('refus');
Route::post('/confirm_payment',[LocationController::class,'confirmation'])->middleware('auth')->name('confirm.momo');
Route::get('/payement',[LocationController::class,'paymentPage'])->middleware('auth')->name('payement');
Route::post('/payemnt',[LocationController::class,'validation'])->middleware('auth')->name('feda');
Route::get('/post_articles',[ArticltraiteController::class,'index'])->middleware('auth')->name('auth')->name('articles');
Route::post('/post_articles',[ArticltraiteController::class,'store'])->middleware('auth')->name('enregistrement.articles');
Route::get('/articles_publier',[ArticltraiteController::class,'affichage'])->middleware('auth')->name('the.shop');
Route::delete('/suppression{id}',[ArticltraiteController::class,'destroy'])->middleware('auth')->name('suppression.articles');
Route::get('/edit/{id}/edit',[ArticltraiteController::class,'edit'])->middleware('auth')->name('articles.edit');
Route::put('/mjs/{id}',[ArticltraiteController::class,'update'])->middleware('auth')->name('modifications');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

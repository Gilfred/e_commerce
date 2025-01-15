<?php

use App\Http\Controllers\ArticltraiteController;
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
Route::get('/inscription',[LocationController::class,'index'])->name('enregistrement');
Route::get('/affichage_info',[LocationController::class,'create'])->middleware('auth')->name('image.profile');
Route::get('/validate_page',[LocationController::class,'affichagePage'])->middleware('auth')->name('validate.page');
Route::post('/confirm_payment',[LocationController::class,'confirmation'])->middleware('auth')->name('confirm.momo');
Route::get('/payement',[LocationController::class,'paymentPage'])->middleware('auth')->name('payement');
Route::post('/payemnt',[LocationController::class,'validation'])->middleware('auth')->name('feda');
Route::get('/post_articles',[ArticltraiteController::class,'index'])->middleware('auth')->name('auth')->name('articles');
Route::post('/article_register',[ArticltraiteController::class,'store'])->middleware('auth')->name('enregistrement');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

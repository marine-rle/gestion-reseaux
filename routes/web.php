<?php

use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\OrdinateurController;
use App\Http\Controllers\ServeurController;
use App\Http\Controllers\ReseauController;

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


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/', [AccueilController::class, 'index'])->name('accueil.index');


    Route::resource('ordinateur', OrdinateurController::class);
    Route::resource('serveur', ServeurController::class);
    Route::resource('reseau', ReseauController::class);
    Route::resource('accueil', AccueilController::class);
});


Route::get('locale', [LocalizationController::class, 'getLang'])->name('getlang');

Route::get('locale/{lang}', [LocalizationController::class, 'setLang'])->name('setlang');

require __DIR__.'/auth.php';


<?php

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

/*
Route::get('/', function () {
    return redirect()->route('accueil.index');
});
*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/', [AccueilController::class, 'index'])->name('accueil.index');
});

Route::resource('ordinateur', OrdinateurController::class);
Route::resource('serveur', ServeurController::class);
Route::resource('reseau', ReseauController::class);
Route::resource('accueil', AccueilController::class);

//Route::get('language/{code_iso}' ,  [LanguageController::class, 'change'])->name('language.change');

Route::get('set-locale/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('set.locale');

require __DIR__.'/auth.php';


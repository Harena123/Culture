<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ImportController;

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
    return view('welcome');
});
Route::get('/home', function () {
    return view('pages.home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/listes', function () {
    return view('pages.liste');
});
Route::get('/form', function () {
    return view('pages.form');
});
Route::get('/details', function () {
    return view('pages.details');
});
Route::get('/modif', function () {
    return view('pages.modif');
});
Route::get('/accueil', function () {
    return view('construction.accueil');
});
// Route::get('/chart', function () {
//     return view('pages.chart');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/traitlist', [ImportController::class, 'afficherImports'])->name('importListe');

Route::get('/traitetu', [ImportController::class, 'afficherEtuMenu'])->name('etudiants');

Route::get('/traitmoyennne', [ImportController::class, 'afficherMoyenne'])->name('moyenne');

Route::get('/traitdetails/{id}', [ImportController::class, 'afficherImportsDetails'])->name('details');

Route::get('/traitmodif/{id}', [ImportController::class, 'afficherModif'])->name('modif');

Route::get('/generate-pdf-note/{id}', [ImportController::class, 'generatePDF'])->name('generate-pdf-note');

Route::post('/trait', [ImportController::class, 'import'])->name('import.csv');

Route::post('/traitMenuEtu', [ImportController::class, 'store'])->name('insert.MenuEtu');

Route::get('/chart', [ImportController::class, 'chartMenu'])->name('chart.menu');


require __DIR__.'/auth.php';

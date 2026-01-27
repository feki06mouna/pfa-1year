<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::middleware('auth')->prefix('stagiaire')->name('stagiaire.')->group(function () {
    Route::get('/liste', [StagiaireController::class, 'listeStagiaire'])->name('liste');
    Route::get('/delete/{id}', [StagiaireController::class, 'deleteStagiaire'])->name('delete');

    Route::get('/form', [StagiaireController::class, 'formulaire'])->name('form');
    Route::post('/add', [StagiaireController::class, 'addStagiaire'])->name('add');

    Route::get('/edit/{id}', [StagiaireController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [StagiaireController::class, 'update'])->name('update');
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

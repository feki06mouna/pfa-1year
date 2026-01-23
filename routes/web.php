<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StagiaireController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/liste', [StagiaireController::class, 'listeStagiaire'])->name('listeStagiaire');
Route::get('/delete/{id}', [StagiaireController::class,'deleteStagiaire'])->name('deleteStagiaire');

Route::get('/form', [ StagiaireController::class , 'formulaire'])->name('formulaire');
Route::post('/add', [ StagiaireController::class , 'addStagiaire'])->name('addStagiaire');

Route::get('/edit/{id}',[StagiaireController::class, 'edit'])->name('editStagiaire');
Route::post('/update/{id}',[StagiaireController::class , 'update'])->name('updateStagiaire');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

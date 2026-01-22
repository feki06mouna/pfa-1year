<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StagiaireController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/liste', [StagiaireController::class, 'listeStagiaire']);
Route::get('/delete/{id}', [StagiaireController::class,'deleteStagiaire']);


Route::get('/form', [ StagiaireController::class , 'formulaire']);
Route::post('/add', [ StagiaireController::class , 'addStagiaire']);

Route::get('/afficheform/{id}',[StagiaireController::class, 'afficheform']);
Route::post('/update/{id}',[StagiaireController::class , 'update']);

//Route::middleware('auth')->group(function () {
//    Route::get('/stagiaires', [StagiaireController::class, 'index']);
//});



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

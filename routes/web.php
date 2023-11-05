<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\EncadrantController;
use App\Http\Controllers\sujetController;
use App\Http\Controllers\IndexController;






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
    return view('logo');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/listestagiaire', function () {
    return view('listestagiaire');
});
Route::get('/ajouterstagiaire', function () {
    return view('ajouterstagiaire');
});
Route::get('/AjouterEnadrant', function () {
    return view('AjouterEnadrant');
});
Route::get('/listeencadrant', function () {
    return view('listeencadrant');
});
Route::get('/ajouterSujet', function () {
    return view('ajouterSujet');
});
Route::get('/listesujet', function () {
    return view('listesujet');
});

Route::get('/attestation', function () {
    return view('attestation');
});



Route::get('/updateStagaire', function () {
    return view('updateStagaire');
});
Route::get('/UpdateENcadrant', function () {
    return view('UpdateENcadrant');
});
Route::get('/UpdateSujet', function () {
    return view('UpdateSujet');
});







Route::post('/signup', [UserController::class, 'signup'])->name('signup');
Route::post('/login', [UserController::class, 'login'])->name('login');




Route::post('/stagiaire', [StagiaireController::class, 'store'])->name('stagiaire.store');
Route::get('/listestagiaire', [StagiaireController::class, 'show'])->name('listestagiaire.show');
Route::delete('/stagiaire/{id}', [StagiaireController::class, 'destroy'])->name('stagiaire.delete');
Route::get('stagiaire/{id}/edit', [StagiaireController::class, 'edit'])->name('stagiaire.edit');
Route::post('stagiaire/{id}/update', [StagiaireController::class, 'update'])->name('stagiaire.update');
Route::get('/stagiaire/{id}/print', [StagiaireController::class, 'printAttestation'])->name('stagiaire.print');
Route::get('/stagiaire/cv/{id}', [StagiaireController::class, 'showCV'])->name('stagiaire.showCV');


Route::get('/stagiaire/{id}/attestation', [StagiaireController::class, 'attestation'])->name('stagiaire.attestation');








Route::post('/encadrant/ajouter', [encadrantController::class, 'ajouter'])->name('encadrant.ajouter');
Route::get('/listeencadrant', [EncadrantController::class, 'show'])->name('listeencadrant.show');
Route::get('/encadrant/{id}/edit', [EncadrantController::class, 'edit'])->name('encadrant.edit');
Route::put('/encadrant/{encadrant}', [EncadrantController::class, 'update'])->name('encadrant.update');
Route::delete('/encadrant/{encadrant}', [EncadrantController::class, 'destroy'])->name('encadrant.destroy');
















Route::post('/sujet/ajouterSujet', [sujetController::class, 'ajouterSujet'])->name('sujet.ajouterSujet');

Route::get('/listesujet', [sujetController::class, 'show'])->name('listesujet.show');
Route::delete('/sujet/{id}', [sujetController::class, 'destroy'])->name('sujet.destroy');
Route::get('/sujet/{id}/edit', [SujetController::class, 'edit'])->name('sujet.edit');
Route::put('/sujet/{id}', [SujetController::class, 'update'])->name('sujet.update');
Route::get('/sujet/{id}/showRapport',[ sujetController::class,'showRapport'])->name('sujet.showRapport');








Route::get('/index', [IndexController::class, 'index'])->name('index');







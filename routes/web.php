<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SimulateController;
use App\Http\Controllers\SouscriptionController;

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
 // Routes principales
 Route::get('/', [HomeController::class, 'index'])->name('home');
 Route::get('/login', [HomeController::class, 'login'])->name('login');
 Route::post('/login', [HomeController::class, 'login_post'])->name('login');



 //administration route



 Route::get('/logout', function () {
    session()->forget(['jwt_token', 'user_nom', 'user_prenom', 'user_role', 'user_login']);
    return redirect('/login');
});


Route::middleware(['check.auth'])->group(function () {
    Route::prefix('backoffice')->group(function () {
        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
        Route::get('/utilisateur', [AdminController::class, 'listUtilisateur'])->name('utilisateur');
        Route::post('/utilisateur/create', [AdminController::class, 'createUtilisateur'])->name('utilisateur.create');
        Route::post('/utilisateur/edit', [AdminController::class, 'editUtilisateur'])->name('utilisateur.edit');
        Route::post('/utilisateur/delete', [AdminController::class, 'deleteUtilisateur'])->name('utilisateur.delete');

        Route::get('/souscription/liste', [AdminController::class, 'listSouscription'])->name('listes');

        Route::get('/simulateur', [SimulateController::class, 'index'])->name('simulate');
        Route::get('/souscription', [SouscriptionController::class, 'index'])->name('souscription');

        Route::post('/souscription', [SouscriptionController::class, 'createSouscription'])->name('souscription');


        Route::get('/attestation/{id}', [SouscriptionController::class, 'downloadAttestation'])
        ->name('download.attestation');


        Route::post('/simulateur', [SimulateController::class, 'createSimulation'])->name('simulate');




    });
});

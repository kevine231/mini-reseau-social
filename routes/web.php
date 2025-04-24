<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MailController; // Ajout de MailController
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');  // Route pour afficher la page d'accueil
});

// Route pour le tableau de bord, avec le contrôleur DashboardController
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Routes protégées par le middleware 'auth'
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/envoyer-email', [MailController::class, 'envoyer']); // Ajout de la route pour envoyer l'e-mail

// Routes pour activer/désactiver les utilisateurs
Route::get('/user/{id}/activate', [UserController::class, 'activate']);
Route::get('/user/{id}/deactivate', [UserController::class, 'deactivate']);
Route::get('/users', [UserController::class, 'index']);

// Route pour afficher le formulaire d'inscription
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');

// Route pour traiter l'inscription
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');

require __DIR__.'/auth.php';


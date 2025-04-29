<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route d'accueil pour tous
Route::get('/', function () {
    return Inertia::render('Landing');
})->name('landing');

// Page de contact
Route::get('/contact', function () {
    return Inertia::render('Contact');
})->name('contact');


// Auth routes (Login, Register, Forgot Password, etc.)
require __DIR__.'/auth.php';

// Routes accessibles seulement aux utilisateurs connectés
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Eventuellement, si tu as d'autres routes front SPA en mode Vue (comme /about, /contact, etc.)
// Tu pourrais rajouter un "catch-all" **seulement pour certaines pages**
// mais attention à ne PAS écraser les routes existantes !


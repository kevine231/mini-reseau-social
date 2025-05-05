<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\PostLikeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route d'accueil pour tous
Route::get('/', function () {
    return Inertia::render('Landing');
})->name('landing');

// Routes de contact
Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/about', function () {
    return Inertia::render('About');
})->name('about');

// Auth routes (Login, Register, Forgot Password, etc.)
require __DIR__.'/auth.php';

// Routes accessibles seulement aux utilisateurs connectés
Route::middleware('auth')->group(function () {
    // Dashboard utilisateur
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Post likes
    Route::post('/posts/{post}/like', [PostLikeController::class, 'store'])->name('posts.like');
});

// Eventuellement, si tu as d'autres routes front SPA en mode Vue (comme /about, /contact, etc.)
// Tu pourrais rajouter un "catch-all" **seulement pour certaines pages**
// mais attention à ne PAS écraser les routes existantes !

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});


<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// ==================== PUBLIC PAGES ====================
Route::get('/', function () {
    return view('public.home');  // Home Page
})->name('home');

Route::get('/portfolio', function () {
    return view('public.portfolio');  // Portfolio Page
})->name('portfolio');

Route::get('/contact', function () {
    return view('public.contact');  // Contact Page
})->name('contact');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// ==================== ADMIN PAGES (auth required) ====================
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');  // Admin Dashboard
    })->name('dashboard');

    Route::get('/projects', function () {
        return view('admin.projects');  // Projects Table
    })->name('admin.projects');

    Route::get('/purchases', function () {
        return view('admin.purchases');  // Purchases Table
    })->name('admin.purchases');

    Route::get('/assets', function () {
        return view('admin.assets');  // Assets Table
    })->name('admin.assets');

    Route::get('/financial', function () {
        return view('admin.financial');  // Financial Summary Table
    })->name('admin.financial');

    Route::get('/export', function () {
        return view('admin.export');  // Export Jobs Table
    })->name('admin.export');
    
});



// ==================== PROFILE PAGES (auth required) ====================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ==================== AUTH ROUTES ====================
require __DIR__.'/auth.php';

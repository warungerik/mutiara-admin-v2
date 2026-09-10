<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin/dashboard');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/analytics', [AdminController::class, 'analytics'])->name('analytics');
    Route::get('/orders', [AdminController::class, 'orders'])->name('orders');
    Route::get('/products', [AdminController::class, 'products'])->name('products');
    Route::get('/users', [AdminController::class, 'users'])->name('users.index');
    Route::get('/users/create', [AdminController::class, 'createUser'])->name('users.create');
    Route::post('/users', [AdminController::class, 'storeUser'])->name('users.store');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::get('/notifications', [AdminController::class, 'notifications'])->name('notifications');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
    Route::get('/components', [AdminController::class, 'components'])->name('components');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'storeUser'])->name('register.post');
Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

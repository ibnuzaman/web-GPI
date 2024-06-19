<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// Customer route
// Route::middleware(['auth', 'customerMiddleware'])->group(function () {
//     Route::get('dashboard', [CustomerController::class, 'index'])->name('dashboard');
// });

// Admin route
// Route::middleware(['auth', 'adminMiddleware'])->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
// });
<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\ProdukController;

Route::get('/', function () {
    return view('index');
})->name('home');


// Route::get('/dashboard', function () {
//     return view('index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// Customer route
Route::middleware(['auth', 'customerMiddleware'])->group(function () {
    Route::get('Home', [CustomerController::class, 'index'])->name('home-customer');
    Route::get('Transaksi', [CustomerController::class, 'transaksi'])->name('transaksi');
});

// Admin route
Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard-admin');
    Route::get('/admin/produk', [AdminController::class, 'produk'])->name('admin.produk-admin');
    Route::get('/admin/rekapData', [AdminController::class, 'rekapData'])->name('admin.rekap-admin');
    Route::get('/admin/konfirmasi-admin', [AdminController::class, 'konfirmasiBayar'])->name('admin.konfirmasi-admin');
    Route::get('/tambah-admin', [AdminController::class, 'tambahAdmin'])->name('tambah-admin');
    Route::post('/register-admin', [AdminController::class, 'storeAdmin'])->name('store.admin');
});


// Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('test');
Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
Route::get('/detail-produk', [ProdukController::class, 'detailProduk'])->name('detail-produk');
Route::get('/add-produk', [ProdukController::class, 'addProduk'])->name('add-produk');
Route::get('/edit-produk', [ProdukController::class, 'editProduk'])->name('edit-produk');

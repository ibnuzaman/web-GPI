<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\CheckoutController;
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
    Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
});

// Admin route
Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard-admin');
    Route::get('/admin/rekapData', [AdminController::class, 'rekapData'])->name('admin.rekap-admin');
    Route::get('/admin/konfirmasi-admin', [AdminController::class, 'konfirmasiBayar'])->name('admin.konfirmasi-admin');
    Route::post('/admin/orders/{order}/acc', [AdminController::class, 'confirm'])->name('admin.orders.diterima');
    Route::post('/admin/orders/{order}/decline', [AdminController::class, 'reject'])->name('admin.orders.ditolak');
    Route::get('/tambah-admin', [AdminController::class, 'tambahAdmin'])->name('tambah-admin');
    Route::post('/register-admin', [AdminController::class, 'storeAdmin'])->name('store.admin');
    Route::get('/admin/produk', [ProdukController::class, 'create'])->name('admin.produk-admin');
    Route::get('/add-produk', [ProdukController::class, 'addProduk'])->name('add-produk');
    // // Route::get('/detail-produk', [ProdukController::class, 'detailProduk'])->name('detail-produk');
    // Route::get('/detail-produk/{id}', [ProdukController::class, 'show'])->name('detail-produk');
    Route::get('/edit-produk/{id}', [ProdukController::class, 'editProduk'])->name('edit-produk');
    Route::put('/update-produk/{id}', [ProdukController::class, 'updateProduk'])->name('update-produk');
    Route::delete('/hapus-produk/{id}', [ProdukController::class, 'hapusProduk'])->name('hapus-produk');
    Route::post('/tambah', [ProdukController::class, 'storeProduk'])->name('store-produk')->middleware(['auth', 'adminMiddleware']);
});


Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
Route::get('/detail-produk/{id}', [ProdukController::class, 'show'])->name('detail-produk');
Route::get('/test', [ProdukController::class, 'detailProduk']);

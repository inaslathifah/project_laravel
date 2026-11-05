<?php

use App\Http\Controllers\BelajarController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/category/{slug}', [CatalogController::class, 'category'])->name('category.show');
Route::get('/product/{slug}', [CatalogController::class, 'product'])->name('product.show');

// get, post, put, delete
// si ('belajar') yg bakal di cari ke browser (localhost:8000/belajar) gitu contohnya.
Route::get('belajar', [BelajarController::class, 'index']);

Route::get('tambah', [BelajarController::class, 'tambah'])->name('tambah');
Route::post('actionTambah', [BelajarController::class, 'actionTambah'])->name('actionTambah');

Route::get('pengurangan', [BelajarController::class, 'kurang'])->name('pengurangan');
Route::post('actionKurang', [BelajarController::class, 'actionKurang'])->name('actionKurang');

Route::get('bagi', [BelajarController::class, 'bagi'])->name('bagi');
Route::post('actionBagi', [BelajarController::class, 'actionBagi'])->name('actionBagi');

Route::get('perkalian', [BelajarController::class, 'kali'])->name('perkalian');
Route::post('actionKali', [BelajarController::class, 'actionKali'])->name('actionKali');

Route::get('jumlah', [BelajarController::class, 'jumlah'])->name('jumlah');

// prefix
Route::prefix('admin')->name('admin.')->group(function () {
    // mau melihat tampilan login
    Route::get('/login', [LoginController::class, 'login']);
    Route::post('/actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');

    Route::resource('dashboard', DashboardController::class);
    Route::resource('user', UserController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);

    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BelajarController;

Route::get('/', function () {
    return view('welcome');
});

// get, post, put, delete
Route::get('belajar',[BelajarController::class, 'index']);
Route::get('tambah',[BelajarController::class, 'tambah']) -> name('tambah');
Route::get('kurang',[BelajarController::class, 'kurang']) -> name('kurang');
Route::get('kali',[BelajarController::class, 'kali']) -> name('kali');
Route::get('bagi',[BelajarController::class, 'bagi']) -> name('bagi');

Route::post('actionTambah',[BelajarController::class, 'actionTambah']) -> name('actionTambah');
Route::post('actionKurang',[BelajarController::class, 'actionKurang']) -> name('actionKurang');
Route::post('actionKali',[BelajarController::class, 'actionKali']) -> name('actionKali');
Route::post('actionBagi',[BelajarController::class, 'actionBagi']) -> name('actionBagi');

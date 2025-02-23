<?php

use App\Http\Controllers\AuthManualController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('kategori', KategoriController::class);
    Route::resource('penerbit', PenerbitController::class);
    Route::resource('buku', BukuController::class);
});

// Route untuk authentication
Route::get('/login', [AuthManualController::class, 'index'])->name('login');
Route::post('/login', [AuthManualController::class, 'loginProsses'])->name('loginProsses');
Route::post('/logout', [AuthManualController::class, 'logout'])->name('logout');
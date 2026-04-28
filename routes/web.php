<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ContacController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\BukuController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/About', [AboutController::class, 'index']);
Route::get('/Beranda', [BerandaController::class, 'index']);
Route::get('/Contac', [ContacController::class, 'index']);
Route::get('/Produk', [ProdukController::class, 'index']);
Route::get('/Riwayat', [RiwayatController::class, 'index']);


Route::resource('/buku', BukuController::class);
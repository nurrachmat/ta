<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\JenisSimpananController;
use App\Http\Controllers\API\AnggotaController;
use App\Http\Controllers\API\PinjamanController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Tambahkan route untuk GET jenis_simpanan
Route::get('/jenis-simpanan', [JenisSimpananController::class, 'index']);

// Tambahkan route untuk POST jenis_simpanan
Route::post('/jenis-simpanan', [JenisSimpananController::class, 'store']);

// Tambahkan route untuk GET anggota
Route::get('/anggota', [AnggotaController::class, 'index']);
Route::post('/anggota', [AnggotaController::class, 'store']); // Tambahkan route ini

// Tambahkan route untuk GET pinjaman
Route::get('/pinjaman', [PinjamanController::class, 'index']);


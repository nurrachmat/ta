<?php

use App\Http\Controllers\JenisSimpananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\SimpananController; 
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PinjamanController; // Tambahkan ini
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('jenis_simpanan', JenisSimpananController::class);
Route::resource('anggota', AnggotaController::class);
Route::resource('simpanan', SimpananController::class); 
Route::resource('pinjaman', PinjamanController::class); // Tambahkan ini

require __DIR__.'/auth.php';

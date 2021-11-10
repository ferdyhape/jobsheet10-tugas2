<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController2;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KRSController;
use Illuminate\Http\Request;

Route::resource('mahasiswas', MahasiswaController::class);
Route::get('mahasiswa/cetak_mahasiswa', [MahasiswaController::class, 'cetak']);
Route::get('/search', [MahasiswaController::class, 'search'])->name('search');

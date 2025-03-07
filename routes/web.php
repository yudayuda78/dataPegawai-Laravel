<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataPegawaiController;

Route::get('/', [DataPegawaiController::class, 'index'])->name('/');;
Route::get('/tambahdata', [DataPegawaiController::class, 'tambahdata'])->name('tambahdata');
Route::post('/tambahdata', [DataPegawaiController::class, 'create']);
Route::post('/upload-dokumen', [DataPegawaiController::class, 'uploadDokumen'])->name('uploadDokumen');

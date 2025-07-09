<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManfaatPensiunController;
use App\Http\Controllers\KaryawanController;

Route::get('/', function () {
    return redirect()->route('karyawan.index');
});
Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
Route::get('/mp/form/{id}', [ManfaatPensiunController::class, 'form'])->name('mp.form');
Route::post('/mp/hitung', [ManfaatPensiunController::class, 'hitung'])->name('mp.hitung');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;

// Route resource untuk Karyawan
Route::resource('karyawan', KaryawanController::class);

// Route untuk menampilkan data yang dihapus (soft deleted)
Route::get('karyawan-deleted', [KaryawanController::class, 'deleted'])->name('karyawan.deleted');

// Route untuk restore data yang dihapus
Route::post('karyawan/restore/{id}', [KaryawanController::class, 'restore'])->name('karyawan.restore');

// Route untuk force delete data yang sudah dihapus
Route::delete('karyawan/forceDelete/{id}', [KaryawanController::class, 'forceDelete'])->name('karyawan.forceDelete');

<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route Mahasiswa

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name("mahasiswa-index");
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name("mahasiswa-create");
Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name("mahasiswa-store");
Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name("mahasiswa-edit");
Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update'])->name("mahasiswa-update");
Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name("mahasiswa-deleted");
Route::get('/mahasiswa/export/excel', [MahasiswaController::class, 'exportExcel'])->name("mahasiswa-export-excel");


require __DIR__.'/auth.php';

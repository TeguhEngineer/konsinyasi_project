<?php

use App\Http\Controllers\DistributorController;
use App\Http\Controllers\KonsinyasiController;
use App\Http\Controllers\ProdukCotroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('/produks', ProdukCotroller::class);
    Route::post('/produks/bulk-delete', [ProdukCotroller::class, 'bulkDelete'])->name('produks.bulkDelete');
    Route::resource('/distributors', DistributorController::class);
    Route::post('/distributors/bulk-delete', [DistributorController::class, 'bulkDelete'])->name('distributors.bulkDelete');
    Route::resource('/konsinyasis', KonsinyasiController::class);
    Route::post('/konsinyasis/bulk-delete', [KonsinyasiController::class, 'bulkDelete'])->name('konsinyasis.bulkDelete');
    Route::resource('/users', UserManagementController::class);
    Route::post('/users/bulk-delete', [UserManagementController::class, 'bulkDelete'])->name('users.bulkDelete');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

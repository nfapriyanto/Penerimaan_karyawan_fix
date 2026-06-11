<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\TopsisController;
use App\Http\Controllers\AhpController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
Route::middleware('role:hrd')->group(function () {

    Route::view('/hrd/dashboard', 'hrd.dashboard');

    Route::resource('pelamar', PelamarController::class);
    Route::resource('kriteria', KriteriaController::class);
    Route::resource('penilaian', PenilaianController::class);

    Route::get('/topsis', [TopsisController::class, 'index'])
        ->name('topsis.index');
});
    Route::middleware('role:pimpinan')->group(function () {

    Route::get('/pimpinan/dashboard', [TopsisController::class, 'pimpinan'])
        ->name('pimpinan.dashboard');

    Route::get('/hasil-topsis', [TopsisController::class, 'index'])
        ->name('pimpinan.topsis');

});
Route::middleware('role:admin')->group(function () {

    Route::view('/admin/dashboard', 'admin.dashboard');
});

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // Pelamar
    Route::resource('pelamar', PelamarController::class);

    // Kriteria
    Route::resource('kriteria', KriteriaController::class);

    //Penilaian
    Route::resource('penilaian', PenilaianController::class);

    //Topsis
    Route::get('/topsis', [TopsisController::class, 'index']);

    //Ahp
    Route::get('/ahp', [AhpController::class, 'index']);
    Route::post('/ahp', [AhpController::class, 'store']);

});

require __DIR__.'/auth.php';
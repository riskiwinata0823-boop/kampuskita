<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\AdminAcaraController;
use App\Http\Controllers\AdminUserController;
use Illuminate\Http\Request;

Route::view('/', 'welcome')->name('home');

Route::get('/dashboard', function (Request $request) {
    return redirect()->route(
        $request->user()->role === 'admin'
            ? 'admin.dashboard'
            : 'peserta.dashboard'
    );
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::get('/acara', [AdminAcaraController::class, 'index'])
            ->name('acara.index');

        Route::get('/acara/tambah', [AdminAcaraController::class, 'create'])
            ->name('acara.create');

        Route::post('/acara', [AdminAcaraController::class, 'store'])
            ->name('acara.store');

        Route::get('/users', [AdminUserController::class, 'index'])
            ->name('users.index');

        Route::put('/users/{user}/role', [AdminUserController::class, 'update'])
            ->name('users.update');
    });

Route::middleware(['auth', 'role:peserta'])
    ->prefix('peserta')
    ->name('peserta.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('peserta.dashboard');
        })->name('dashboard');

        Route::get('/acara', [PemesananController::class, 'index'])
            ->name('acara');

        Route::post('/acara/{acara}/pesan', [PemesananController::class, 'pesan'])
            ->name('pesan');

        Route::get('/pemesanan-saya', [PemesananController::class, 'pemesananSaya'])
            ->name('pemesanan');
    });

require __DIR__.'/auth.php';

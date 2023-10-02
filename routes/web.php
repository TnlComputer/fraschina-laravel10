<?php

use App\Http\Controllers\RepresentacionController;
use App\Http\Controllers\DistribucionController;
use App\Http\Controllers\MolinosController;
use App\Http\Controllers\AgroController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\TransporteController;
use App\Http\Controllers\ExpedicionController;
use App\Http\Controllers\AgendaController;
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
    Route::get('/representaciones', [RepresentacionController::class, 'index'])->name('representacion.index');
    Route::get('/representaciones/{representacion}', [RepresentacionController::class, 'show'])->name('representacion.show');
    Route::get('/distribuciones', [DistribucionController::class, 'index'])->name('distribucion');
    Route::get('/agros', [AgroController::class, 'index'])->name('agro');
    Route::get('/molinos', [MolinosController::class, 'index'])->name('molinos');
    Route::get('/proveedores', [ProveedoresController::class, 'index'])->name('proveedores');
    Route::get('/transportes', [TransporteController::class, 'index'])->name('transporte');
    Route::get('/expedicion', [ExpedicionController::class, 'index'])->name('expedicion');
    Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda');
});

require __DIR__ . '/auth.php';
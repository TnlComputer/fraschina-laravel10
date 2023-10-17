<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgroController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\MolinosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExpedicionController;
use App\Http\Controllers\TransporteController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\DistribucionController;
use App\Http\Controllers\RepresentacionController;
use App\Http\Controllers\RepresentacionPersonalController;

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

  // REPRESENTACOIN
  Route::get('/representaciones', [RepresentacionController::class, 'index'])->name('representacion.index');
  Route::post('/representaciones', [RepresentacionController::class, 'search'])->name('representacion.search');
  Route::get('/representaciones/{representacion}', [RepresentacionController::class, 'show'])->name('representacion.show');
  Route::get('/representaciones/create', [RepresentacionController::class, 'create'])->name('representacion.create');
  Route::post('/representaciones/store', [RepresentacionController::class, 'store'])->name('representacion.store');
  Route::delete('/representacion/{representacion}', [RepresentacionController::class, 'destroy'])->name('representacion.destroy');

  Route::get('/representacion/personal/{representacion}', [RepresentacionPersonalController::class, 'edit'])->name('representacion_personal.edit');
  Route::patch('/representacion/personal/{representacion}', [RepresentacionPersonalController::class, 'update'])->name('representacion_personal.update');
  Route::get('/representacion/personal/', [RepresentacionPersonalController::class, 'create'])->name('representacion_personal.create');
  Route::post('/representacion/personal/', [RepresentacionPersonalController::class, 'store'])->name('representacion_personal.store');
  Route::delete('/representacion/personal/{representacion}', [RepresentacionPersonalController::class, 'destroy'])->name('representacion_personal.destroy');

  Route::get('/representacion/producto/{representacion_producto}', [RepresentacionProductoController::class, 'edit'])->name('representacion_producto.edit');
  Route::patch('/representacion/producto/{representacion_prodcuto}', [RepresentacionProductoController::class, 'update'])->name('representacion_producto.update');
  Route::get('/representacion/producto/', [RepresentacionProductoController::class, 'create'])->name('representacion_producto.create');
  Route::post('/representacion/producto/', [RepresentacionProductoController::class, 'store'])->name('representacion_producto.store');
  Route::delete('/representacion/producto/{representacion}', [RepresentacionProductoController::class, 'destroy'])->name('representacion_producto.destroy');


  //DISTRIBUCION
  Route::get('/distribuciones', [DistribucionController::class, 'index'])->name('distribucion');
  Route::post('/distribuciones', [DistribucionController::class, 'search'])->name('distribucion.search');
  Route::get('/distribuciones/{distribucion}', [DistribucionController::class, 'show'])->name('distribucion.show');
  Route::get('/distribuciones/create', [DistribucionController::class, 'create'])->name('distribucion.create');
  Route::post('/distribuciones/store', [DistribucionController::class, 'store'])->name('distribucion.store');
  Route::delete('/distribucion/{distribucion}', [DistribucionController::class, 'destroy'])->name('representacion.destroy');


  Route::get('/distribucion/personal/{distribucion}', [DistribucionPersonalController::class, 'edit'])->name('distribucion_personal.edit');
  Route::patch('/distribucion/personal/{distribucion}', [DistribucionPersonalController::class, 'update'])->name('distribucion_personal.update');
  Route::get('/distribucion/personal/', [DistribucionPersonalController::class, 'create'])->name('distribucionn_personal.create');
  Route::post('/distribucion/personal/', [DistribucionPersonalController::class, 'store'])->name('distribucion_personal.store');
  Route::delete('/distribucion/personal/{distribucion}', [DistribucionPersonalController::class, 'destroy'])->name('distribucion_personal.destroy');

  Route::get('/distribucion/producto/{distribucion_producto}', [DistribucionProductoController::class, 'edit'])->name('distribucion_producto.edit');
  Route::patch('/distribucion/producto/{distribucion_prodcuto}', [DitribucionProductoController::class, 'update'])->name('distribucion_producto.update');
  Route::get('/distribucion/producto/', [DistribucionProductoController::class, 'create'])->name('distribucion_producto.create');
  Route::post('/distribucion/producto/', [DistribucionProductoController::class, 'store'])->name('distribucion_producto.store');
  Route::delete('/distribucion/producto/{distribucion}', [DistribucionProductoController::class, 'destroy'])->name('distribucion_producto.destroy');


  // AGRO
  Route::get('/agros', [AgroController::class, 'index'])->name('agro');

  // MOLINOS
  Route::get('/molinos', [MolinosController::class, 'index'])->name('molinos');

  // PROVEEDORES
  Route::get('/proveedores', [ProveedoresController::class, 'index'])->name('proveedores');


  // TRANSPORTE
  Route::get('/transportes', [TransporteController::class, 'index'])->name('transporte');

  // EXPÉDICION
  Route::get('/expedicion', [ExpedicionController::class, 'index'])->name('expedicion');

  // AGENDA GENERAL
  Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda');
  Route::post('/agenda', [AgendaController::class, 'search'])->name('agenda.search');

  // TOOLS
  Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda');
});

require __DIR__ . '/auth.php';

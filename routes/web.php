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
  Route::get('/representacion', [RepresentacionController::class, 'index'])->name('representacion.index');
  Route::post('/representacion', [RepresentacionController::class, 'search'])->name('representacion.search');
  Route::get('/representacion/{representacion}', [RepresentacionController::class, 'show'])->name('representacion.show');
  Route::get('/representacion/edit/{representacion}', [RepresentacionController::class, 'edit'])->name('representacion.edit');
  Route::patch('/representacion/{representacion}', [RepresentacionController::class, 'update'])->name('representacion.update');
  Route::get('/representacion/create', [RepresentacionController::class, 'create'])->name('representacion.create');
  Route::post('/representacion/store', [RepresentacionController::class, 'store'])->name('representacion.store');
  Route::delete('/representacion/{representacion}', [RepresentacionController::class, 'destroy'])->name('representacion.destroy');

  Route::get('/representacion/personal/{representacion}', [RepresentacionPersonalController::class, 'edit'])->name('representacion_personal.edit');
  Route::patch('/representacion/personal/{representacion}', [RepresentacionPersonalController::class, 'update'])->name('representacion_personal.update');
  Route::get('/representacion/personal/', [RepresentacionPersonalController::class, 'create'])->name('representacion_personal.create');
  Route::post('/representacion/personal/', [RepresentacionPersonalController::class, 'store'])->name('representacion_personal.store');
  Route::delete('/representacion/personal/{representacion}', [RepresentacionPersonalController::class, 'destroy'])->name('representacion_personal.destroy');

  Route::get('/representacion/producto/edit/{representacion_producto}', [RepresentacionProductoController::class, 'edit'])->name('representacion_producto.edit');
  Route::patch('/representacion/producto/{representacion_prodcuto}', [RepresentacionProductoController::class, 'update'])->name('representacion_producto.update');
  Route::get('/representacion/producto/', [RepresentacionProductoController::class, 'create'])->name('representacion_producto.create');
  Route::post('/representacion/producto/', [RepresentacionProductoController::class, 'store'])->name('representacion_producto.store');
  Route::delete('/representacion/producto/{representacion}', [RepresentacionProductoController::class, 'destroy'])->name('representacion_producto.destroy');


  //DISTRIBUCION
  Route::get('/distribucion', [DistribucionController::class, 'index'])->name('distribucion.index');
  Route::post('/distribucion', [DistribucionController::class, 'search'])->name('distribucion.search');
  Route::get('/distribucion/{distribucion}', [DistribucionController::class, 'show'])->name('distribucion.show');
  Route::get('/distribucion/edit/{distribucion}', [DistribucionController::class, 'edit'])->name('distribucion.edit');
  Route::patch('/distribucion/{distribucion}', [DistribucionController::class, 'update'])->name('distribucion.update');
  Route::get('/distribucion/create', [DistribucionController::class, 'create'])->name('distribucion.create');
  Route::post('/distribucion/store', [DistribucionController::class, 'store'])->name('distribucion.store');
  Route::delete('/distribucion/{distribucion}', [DistribucionController::class, 'destroy'])->name('distribucion.destroy');

  Route::get('/distribucion/personal/{distribucion}', [DistribucionPersonalController::class, 'edit'])->name('distribucion_personal.edit');
  Route::patch('/distribucion/personal/{distribucion}', [DistribucionPersonalController::class, 'update'])->name('distribucion_personal.update');
  Route::get('/distribucion/personal/', [DistribucionPersonalController::class, 'create'])->name('distribucion_personal.create');
  Route::post('/distribucion/personal/', [DistribucionPersonalController::class, 'store'])->name('distribucion_personal.store');
  Route::delete('/distribucion/personal/{distribucion}', [DistribucionPersonalController::class, 'destroy'])->name('distribucion_personal.destroy');

  Route::get('/distribucion/producto/{distribucion_producto}', [DistribucionProductoController::class, 'edit'])->name('distribucion_producto.edit');
  Route::patch('/distribucion/producto/{distribucion_prodcuto}', [DitribucionProductoController::class, 'update'])->name('distribucion_producto.update');
  Route::get('/distribucion/producto/', [DistribucionProductoController::class, 'create'])->name('distribucion_producto.create');
  Route::post('/distribucion/producto/', [DistribucionProductoController::class, 'store'])->name('distribucion_producto.store');
  Route::delete('/distribucion/producto/{distribucion}', [DistribucionProductoController::class, 'destroy'])->name('distribucion_producto.destroy');


  // AGRO
  Route::get('/agros', [AgroController::class, 'index'])->name('agro.index');

  // MOLINOS
  Route::get('/molino', [MolinosController::class, 'index'])->name('molino.index');
  Route::post('/molino', [MolinosController::class, 'search'])->name('molino.search');
  Route::get('/molino/{molino}', [MolinosController::class, 'show'])->name('molino.show');
  Route::get('/molino/edit/{molino}', [MolinosController::class, 'edit'])->name('molino.edit');
  Route::patch('/molino/{molino}', [MolinosController::class, 'update'])->name('molino.update');
  Route::get('/molino/create', [MolinosController::class, 'create'])->name('molino.create');
  Route::post('/molino/store', [MolinosController::class, 'store'])->name('molino.store');
  Route::delete('/molino/{molino}', [MolinosController::class, 'destroy'])->name('molino.destroy');


  // PROVEEDORES
  Route::get('/proveedor', [ProveedoresController::class, 'index'])->name('proveedor.index');
  Route::post('/proveedor', [ProveedoresController::class, 'search'])->name('proveedor.search');
  Route::get('/proveedor/{proveedor}', [ProveedoresController::class, 'show'])->name('proveedor.show');
  Route::get('/proveedor/edit/{proveedor}', [ProveedoresController::class, 'edit'])->name('proveedor.edit');
  Route::patch('/proveedor/{proveedor}', [ProveedoresController::class, 'update'])->name('proveedor.update');
  Route::get('/proveedor/create', [ProveedoresController::class, 'create'])->name('proveedor.create');
  Route::post('/proveedor/store', [ProveedoresController::class, 'store'])->name('proveedor.store');
  Route::delete('/proveedor/{proveedor}', [ProveedoresController::class, 'destroy'])->name('proveedor.destroy');


  // TRANSPORTE
  Route::get('/transporte', [TransporteController::class, 'index'])->name('transporte.index');

  // EXPÉDICION
  Route::get('/expedicion', [ExpedicionController::class, 'index'])->name('expedicion.index');

  // AGENDA GENERAL
  Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');
  Route::post('/agenda', [AgendaController::class, 'search'])->name('agenda.search');
  Route::get('/agenda/edit/{agenda}', [AgendaController::class, 'edit'])->name('agenda.edit');
  Route::patch('/agenda/{agenda}', [AgendaController::class, 'update'])->name('agenda.update');
  Route::get('/agenda/create', [AgendaController::class, 'create'])->name('agenda.create');
  Route::post('/agenda/store', [AgendaController::class, 'store'])->name('agenda.store');
  Route::delete('/agenda/{agenda}', [AgendaController::class, 'destroy'])->name('agenda.destroy');

  // TOOLS
  Route::get('/tools', function () {
    return view('tools');
  })->middleware(['auth', 'verified'])->name('tools');
});

require __DIR__ . '/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgroController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\MolinoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ExpedicionController;
use App\Http\Controllers\TransporteController;
use App\Http\Controllers\DistribucionController;
use App\Http\Controllers\RepresentacionController;
use App\Http\Controllers\DistribucionPersonalController;
use App\Http\Controllers\DistribucionProductoController;
use App\Http\Controllers\RepresentacionPersonalController;
use App\Http\Controllers\RepresentacionProductoController;

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
  Route::resource('representacion', RepresentacionController::class);
  Route::post('/representacion', [RepresentacionController::class, 'search'])->name('representacion.search');

  // Route::get('/representacion', [RepresentacionController::class, 'index'])->name('representacion.index');
  // Route::get('/representacion/{representacion}', [RepresentacionController::class, 'show'])->name('representacion.show');
  // Route::get('/representacion/edit/{representacion}', [RepresentacionController::class, 'edit'])->name('representacion.edit');
  // Route::patch('/representacion/{representacion}', [RepresentacionController::class, 'update'])->name('representacion.update');
  // Route::get('/representacion/create', [RepresentacionController::class, 'create'])->name('representacion.create');
  // Route::post('/representacion/store', [RepresentacionController::class, 'store'])->name('representacion.store');
  // Route::delete('/representacion/{representacion}', [RepresentacionController::class, 'destroy'])->name('representacion.destroy');

  Route::resource('/representacion/personal', RepresentacionPersonalController::class)->names('representacion_personal');

  // Route::get('/representacion/personal/{representacion_personal}', [RepresentacionPersonalController::class, 'edit'])->name('representacion_personal.edit');
  // Route::patch('/representacion/personal/{representacion}', [RepresentacionPersonalController::class, 'update'])->name('representacion_personal.update');
  // Route::get('/representacion/personal/', [RepresentacionPersonalController::class, 'create'])->name('representacion_personal.create');
  // Route::post('/representacion/personal/', [RepresentacionPersonalController::class, 'store'])->name('representacion_personal.store');
  // Route::delete('/representacion/personal/{representacion}', [RepresentacionPersonalController::class, 'destroy'])->name('representacion_personal.destroy');

  Route::resource('/representacion/producto', RepresentacionController::class)->names('representacion_producto');

  // Route::get('/representacion/producto/edit/{representacion_producto}', [RepresentacionProductoController::class, 'edit'])->name('representacion_producto.edit');
  // Route::patch('/representacion/producto/{representacion_prodcuto}', [RepresentacionProductoController::class, 'update'])->name('representacion_producto.update');
  // Route::get('/representacion/producto/', [RepresentacionProductoController::class, 'create'])->name('representacion_producto.create');
  // Route::post('/representacion/producto/', [RepresentacionProductoController::class, 'store'])->name('representacion_producto.store');
  // Route::delete('/representacion/producto/{representacion}', [RepresentacionProductoController::class, 'destroy'])->name('representacion_producto.destroy');


  //DISTRIBUCION
  Route::resource('/distribucion', DistribucionController::class);
  Route::post('/distribucion', [DistribucionController::class, 'search'])->name('distribucion.search');
  Route::resource('/distribucion/personal', DistribucionPersonalController::class)->names('distribucion_personal');;
  Route::resource('/distribucion/producto/', DistribucionProductoController::class)->names('distribucion_producto');


  // AGRO
  Route::resource('/agro', AgroController::class);
  Route::post('/agro', [AgroController::class, 'search'])->name('agro.search');

  // MOLINOS
  Route::resource('/molino', MolinoController::class);
  Route::post('/molino', [MolinoController::class, 'search'])->name('molino.search');

  // PROVEEDORES
  Route::resource('/proveedor', ProveedorController::class);
  Route::post('/proveedor', [ProveedorController::class, 'search'])->name('proveedor.search');

  // TRANSPORTE
  Route::resource('/transporte', TransporteController::class);
  Route::post('/transporte', [TransporteController::class, 'search'])->name('transporte.search');

  // EXPÉDICION
  Route::resource('/expedicion', ExpedicionController::class);

  // AGENDA GENERAL
  Route::resource('/agenda', AgendaController::class);
  Route::post('/agenda', [AgendaController::class, 'search'])->name('agenda.search');

  // TOOLS
  Route::get('/tools', function () {
    return view('tools');
  })->middleware(['auth', 'verified'])->name('tools');
});

require __DIR__ . '/auth.php';
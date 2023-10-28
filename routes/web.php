<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgroController;
use App\Http\Controllers\ToolsController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\MolinoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ExpedicionController;
use App\Http\Controllers\TransporteController;
use App\Http\Controllers\AgroPersonalController;
use App\Http\Controllers\AgroProductoController;
use App\Http\Controllers\DistribucionController;
use App\Http\Controllers\MolinoPersonalController;
use App\Http\Controllers\MolinoProductoController;
use App\Http\Controllers\RepresentacionController;
use App\Http\Controllers\ProveedorPersonalController;
use App\Http\Controllers\ProveedorProductoController;
use App\Http\Controllers\TransportePersonalController;
use App\Http\Controllers\TransporteProductoController;
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
  Route::resource('representacion', RepresentacionController::class)->names('representacion');
  Route::resource('/representacion/personal', RepresentacionPersonalController::class)->names('representacion_personal');
  Route::resource('/representacion/producto', RepresentacionProductoController::class)->names('representacion_producto');

  //DISTRIBUCION
  Route::resource('/distribucion', DistribucionController::class)->names('distribucion');
  Route::resource('/distribucion/personal', DistribucionPersonalController::class)->names('distribucion_personal');
  Route::resource('/distribucion/producto', DistribucionProductoController::class)->names('distribucion_producto');
  // AGRO
  Route::resource('/agro', AgroController::class)->names('agro');
  Route::resource('/agro/personal', AgroPersonalController::class)->names('agro_personal');
  Route::resource('/agro/producto/', AgroProductoController::class)->names('agro_producto');


  // MOLINOS
  Route::resource('/molino', MolinoController::class)->names('molino');
  Route::resource('/molino/personal', MolinoPersonalController::class)->names('molino_personal');
  Route::resource('/molino/producto/', MolinoProductoController::class)->names('molino_producto');


  // PROVEEDORES
  Route::resource('/proveedor', ProveedorController::class)->names('proveedor');
  Route::resource('/proveedor/personal', ProveedorPersonalController::class)->names('proveedor_personal');
  Route::resource('/proveedor/producto/', ProveedorProductoController::class)->names('proveedor_producto');

  // TRANSPORTE
  Route::resource('/transporte', TransporteController::class)->names('transporte');
  Route::resource('/transporte/personal', TransportePersonalController::class)->names('transporte_personal');
  Route::resource('/transporte/producto/', TransporteProductoController::class)->names('transporte_producto');

  // EXPÉDICION
  Route::resource('/expedicion', ExpedicionController::class);

  // AGENDA GENERAL
  Route::resource('/agenda', AgendaController::class)->names('agenda');

  // TOOLS
  Route::resource('/tools', ToolsController::class)->middleware(['auth', 'verified'])->names('tools');

  // Route::get('/tools', function () {
  //   return view('tools');
  // })->middleware(['auth', 'verified'])->name('tools');
});

require __DIR__ . '/auth.php';

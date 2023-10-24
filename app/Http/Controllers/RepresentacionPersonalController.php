<?php

namespace App\Http\Controllers;

use App\Models\AuxAreas;
use App\Models\AuxCargos;
use App\Models\AuxProfesion;
use Illuminate\Http\Request;
use App\Models\Representacion;
use Illuminate\Support\Facades\DB;
use App\Models\Representacion_Personal;

class RepresentacionPersonalController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $personal = Representacion_Personal::find($id);
    $areas = AuxAreas::all();
    $cargos = AuxCargos::all();
    $profesiones = AuxProfesion::all();

    return view('representacion.personal.edit', ['personal' => $personal, 'areas' => $areas, 'profesiones' => $profesiones, 'cargos' => $cargos]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Representacion_Personal $personal)
  {
    $personal->update($request->all());
    return redirect()->route(
      'representacion.show',
      ['representacion' => $personal->representacion_id]
    )->with('success', 'Actualizado con exito');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Representacion_Personal $personal)
  {
    $producto =
      Representacion_Personal::findOrFail($personal->id);
    $personal->status = 'C';
    $personal->update();
    return redirect()->route('representacion.show', ['representacion' => $personal->representacion_id])->with('danger', 'Producto del Cliente Representación Eliminado');
  }
}
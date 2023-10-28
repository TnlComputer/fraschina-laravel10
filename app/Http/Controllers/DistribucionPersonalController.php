<?php

namespace App\Http\Controllers;

use App\Models\AuxAreas;
use App\Models\AuxCargos;
use App\Models\AuxProfesion;
use App\Models\Distribucion;
use Illuminate\Http\Request;
use App\Models\Distribucion_Personal;

class DistribucionPersonalController extends Controller
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
    $distribucion = $request->distribucion_id;
    Distribucion_Personal::create($request->all());
    return redirect()->route(
      'distribucion.show',
      ['distribucion' => $distribucion]
    )->with('success', 'Alta realizada con exito');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $distribucion = Distribucion::find($id);
    $areas = AuxAreas::all();
    $cargos = AuxCargos::all();
    $profesiones = AuxProfesion::all();

    return view('distribucion.personal.create',  ['distribucion' => $distribucion, 'areas' => $areas, 'profesiones' => $profesiones, 'cargos' => $cargos]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $personal = Distribucion_Personal::find($id);
    $areas = AuxAreas::all();
    $cargos = AuxCargos::all();
    $profesiones = AuxProfesion::all();

    return view('distribucion.personal.edit', ['personal' => $personal, 'areas' => $areas, 'profesiones' => $profesiones, 'cargos' => $cargos]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Distribucion_Personal $personal)
  {
    $personal->update($request->all());
    return redirect()->route(
      'distribucion.show',
      ['distribucion' => $personal->distribucion_id]
    )->with('success', 'Actualizado con exito');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Distribucion_Personal $personal)
  {
    $rp = Distribucion_Personal::findOrFail($personal->id);
    $rp->status = 'C';
    $rp->update();
    return redirect()->route('distribucion.show', ['distribucion' => $rp->distribucion_id])->with('danger', 'Contacto Eliminado');
  }
}

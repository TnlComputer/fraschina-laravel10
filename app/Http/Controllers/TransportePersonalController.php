<?php

namespace App\Http\Controllers;

use App\Models\AuxAreas;
use App\Models\AuxCargos;
use App\Models\Transporte;
use App\Models\AuxProfesion;
use Illuminate\Http\Request;
use App\Models\Transporte_Personal;

class TransportePersonalController extends Controller
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
    Transporte_Personal::create($request->all());
    return redirect()->route(
      'transporte.show',
      ['transporte' => $request->transporte_id]
    )->with('success', 'Alta de Personal realizada con exito');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $transporte = Transporte::find($id);
    $areas = AuxAreas::all();
    $cargos = AuxCargos::all();
    $profesiones = AuxProfesion::all();

    return view('transporte.personal.create',  ['transporte' => $transporte, 'areas' => $areas, 'profesiones' => $profesiones, 'cargos' => $cargos]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $personal = Transporte_Personal::find($id);

    $areas = AuxAreas::all();
    $cargos = AuxCargos::all();
    $profesiones = AuxProfesion::all();

    return view('transporte.personal.edit', ['personal' => $personal, 'areas' => $areas, 'profesiones' => $profesiones, 'cargos' => $cargos]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Transporte_Personal $personal)
  {
    //
    $personal->update($request->all());
    return redirect()->route(
      'transporte.show',
      ['transporte' => $personal->transporte_id]
    )->with('success', 'Actualizado con exito');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Transporte_Personal $personal)
  {
    $personal = Transporte_Personal::findOrFail($personal->id);
    $personal->status = 'C';
    $personal->update();
    return redirect()->route('transporte.show', ['transporte' => $personal->transporte_id])->with('danger', 'Producto Eliminado');
  }
}

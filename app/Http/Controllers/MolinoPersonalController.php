<?php

namespace App\Http\Controllers;

use App\Models\Molino;
use App\Models\AuxAreas;
use App\Models\AuxCargos;
use App\Models\AuxProfesion;
use Illuminate\Http\Request;
use App\Models\MolinoPersonal;

class MolinoPersonalController extends Controller
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
    MolinoPersonal::create($request->all());
    return redirect()->route(
      'molino.show',
      ['molino' => $request->molino_id]
    )->with('success', 'Alta de Personal realizada con exito');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $molino = Molino::find($id);
    $areas = AuxAreas::all();
    $cargos = AuxCargos::all();
    $profesiones = AuxProfesion::all();

    return view('molino.personal.create',  ['molino' => $molino, 'areas' => $areas, 'profesiones' => $profesiones, 'cargos' => $cargos]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $personal = MolinoPersonal::find($id);
    $areas = AuxAreas::all();
    $cargos = AuxCargos::all();
    $profesiones = AuxProfesion::all();

    return view('molino.personal.edit', ['personal' => $personal, 'areas' => $areas, 'profesiones' => $profesiones, 'cargos' => $cargos]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, MolinoPersonal $personal)
  {
    $personal->update($request->all());
    return redirect()->route(
      'molino.show',
      ['molino' => $personal->molino_id]
    )->with('success', 'Actualizado con exito');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(MolinoPersonal $personal)
  {
    $personal = MolinoPersonal::findOrFail($personal->id);
    $personal->status = 'C';
    $personal->update();
    return redirect()->route('molino.show', ['molino' => $personal->molino_id])->with('danger', 'Producto Eliminado');
  }
}

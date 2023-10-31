<?php

namespace App\Http\Controllers;

use App\Models\Agro;
use App\Models\AuxAreas;
use App\Models\AuxCargos;
use App\Models\AgroPersonal;
use App\Models\AuxProfesion;
use Illuminate\Http\Request;

class AgroPersonalController extends Controller
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
    AgroPersonal::create($request->all());
    return redirect()->route(
      'agro.show',
      ['agro' => $request->agro_id]
    )->with('success', 'Alta de Personal realizada con exito');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $agro = Agro::find($id);
    $areas = AuxAreas::all();
    $cargos = AuxCargos::all();
    $profesiones = AuxProfesion::all();

    return view('agro.personal.create',  ['agro' => $agro, 'areas' => $areas, 'profesiones' => $profesiones, 'cargos' => $cargos]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $personal = AgroPersonal::find($id);
    $areas = AuxAreas::all();
    $cargos = AuxCargos::all();
    $profesiones = AuxProfesion::all();

    return view('agro.personal.edit', ['personal' => $personal, 'areas' => $areas, 'profesiones' => $profesiones, 'cargos' => $cargos]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, AgroPersonal $personal)
  {
    $personal->update($request->all());
    return redirect()->route(
      'agro.show',
      ['agro' => $personal->agro_id]
    )->with('success', 'Actualizado con exito');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(AgroPersonal $personal)
  {
    $personal = AgroPersonal::findOrFail($personal->id);
    $personal->status = 'C';
    $personal->update();
    return redirect()->route('agro.show', ['agro' => $personal->agro_id])->with('danger', 'Producto Eliminado');
  }
}

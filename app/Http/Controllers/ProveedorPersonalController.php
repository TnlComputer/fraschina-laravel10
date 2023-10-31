<?php

namespace App\Http\Controllers;

use App\Models\AuxAreas;
use App\Models\AuxCargos;
use App\Models\Proveedor;
use App\Models\AuxProfesion;
use Illuminate\Http\Request;
use App\Models\Proveedor_Personal;

class ProveedorPersonalController extends Controller
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
    Proveedor_Personal::create($request->all());
    return redirect()->route(
      'proveedor.show',
      ['proveedor' => $request->proveedor_id]
    )->with('success', 'Alta de Personal realizada con exito');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $proveedor = Proveedor::find($id);
    $areas = AuxAreas::all();
    $cargos = AuxCargos::all();
    $profesiones = AuxProfesion::all();

    return view('proveedor.personal.create',  ['proveedor' => $proveedor, 'areas' => $areas, 'profesiones' => $profesiones, 'cargos' => $cargos]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $personal = Proveedor_Personal::find($id);
    $areas = AuxAreas::all();
    $cargos = AuxCargos::all();
    $profesiones = AuxProfesion::all();

    return view('proveedor.personal.edit', ['personal' => $personal, 'areas' => $areas, 'profesiones' => $profesiones, 'cargos' => $cargos]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Proveedor_Personal $personal)
  {
    $personal->update($request->all());
    return redirect()->route(
      'proveedor.show',
      ['proveedor' => $personal->proveedor_id]
    )->with('success', 'Actualizado con exito');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Proveedor_Personal $personal)
  {
    $personal = Proveedor_Personal::findOrFail($personal->id);
    $personal->status = 'C';
    $personal->update();
    return redirect()->route('proveedor.show', ['proveedor' => $personal->proveedor_id])->with('danger', 'Producto Eliminado');
  }
}

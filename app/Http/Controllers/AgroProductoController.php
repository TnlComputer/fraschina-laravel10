<?php

namespace App\Http\Controllers;

use App\Models\Agro;
use App\Models\AgroProducto;
use App\Models\AuxProductosAgros;
use Illuminate\Http\Request;

class AgroProductoController extends Controller
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
    AgroProducto::create($request->all());
    return redirect()->route('agro.show', ['agro' => $request->agro_id])->with('success', 'Alta realizada con exito');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $agro = Agro::find($id);
    $repProd = AuxProductosAgros::all();

    return view("agro.producto.create", ['agro' => $agro, 'repProd' => $repProd]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $producto = AgroProducto::find($id);
    $repProd = AuxProductosAgros::all();
    return view("agro.producto.edit", ['producto' => $producto, 'repProd' => $repProd]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, AgroProducto $producto)
  {
    $producto->update($request->all());
    return redirect()->route(
      'agro.show',
      ['agro' => $producto->agro_id]
    )->with('success', 'Actualizado con exito');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(AgroProducto $producto)
  {
    $producto = AgroProducto::findOrFail($producto->id);
    $producto->status = 'C';
    $producto->update();
    return redirect()->route('agro.show', ['agro' => $producto->agro_id])->with('danger', 'Producto Eliminado');
  }
}
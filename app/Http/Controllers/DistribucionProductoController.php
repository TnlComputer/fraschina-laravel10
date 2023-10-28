<?php

namespace App\Http\Controllers;

use App\Models\AuxProductosDistribucion;
use App\Models\Distribucion;
use App\Models\Distribucion_Producto;
use App\Models\productoCDA;
use Illuminate\Http\Request;

class DistribucionProductoController extends Controller
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
    Distribucion_Producto::create($request->all());
    return redirect()->route('distribucion.show', ['distribucion' => $request->distribucion_id])->with('success', 'Alta realizada con exito');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $distribucion = Distribucion::find($id);
    $disProd = productoCDA::all();

    return view('distribucion.producto.create',  ['distribucion' => $distribucion, 'disProd' => $disProd]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $producto = Distribucion_Producto::find($id);
    $disProd = productoCDA::all();

    return view("distribucion.producto.edit", ['producto' => $producto, 'disProd' => $disProd]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Distribucion_Producto $producto)
  {
    $producto->update($request->all());
    return redirect()->route(
      'distribucion.show',
      ['distribucion' => $producto->distribucion_id]
    )->with('success', 'Actualizado con exito');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $dpro = Distribucion_Producto::findOrFail($id);
    $dpro->status = 'C';
    $dpro->update();
    return redirect()->route('distribucion.index', ['distribucion' => $dpro->distribucion_id])->with('danger', 'Producto Eliminado');
  }
}

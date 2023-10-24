<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Representacion_Producto;
use App\Models\AuxProductosRepresentacion;

class RepresentacionProductoController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    // $user = Auth::user();
    // $repreProduto = Representacion_Producto::all();
    // return view("Representacion_Produto.index", compact($repreProduto));
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
  public function show(Request $request)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $producto = Representacion_Producto::find($id);
    $repProd = AuxProductosRepresentacion::all();

    return view("representacion.producto.edit", ['producto' => $producto, 'repProd' => $repProd]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Representacion_Producto $producto)
  {
    $producto->update($request->all());
    return redirect()->route(
      'representacion.show',
      ['representacion' => $producto->representacion_id]
    )->with('success', 'Actualizado con exito');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Representacion_Producto $producto)
  {
    $producto =
      Representacion_Producto::findOrFail($producto->id);
    $producto->status = 'C';
    $producto->update();
    return redirect()->route('representacion.show', ['representacion' => $producto->representacion_id])->with('danger', 'Producto del Cliente Representación Eliminado');
  }
}

<?php

namespace App\Http\Controllers;

use App\Models\AuxProductosProveedores;
use App\Models\Proveedor;
use App\Models\Proveedor_Producto;
use Illuminate\Http\Request;

class ProveedorProductoController extends Controller
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
    Proveedor_Producto::create($request->all());
    return redirect()->route('proveedor.show', ['proveedor' => $request->proveedor_id])->with('success', 'Alta realizada con exito');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $proveedor = Proveedor::find($id);
    $repProd = AuxProductosProveedores::all();

    return view("proveedor.producto.create", ['proveedor' => $proveedor, 'repProd' => $repProd]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $producto = Proveedor_Producto::find($id);
    $repProd = AuxProductosproveedores::all();
    return view("proveedor.producto.edit", ['producto' => $producto, 'repProd' => $repProd]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Proveedor_Producto $producto)
  {
    $producto->update($request->all());
    return redirect()->route(
      'proveedor.show',
      ['proveedor' => $producto->proveedor_id]
    )->with('success', 'Actualizado con exito');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Proveedor_Producto $producto)
  {
    $producto = Proveedor_Producto::findOrFail($producto->id);
    $producto->status = 'C';
    $producto->update();
    return redirect()->route('proveedor.show', ['proveedor' => $producto->proveedor_id])->with('danger', 'Producto Eliminado');
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DistribucionLineaPedidos;

class DistribucionLineaPedidosController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    // $pedidos = DB::table('distribucion_lineapedidos as dlp')
    //   ->where('dlp.fecha', '>', '0000-00-00')
    //   ->where('dlp.pedido_id', '>', '0')
    //   ->where('dlp.status', '=', 'A')
    //   ->where('dlp.distribucion_id', '=', $request->id)
    //   ->orderBy('fechaEntrega', 'asc')
    //   // ->orderBy('horas', 'asc')
    //   // ->orderBy('nomfantasia', 'asc')
    //   ->paginate(10);
    // return view('distribucion_lineapedidos.index', compact('pedidos'));
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
  public function show(DistribucionLineaPedidos $distribucionLineaPedidos)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(DistribucionLineaPedidos $distribucionLineaPedidos)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, DistribucionLineaPedidos $distribucionLineaPedidos)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(DistribucionLineaPedidos $distribucionLineaPedidos)
  {
    //
  }
}

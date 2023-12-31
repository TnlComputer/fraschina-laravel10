<?php

namespace App\Http\Controllers;

use App\Models\AuxPagos;
use App\Models\AuxCobrar;
use App\Models\AuxTipoPagos;
use App\Models\Distribucion;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\DB;
use App\Models\DistribucionReparto;
use function Laravel\Prompts\select;
use App\Models\DistribucionLineaTareas;
use App\Models\DistribucionLineaPedidos;

class DistribucionRepartoController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $bFecha =  Carbon::now()->format('Y-m-d');

    $bFecha = trim($request->get('bFecha'));

    if ($request->fecha == 'ayer') {
      $bFecha = Carbon::yesterday()->format('Y-m-d');
    } else if ($request->fecha == 'manana') {
      $bFecha = Carbon::tomorrow()->format('Y-m-d');
    } else if ($request->fecha == 'hoy') {
      $bFecha =  Carbon::now()->format('Y-m-d');
    }

    $bAyer = Carbon::yesterday()->format('d-m-Y');
    $bHoy =  Carbon::now()->format('d-m-Y');
    $bManana = Carbon::tomorrow()->format('d-m-Y');

    $pedidos = DB::table('distribucion_linea_pedidos as dlp')
      ->join('Distribucion as dis', 'dlp.distribucion_id', '=', 'dis.id')
      ->join('AuxCalles as auxCalle', 'dis.dire_calle_id', '=', 'auxCalle.id')
      ->join('AuxBarrios as auxB', 'dis.barrio_id', '=', 'auxB.id')
      ->join('AuxLocalidades as auxLoc', 'dis.localidad_id', '=', 'auxLoc.id')
      ->join('AuxMunicipios as auxMun', 'dis.municipio_id', '=', 'auxMun.id')
      ->join('AuxZonas as auxZon', 'dis.zona_id', '=', 'auxZon.id')
      ->join('AuxCobrar as auxCob', 'dis.cobrar_id', '=', 'auxCob.id')
      ->join('AuxTipoPagos as auxTpag', 'dis.tcobro_id', '=', 'auxTPag.id')
      ->join('AuxPagos as auxPag', 'dis.cobro_id', '=', 'auxPag.id')
      ->select(
        'dlp.fechaEntrega',
        'dlp.pedido',
        'dlp.fecha',
        'dlp.fechaFactura',
        'dlp.nroFactura',
        'dlp.chofer',
        'dlp.orden',
        'dlp.producto_id',
        'dlp.cantidad',
        'dlp.precio_unitario',
        'dlp.totalPedidoN',
        'dlp.total_factura',
        'dlp.linea',
        'dlp.nombre_producto',
        'dlp.bandera',
        'dis.razonsocial as razonsocial',
        'dis.nomfantasia as nomfantasia',
        'dis.fac_imp as imprimo',
        'dis.dire_nro as dire_nro',
        'dis.dire_obs as dire_obs',
        'dis.codpost as codpost',
        'dis.piso as piso',
        'dis.dpto as dpto',
        'dis.lunes as lunes',
        'dis.sabado as sabado',
        'dis.desde as desde',
        'dis.desde1 as desde1',
        'dis.hasta as hasta',
        'dis.hasta1 as hasta1',
        'dis.obsrecep as obsrecep',
        'dis.hasta1 as hasta1',
        'auxB.nombrebarrio as barrio',
        'auxMun.ciudadmunicipio as municipio',
        'auxZon.nombre as zona',
        'auxLoc.localidad as localidad',
        'auxCalle.calle as dire_calle',
        'auxCob.accion as cobro',
        'auxTPag.nombre as tpago',
        'auxPag.nombre as cobrar',
      )
      ->where('dlp.status', '=', 'A')
      ->whereDate('dlp.fechaEntrega', '=', $bFecha)
      ->orderBy('dlp.fechaEntrega', 'asc')
      ->orderBy('dlp.orden', 'asc')
      ->orderBy('dlp.pedido', 'desc')
      ->paginate(20);

    return view('distribucion.reparto.index', compact('pedidos', 'bFecha', 'bHoy', 'bAyer', 'bManana', 'bFecha'));
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
  public function show(DistribucionReparto $distribucionReparto)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(DistribucionReparto $distribucionReparto)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, DistribucionReparto $distribucionReparto)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(DistribucionReparto $distribucionReparto)
  {
    //
  }
}

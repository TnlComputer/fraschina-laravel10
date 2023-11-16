<?php

namespace App\Http\Controllers;

use App\Models\AuxPagos;
use App\Models\AuxZonas;
use App\Models\AuxCalles;
use App\Models\AuxCobrar;
use App\Models\AuxBarrios;
use App\Models\AuxTipoPagos;
use App\Models\Distribucion;
use App\Models\AuxMunicipios;
use App\Models\AuxLocalidades;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class DistribucionPDFController extends Controller
{
  public function index()
  {
    // return view('welcome');

  }
  public function control(Request $request)
  {
    $control = $request->bFecha;
    $pdf = Pdf::loadView('distribucion.pdf.control', ['data' => $control]);
    // return   $pdf->download('my_example.pdf'); // sale por pantalla y lo descarga
    return $pdf->stream('Control.pdf'); // sale por pantalla
  }
  public function reparto(Request $request)
  {
    $bFecha = trim($request->get('bFecha'));
    $reparto = DB::table('distribucion_linea_pedidos as dlp')
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
      ->get();
    // $data = $request->bFecha;
    $pdf = Pdf::loadView('distribucion.pdf.control', ['data' => $reparto]);
    // return   $pdf->download('my_example.pdf'); // sale por pantalla y lo descarga
    return $pdf->stream('Reparto.pdf'); // sale por pantalla
  }
  public function recibo(Request $request)
  {
    $recibo = $request->pedido;
    $pdf = Pdf::loadView('distribucion.pdf.control', ['data' => $recibo]);
    // return $pdf->download('my_example.pdf'); // sale por pantalla y lo descarga
    return $pdf->stream('Recibo.pdf'); // sale por pantalla
  }
}
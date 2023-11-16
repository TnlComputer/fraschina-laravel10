<?php

namespace App\Http\Controllers;

use App\Models\AuxEstado;
use App\Models\AuxAcciones;
use App\Models\AuxPrioridades;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\DistribucionAgenda;
use App\Models\DistribucionLineaPedidos;
use Illuminate\Support\Facades\DB;
// use function Laravel\Prompts\select;

class DistribucionAgendaController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $name = trim($request->get('name'));
    $today =  Carbon::now();
    if ($name) {
      $agendas = DB::table('distribucion_agenda as dag')
        ->join('AuxPrioridades as auxPrio',  'dag.prioridad_id', '=', 'auxPrio.id')
        ->join('AuxAcciones as auxAcc', 'dag.accion_id', '=', 'auxAcc.id')
        ->join('AuxVeraz as auxVez', 'dag.veraz_id', '=', 'auxVez.id')
        ->join('AuxEstado as auxEst', 'dag.estado_id', '=', 'auxEst.id')
        ->select(
          'dag.id',
          'dag.fecha',
          'dag.horas',
          'dag.auto',
          'auxPrio.nombre as prioridad',
          'auxPrio.color as colorPrio',
          'dag.nomfantasia',
          'dag.razonsocial',
          'dag.nombre_per',
          'dag.cargo_id',
          'dag.telefono',
          'dag.apellido_per',
          'dag.distribucion_id',
          'auxVez.estado as veraz',
          'auxVez.color as colorVeraz',
          'auxEst.nomEstado',
          'auxAcc.accion',
          'auxAcc.colorAcc as colorAccion',
          'dag.temas',
        )
        ->where('dag.status', '=', 'A')
        ->where('dag.fecha', '>=', $today)
        ->where('dag.nomfantasia', 'like', '%' . $request->name . '%')
        ->orWhere('dag.razonsocial', 'like', '%' . $request->name . '%')
        ->orderBy('fecha', 'asc')
        ->orderBy('horas', 'asc')
        ->orderBy('nomfantasia', 'asc')
        ->paginate(10);
    } else {
      $agendas = DB::table('distribucion_agenda as dag')
        ->join('AuxPrioridades as auxPrio',  'dag.prioridad_id', '=', 'auxPrio.id')
        ->join('AuxAcciones as auxAcc', 'dag.accion_id', '=', 'auxAcc.id')
        ->join('AuxVeraz as auxVez', 'dag.veraz_id', '=', 'auxVez.id')
        ->join('AuxEstado as auxEst', 'dag.estado_id', '=', 'auxEst.id')
        ->select(
          'dag.id',
          'dag.fecha',
          'dag.horas',
          'dag.auto',
          'auxPrio.nombre as prioridad',
          'auxPrio.color as colorPrio',
          'dag.nomfantasia',
          'dag.razonsocial',
          'dag.nombre_per',
          'dag.cargo_id',
          'dag.telefono',
          'dag.apellido_per',
          'dag.distribucion_id',
          'auxVez.estado as veraz',
          'auxVez.color as colorVeraz',
          'auxEst.nomEstado',
          'auxAcc.accion as accion',
          'auxAcc.colorAcc as colorAccion',
          'dag.temas',
        )
        ->where('dag.status', '=', 'A')
        ->where('dag.fecha', '>=', $today)
        ->orderBy('fecha', 'asc')
        ->orderBy('horas', 'asc')
        ->orderBy('nomfantasia', 'asc')
        ->paginate(10);
    }
    return view('distribucion.agenda.index', compact('agendas'));
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
  public function show(string $id)
  {
    $pedidos = DB::table('distribucion_linea_pedidos as dlp')
      ->where('dlp.distribucion_id', '=', $id)
      ->where('dlp.pedido', '>', '0')
      ->where('dlp.fecha', '>', '0000-00-00')
      ->where('dlp.status', '=', 'A')
      ->orderBy('fechaEntrega', 'desc')
      ->orderBy('linea', 'asc')
      ->paginate(15);
    return view('distribucion.agenda.show', compact('pedidos', 'id'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(DistribucionAgenda $distribucionAgenda)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, DistribucionAgenda $distribucionAgenda)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(DistribucionAgenda $distribucionAgenda)
  {
    //
  }
}

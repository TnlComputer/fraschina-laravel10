<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\AuxProfesion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgendaController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $name = trim($request->get('name'));
    if ($name) {
      $agendas = DB::table('agendas as ag')
        ->join('AuxProfesiones as auxProf', 'ag.cod_prof', '=', 'auxProf.id')
        ->select(
          'ag.nombre',
          'ag.apellido',
          'ag.empresa_institucion',
          // 'ag.profesion_especialidad_oficio',
          'ag.cod_prof',
          'ag.tel_particular',
          'ag.tel_laboral',
          'ag.interno',
          'ag.celular',
          'ag.mail',
          'ag.direccion',
          'ag.observaciones',
          'ag.id',
          'auxProf.nomprefesion as profesion_especialidad_oficio'
        )
        ->where('ag.status', '=', 'A')
        ->where('auxProf.agendas|=', 'SI')
        ->where('ag.nombre', 'like', '%' . $request->name . '%')
        ->orWhere('ag.apellido', 'like', '%' . $request->name . '%')
        ->orWhere('ag.empresa_institucion', 'like', '%' . $request->name . '%')
        ->orWhere('auxProf.nomprefesion', 'like', '%' . $request->name . '%')
        ->paginate(15);
    } else {
      $agendas = Agenda::where('status', '=', 'A')->paginate(15);
    }
    return view('agenda.index', compact('agendas'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $profesiones = DB::table('auxprofesiones as auxProf')
      ->where('auxProf.agendas', '=', 'SI')
      ->get();
    // $profesiones = AuxProfesion::all();
    return view('agenda.create', ['profesiones' => $profesiones]);
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
  public function show(Agenda $agenda)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Agenda $agenda)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Agenda $agenda)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Agenda $agenda)
  {
    $agenda = Agenda::findOrFail($agenda->id);
    $agenda->status = 'C';
    $agenda->update();
    return redirect()->route('agenda.index')
      ->with('danger', 'Contacto Eliminado');
  }
}

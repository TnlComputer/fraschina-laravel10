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
          'ag.cod_prof',
          'ag.tel_particular',
          'ag.tel_laboral',
          'ag.interno',
          'ag.celular',
          'ag.mail',
          'ag.direccion',
          'ag.observaciones',
          'ag.id',
          'auxProf.nombreprofesion as profesion_especialidad_oficio',
        )
        ->where('status', '=', 'A')
        ->where('nombre', 'like', '%' . $request->name . '%')
        ->orWhere('apellido', 'like', '%' . $request->name . '%')
        ->orWhere('empresa_institucion', 'like', '%' . $request->name . '%')
        // ->orWhere('profesion_especialidad_oficio', 'like', '%' . $request->name . '%')
        ->paginate(15);
    } else {
      $agendas = Agenda::where('status', '=', 'A')->paginate(15);
    }
    return view('agenda.index', compact('agendas', 'name'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $profesiones = DB::table('auxprofesiones as auxProf')
      ->where('auxProf.agendas', '=', 'SI')
      ->orderBy('nombreprofesion', 'asc')
      ->get();
    // $profesiones = AuxProfesion::all();
    return view('agenda.create', ['profesiones' => $profesiones]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request, Agenda $agenda)
  {
    $agenda->create($request->all());
    return redirect()->route(
      'agenda.index',
      ['agenda' => $agenda->id]
    )->with('success', 'Actualizado con exito');
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
  public function edit(string $id)
  {
    $personal = Agenda::find($id);
    $profesiones = DB::table('auxprofesiones as auxProf')
      ->where('auxProf.agendas', '=', 'SI')
      ->orderBy('nombreprofesion', 'asc')
      ->get();
    // $profesiones = AuxProfesion::all();
    return view('agenda.edit', ['personal' => $personal, 'profesiones' => $profesiones]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Agenda $agenda)
  {
    $agenda->update($request->all());
    return redirect()->route(
      'agenda.index',
      ['agenda' => $agenda->id]
    )->with('success', 'Actualizado con exito');
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

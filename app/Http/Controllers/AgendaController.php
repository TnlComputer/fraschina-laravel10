<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
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
        ->select(
          'ag.nombre',
          'ag.apellido',
          'ag.empresa_institucion',
          'ag.profesion_especialidad_oficio',
          'ag.cod_prof',
          'ag.tel_particular',
          'ag.tel_laboral',
          'ag.interno',
          'ag.celular',
          'ag.mail',
          'ag.direccion',
          'ag.observaciones',
          'ag.id',
        )
        ->where('nombre', 'like', '%' . $request->name . '%')
        ->orWhere('apellido', 'like', '%' . $request->name . '%')
        ->orWhere('empresa_institucion', 'like', '%' . $request->name . '%')
        ->orWhere('profesion_especialidad_oficio', 'like', '%' . $request->name . '%')
        ->paginate(15);
    } else {
      $agendas = Agenda::paginate(15);
    }
    return view('agenda.index', compact('agendas'));
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
    //
  }
}

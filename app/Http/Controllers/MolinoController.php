<?php

namespace App\Http\Controllers;

use App\Models\Molino;
use App\Models\AuxAreas;
use App\Models\AuxZonas;
use App\Models\AuxCargos;
use App\Models\AuxBarrios;
use Illuminate\Http\Request;
use App\Models\AuxMunicipios;
use App\Models\AuxLocalidades;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MolinoController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $name = trim($request->get('name'));
    if ($name) {
      $molinos = DB::table('molinos as resp')
        ->join('AuxBarrios as auxb', 'resp.barrio_id', '=', 'auxb.id')
        ->join('AuxLocalidades as auxLoc', 'resp.localidad_id', '=', 'auxLoc.id')
        ->join('AuxMunicipios as auxMun', 'resp.municipio_id', '=', 'auxMun.id')
        ->select(
          'resp.razonsocial',
          'resp.dire_calle',
          'resp.dire_nro',
          'resp.piso',
          'resp.codpost',
          'resp.dire_obs',
          'resp.telefono',
          'resp.fax',
          'resp.cuit',
          'resp.correo',
          'resp.dpto',
          'resp.marcas',
          'resp.info',
          'resp.id',
          'resp.correo',
          'auxb.nombrebarrio as barrio',
          'auxLoc.localidad as localidad',
          'auxMun.ciudadmunicipio as municipio',
        )
        ->where('status', '=', 'A')
        ->orWhere('razonsocial', 'like', '%' . $request->name . '%')
        // ->orWhere('marcas', 'like', '%' . $request->name . '%')
        ->paginate(15);
    } else {
      $molinos = DB::table('molinos as resp')
        ->join('AuxBarrios as auxb', 'resp.barrio_id', '=', 'auxb.id')
        ->join('AuxLocalidades as auxLoc', 'resp.localidad_id', '=', 'auxLoc.id')
        ->join('AuxMunicipios as auxMun', 'resp.municipio_id', '=', 'auxMun.id')
        ->select(
          'auxb.nombrebarrio as barrio',
          'auxLoc.localidad as localidad',
          'auxMun.ciudadmunicipio as municipio',
          'resp.razonsocial',
          'resp.dire_calle',
          'resp.dire_nro',
          'resp.piso',
          'resp.codpost',
          'resp.dire_obs',
          'resp.telefono',
          'resp.fax',
          'resp.cuit',
          'resp.correo',
          'resp.dpto',
          'resp.marcas',
          'resp.info',
          'resp.id',
          'resp.correo'
        )
        ->where('status', '=', 'A')
        ->paginate(15);
    }
    // $molinos = Molino::orderBy('razonsocial', 'ASC')->paginate(15);
    return view('molino.index', compact('molinos'));
  }


  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $barrios = AuxBarrios::all();
    $localidades = AuxLocalidades::all();
    $municipios = AuxMunicipios::all();
    // $zonas = AuxZonas::all();

    return view('molino.create', compact('barrios', 'localidades', 'municipios'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request, Molino $molino)
  {
    $molino::create($request->all());
    return redirect()->route('molino.index')
      ->with('success', 'Alta realizada con exito');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $molino = DB::table('molinos as mol')
      ->join('AuxLocalidades as auxLoc', 'mol.localidad_id', '=', 'auxLoc.id')
      ->join('AuxMunicipios as auxMun', 'mol.municipio_id', '=', 'auxMun.id')
      ->join('AuxBarrios as auxB', 'mol.barrio_id', '=', 'auxB.id')
      ->select(
        'mol.id',
        'mol.razonsocial',
        'mol.dire_calle',
        'mol.dire_nro',
        'mol.piso',
        'mol.dpto',
        'mol.dire_obs',
        'mol.codpost',
        'mol.telefono',
        'mol.fax',
        'mol.cuit',
        'mol.correo',
        'mol.excenciones',
        'mol.info',
        'mol.marcas',
        'mol.status',
        'auxLoc.localidad as localidad',
        'auxMun.ciudadmunicipio as municipio',
        'auxB.nombrebarrio as barrio',
      )
      ->where('mol.status', '=', 'A')
      ->where('mol.id', '=', $id)
      ->first();

    $molinos_personales = DB::table('molino_personal as mp')
      ->join('AuxAreas as auxA', 'mp.area_id', '=', 'auxA.id')
      ->join('AuxCargos as auxCar', 'mp.cargo_id', '=', 'auxCar.id')
      ->join('AuxProfesiones as auxProf', 'mp.profesion_id', '=', 'auxProf.id')
      ->select(
        'mp.id',
        'mp.molino_id',
        'mp.nombre',
        'mp.apellido',
        'mp.teldirecto',
        'mp.interno',
        'mp.telcelular',
        'mp.telparticular',
        'mp.email',
        'mp.observaciones',
        'mp.fuera',
        'auxA.area as area',
        'auxCar.cargo as cargo',
        'auxProf.nombreprofesion as profesion'
      )
      ->where('mp.status', '=', 'A')
      ->where('mp.molino_id', '=', $id)
      ->paginate(10);

    return view('molino.show', ['molino' => $molino, 'molinos_personales' => $molinos_personales]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $molino = Molino::find($id);
    $barrios = AuxBarrios::all();
    $localidades = AuxLocalidades::all();
    $municipios = AuxMunicipios::all();
    // $zonas = AuxZonas::all();

    return view('molino.edit', compact('molino', 'barrios', 'localidades', 'municipios'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Molino $molino)
  {
    $molino->update($request->all());
    return redirect()->route('molino.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Molino $molino)
  {
    $molino = Molino::findOrFail($molino->id);
    $molino->status = 'C';
    $molino->update();
    return redirect()->route('molino.index')
      ->with('danger', 'Cliente Eliminado');
  }
}

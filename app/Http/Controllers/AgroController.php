<?php

namespace App\Http\Controllers;

use App\Models\Agro;
use App\Models\AuxAreas;
use App\Models\AuxCargos;
use App\Models\AuxBarrios;
use Illuminate\Http\Request;
use App\Models\AuxMunicipios;
use App\Models\AuxLocalidades;
use Illuminate\Support\Facades\DB;

class AgroController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $name = trim($request->get('name'));
    if ($name) {
      $agros = DB::table('agros as resp')
        ->join('AuxBarrios as auxb', 'resp.barrio_id', '=', 'auxb.id')
        ->join('AuxLocalidades as auxLoc', 'resp.localidad_id', '=', 'auxLoc.id')
        ->join('AuxMunicipios as auxMun', 'resp.municipio_id', '=', 'auxMun.id')
        ->select('auxb.nombrebarrio as barrio', 'auxLoc.localidad as localidad', 'auxMun.ciudadmunicipio as municipio', 'resp.razonsocial', 'resp.dire_calle', 'resp.dire_nro', 'resp.piso', 'resp.codpost', 'resp.dire_obs', 'resp.telefono', 'resp.fax', 'resp.cuit', 'resp.correo', 'resp.dpto', 'resp.marcas', 'resp.info', 'resp.id', 'resp.correo')
        ->where('status', '=', 'A')
        ->orWhere('razonsocial', 'like', '%' . $request->name . '%')
        // ->orWhere('marcas', 'like', '%' . $request->name . '%')
        ->paginate(15);
    } else {
      $agros = DB::table('agros as resp')
        ->join('AuxBarrios as auxb', 'resp.barrio_id', '=', 'auxb.id')
        ->join('AuxLocalidades as auxLoc', 'resp.localidad_id', '=', 'auxLoc.id')
        ->join('AuxMunicipios as auxMun', 'resp.municipio_id', '=', 'auxMun.id')
        ->select('auxb.nombrebarrio as barrio', 'auxLoc.localidad as localidad', 'auxMun.ciudadmunicipio as municipio', 'resp.razonsocial', 'resp.dire_calle', 'resp.dire_nro', 'resp.piso', 'resp.codpost', 'resp.dire_obs', 'resp.telefono', 'resp.fax', 'resp.cuit', 'resp.correo', 'resp.dpto', 'resp.marcas', 'resp.info', 'resp.id', 'resp.correo')
        ->where('status', '=', 'A')
        ->paginate(15);
    }
    return view('agro.index', compact('agros'));
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

    return view('agro.create', compact('barrios', 'localidades', 'municipios'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request, Agro $agro)
  {
    $agro::create($request->all());
    return redirect()->route('agro.index')
      ->with('success', 'Alta realizada con exito');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $agro = DB::table('agros as agr')
      ->join('AuxLocalidades as auxLoc', 'agr.localidad_id', '=', 'auxLoc.id')
      ->join('AuxMunicipios as auxMun', 'agr.municipio_id', '=', 'auxMun.id')
      ->join('AuxBarrios as auxB', 'agr.barrio_id', '=', 'auxB.id')
      ->select(
        'agr.id',
        'agr.razonsocial',
        'agr.dire_calle',
        'agr.dire_nro',
        'agr.piso',
        'agr.dpto',
        'agr.dire_obs',
        'agr.codpost',
        'agr.telefono',
        'agr.fax',
        'agr.cuit',
        'agr.correo',
        'agr.info',
        'agr.marcas',
        'agr.status',
        'auxLoc.localidad as localidad',
        'auxMun.ciudadmunicipio as municipio',
        'auxB.nombrebarrio as barrio',
      )
      ->where('agr.status', '=', 'A')
      ->where('agr.id', '=', $id)
      ->first();

    $personal = DB::table('agro_personal as ap')
      ->join('AuxAreas as auxA', 'ap.area_id', '=', 'auxA.id')
      ->join('AuxCargos as auxCar', 'ap.cargo_id', '=', 'auxCar.id')
      ->join('AuxProfesiones as auxProf', 'ap.profesion_id', '=', 'auxProf.id')
      ->select(
        'ap.id',
        'ap.agro_id',
        'ap.nombre',
        'ap.apellido',
        'ap.teldirecto',
        'ap.interno',
        'ap.telcelular',
        'ap.telparticular',
        'ap.email',
        'ap.observaciones',
        'ap.fuera',
        'auxA.area as area',
        'auxCar.cargo as cargo',
        'auxProf.nombreprofesion as profesion',
      )
      ->where('ap.status', '=', 'A')
      ->where('ap.agro_id', '=', $id)
      ->paginate(10);

    $productos =  DB::table('agro_productos as apr')
      ->join('AuxProductosAgro as auxProd', 'apr.producto_id', '=', 'auxProd.id')
      ->select('auxProd.nombre as producto', 'apr.id', 'apr.agro_id')
      ->where('apr.agro_id', '=', $agro->id)
      ->where('apr.status', '=', 'A')
      ->get();

    return view('agro.show', [
      'agro' => $agro, 'personal' => $personal, 'productos' => $productos
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $agro = Agro::find($id);
    $barrios = AuxBarrios::all();
    $localidades = AuxLocalidades::all();
    $municipios = AuxMunicipios::all();
    // $zonas = AuxZonas::all();

    return view('agro.edit', compact('agro', 'barrios', 'localidades', 'municipios'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Agro $agro)
  {
    $agro->update($request->all());
    return redirect()->route('agro.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Agro $agro)
  {
    $agro = agro::findOrFail($agro->id);
    $agro->status = 'C';
    $agro->update();
    return redirect()->route('agro.index')
      ->with('danger', 'Cliente Eliminado');
  }
}

<?php

namespace App\Http\Controllers;

use App\Models\AuxAreas;
use App\Models\AuxZonas;
use App\Models\AuxCargos;
use App\Models\AuxBarrios;
use App\Models\AuxProfesion;
use Illuminate\Http\Request;
use App\Models\AuxLocalidades;
use App\Models\AuxMunicipios;
use App\Models\AuxProfesiones;
use App\Models\Representacion;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;
use Illuminate\Support\Facades\Auth;
use App\Models\Representacion_Personal;
use App\Models\Representacion_Productos;

class RepresentacionController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    // $user = Auth::user();

    $name = trim($request->get('name'));
    if ($name) {
      $representaciones = DB::table('representacions as r')
        ->join('AuxBarrios as auxb', 'r.barrio_id', '=', 'auxb.id')
        ->join('AuxLocalidades as auxLoc', 'r.localidad_id', '=', 'auxLoc.id')
        ->join('AuxMunicipios as auxMun', 'r.municipio_id', '=', 'auxMun.id')
        ->join('AuxZonas as auxZon', 'r.zona_id', '=', 'auxZon.id')
        ->select('auxb.nombrebarrio as barrio', 'auxLoc.localidad', 'auxMun.ciudadmunicipio as municipio', 'auxZon.nombre as zona', 'r.razonsocial', 'r.dire_calle', 'r.dire_nro', 'r.piso', 'r.codpost', 'r.dire_obs', 'r.telefono', 'r.fax', 'r.cuit', 'r.correo', 'r.dpto', 'r.marcas', 'r.info', 'r.id', 'r.correo')
        ->orWhere('razonsocial', 'like', '%' . $request->name . '%')
        ->orWhere('marcas', 'like', '%' . $request->name . '%')
        ->paginate(15);
    } else {
      $representaciones = DB::table('representacions as r')
        ->join('AuxBarrios as auxb', 'r.barrio_id', '=', 'auxb.id')
        ->join('AuxLocalidades as auxLoc', 'r.localidad_id', '=', 'auxLoc.id')
        ->join('AuxMunicipios as auxMun', 'r.municipio_id', '=', 'auxMun.id')
        ->join('AuxZonas as auxZon', 'r.zona_id', '=', 'auxZon.id')
        ->select('auxb.nombrebarrio as barrio', 'auxLoc.localidad', 'auxMun.ciudadmunicipio as municipio', 'auxZon.nombre as zona', 'r.razonsocial', 'r.dire_calle', 'r.dire_nro', 'r.piso', 'r.codpost', 'r.dire_obs', 'r.telefono', 'r.fax', 'r.cuit', 'r.correo', 'r.dpto', 'r.marcas', 'r.info', 'r.id', 'r.correo')
        ->where('r.status', '=', 'A')
        ->paginate(15);
    }
    return view('representacion.index', compact('representaciones'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $barrios = AuxBarrios::all();
    $localidades = AuxLocalidades::all();
    $municipios = AuxMunicipios::all();
    $zonas = AuxZonas::all();

    return view('representacion.create', ['barrios' => $barrios, 'localidades' => $localidades, 'municipios' => $municipios, 'zonas' => $zonas]);
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    Representacion::create($request->all());
    return view('representacion.index')->with('success', 'Alta Representación realizada con exito');
    // return redirect()->route('representacion.index')->with('success', 'Alta Representació realizada con exito');
  }

  /**
   * Display the specified resource.
   */
  public function show(Representacion $representacion)
  {
    $represento = DB::table('representacions as r')
      ->join('AuxBarrios as auxB', 'r.barrio_id', '=', 'auxB.id')
      ->join('AuxLocalidades as auxLoc', 'r.localidad_id', '=', 'auxLoc.id')
      ->join('AuxMunicipios as auxMun', 'r.municipio_id', '=', 'auxMun.id')
      ->join('AuxZonas as auxZon', 'r.zona_id', '=', 'auxZon.id')
      ->select('auxB.nombrebarrio as barrio', 'auxLoc.localidad', 'auxMun.ciudadmunicipio as municipio', 'auxZon.nombre as zona', 'r.razonsocial', 'r.dire_calle', 'r.dire_nro', 'r.piso', 'r.codpost', 'r.dire_obs', 'r.telefono', 'r.fax', 'r.cuit', 'r.correo', 'r.dpto', 'r.marcas', 'r.info', 'r.id')
      ->where('r.id', '=', $representacion->id)
      ->first();

    $representaciones_personales = DB::table('representacion_personal as rp')
      ->join('AuxProfesiones as auxProf', 'rp.profesion_id', '=', 'auxProf.id')
      ->join('AuxAreas as auxA', 'rp.area_id', '=', 'auxA.id')
      ->join('AuxCargos as auxCar', 'rp.cargo_id', '=', 'auxCar.id')
      ->select('rp.nombre', 'rp.apellido', 'rp.teldirecto', 'rp.interno', 'rp.telcelular', 'rp.telparticular', 'rp.email', 'rp.observaciones', 'rp.fuera', 'auxA.area as area', 'auxCar.cargo as cargo', 'auxProf.nombreprofesion as profesion', 'rp.id', 'rp.representacion_id')
      ->where('rp.representacion_id', '=', $representacion->id)
      ->where('rp.status', '=', 'A')

      ->paginate(10);

    $productos =  DB::table('representacion_productos as rpr')
      ->join('AuxProductosRepresentacion as auxProd', 'rpr.producto_id', '=', 'auxProd.id')
      ->select('auxProd.nombre as producto', 'rpr.pl', 'rpr.p', 'rpr.l', 'rpr.w', 'rpr.glutenhumedo', 'rpr.glutenseco', 'rpr.cenizas', 'rpr.fn', 'rpr.humedad', 'rpr.estabilidad', 'rpr.absorcion', 'rpr.puntuaciones', 'rpr.particularidades', 'rpr.id', 'rpr.representacion_id')
      ->where('rpr.representacion_id', '=', $representacion->id)
      ->where('rpr.status', '=', 'A')
      ->get();

    return view('representacion.show', ['represento' => $represento, 'representaciones_personales' => $representaciones_personales, 'productos' => $productos]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Representacion $representacion)
  {
    $represento = Representacion::find($representacion->id);
    $barrios = AuxBarrios::all();
    $localidades = AuxLocalidades::all();
    $municipios = AuxMunicipios::all();
    $zonas = AuxZonas::all();

    return view('representacion.edit', ['represento' => $represento, 'barrios' => $barrios, 'localidades' => $localidades, 'municipios' => $municipios, 'zonas' => $zonas]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Representacion $representacion)
  {
    $representacion->update($request->all());
    return redirect()->route('representacion.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Representacion $representacion)
  {
    $representacion = Representacion::findOrFail($representacion->id);
    $representacion->status = 'C';
    $representacion->update();
    return redirect()->route('representacion.index')
      ->with('danger', 'Cliente Eliminado');
  }
}

<?php

namespace App\Http\Controllers;

use App\Models\AuxBarrios;
use App\Models\Transporte;
use Illuminate\Http\Request;
use App\Models\AuxMunicipios;
use App\Models\AuxLocalidades;
use Illuminate\Support\Facades\DB;

class TransporteController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $name = trim($request->get('name'));
    if ($name) {
      $transportes = DB::table('transportes as resp')
        ->join('AuxBarrios as auxb', 'resp.barrio_id', '=', 'auxb.id')
        ->join('AuxLocalidades as auxLoc', 'resp.localidad_id', '=', 'auxLoc.id')
        ->join('AuxMunicipios as auxMun', 'resp.municipio_id', '=', 'auxMun.id')
        ->select('auxb.nombrebarrio as barrio', 'auxLoc.localidad as localidad', 'auxMun.ciudadmunicipio as municipio', 'resp.razonsocial', 'resp.dire_calle', 'resp.dire_nro', 'resp.piso', 'resp.codpost', 'resp.dire_obs', 'resp.telefono', 'resp.fax', 'resp.cuit', 'resp.correo', 'resp.dpto', 'resp.marcas', 'resp.info', 'resp.id', 'resp.correo')
        ->where('status', '=', 'A')
        ->orWhere('razonsocial', 'like', '%' . $request->name . '%')
        // ->orWhere('marcas', 'like', '%' . $request->name . '%')
        ->paginate(15);
    } else {
      $transportes = DB::table('transportes as resp')
        ->join('AuxBarrios as auxb', 'resp.barrio_id', '=', 'auxb.id')
        ->join('AuxLocalidades as auxLoc', 'resp.localidad_id', '=', 'auxLoc.id')
        ->join('AuxMunicipios as auxMun', 'resp.municipio_id', '=', 'auxMun.id')
        ->select('auxb.nombrebarrio as barrio', 'auxLoc.localidad as localidad', 'auxMun.ciudadmunicipio as municipio', 'resp.razonsocial', 'resp.dire_calle', 'resp.dire_nro', 'resp.piso', 'resp.codpost', 'resp.dire_obs', 'resp.telefono', 'resp.fax', 'resp.cuit', 'resp.correo', 'resp.dpto', 'resp.marcas', 'resp.info', 'resp.id', 'resp.correo')
        ->where('status', '=', 'A')
        ->paginate(15);
    }
    return view('transporte.index', compact('transportes'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $barrios = AuxBarrios::all();
    $localidades = AuxLocalidades::all();
    $municipios = AuxMunicipios::all();
    return view('transporte.create', compact('localidades', 'municipios', 'barrios'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request, Transporte $transporte)
  {
    $transporte::create($request->all());
    return redirect()->route('transporte.index')
      ->with('success', 'Alta realizada con exito');
  }

  /**
   * Display the specified resource.
   */
  public function show(Transporte $transporte)
  {
    $transporte = DB::table('transportes as resp')
      ->join('AuxBarrios as auxb', 'resp.barrio_id', '=', 'auxb.id')
      ->join('AuxLocalidades as auxLoc', 'resp.localidad_id', '=', 'auxLoc.id')
      ->join('AuxMunicipios as auxMun', 'resp.municipio_id', '=', 'auxMun.id')
      ->select('auxb.nombrebarrio as barrio', 'auxLoc.localidad as localidad', 'auxMun.ciudadmunicipio as municipio', 'resp.razonsocial', 'resp.dire_calle', 'resp.dire_nro', 'resp.piso', 'resp.codpost', 'resp.dire_obs', 'resp.telefono', 'resp.fax', 'resp.cuit', 'resp.correo', 'resp.dpto', 'resp.marcas', 'resp.info', 'resp.id', 'resp.correo')
      ->where('resp.status', '=', 'A')
      ->where('resp.id', '=', $transporte->id)
      ->first();

    $transportees_personales = DB::table('transporte_personal as rp')
      ->join('AuxProfesiones as auxProf', 'rp.profesion_id', '=', 'auxProf.id')
      ->join('AuxAreas as auxA', 'rp.area_id', '=', 'auxA.id')
      ->join('AuxCargos as auxCar', 'rp.cargo_id', '=', 'auxCar.id')
      ->select('rp.nombre', 'rp.apellido', 'rp.teldirecto', 'rp.interno', 'rp.telcelular', 'rp.telparticular', 'rp.email', 'rp.observaciones', 'rp.fuera', 'auxA.area as area', 'auxCar.cargo as cargo', 'auxProf.nombreprofesion as profesion', 'rp.id', 'rp.transporte_id')
      ->where('rp.transporte_id', '=', $transporte->id)
      ->where('rp.status', '=', 'A')
      ->paginate(10);

    // $productos =  DB::table('transporte_productos as rpr')
    //   ->join('AuxProductostransportees as auxProd', 'rpr.producto_id', '=', 'auxProd.id')
    //   ->select('auxProd.nombre as producto', 'rpr.id', 'rpr.transporte_id')
    //   ->where('rpr.transporte_id', '=', $transporte->id)
    //   ->where('rpr.status', '=', 'A')
    //   ->get();

    // return view('transporte.show', ['transporte' => $transporte, 'transportees_personales' => $transportees_personales, 'productos' => $productos]);

    return view('transporte.show', ['transporte' => $transporte, 'transportees_personales' => $transportees_personales]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Transporte $transporte)
  {
    $transporte = transporte::find($transporte->id);
    $barrios = AuxBarrios::all();
    $localidades = AuxLocalidades::all();
    $municipios = AuxMunicipios::all();

    return view('transporte.edit', ['transporte' => $transporte, 'barrios' => $barrios, 'localidades' => $localidades, 'municipios' => $municipios]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Transporte $transporte)
  {
    $transporte->update($request->all());
    return redirect()->route('transporte.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Transporte $transporte)
  {
    $transporte = transporte::findOrFail($transporte->id);
    $transporte->status = 'C';
    $transporte->update();
    return redirect()->route('transporte.index')
      ->with('danger', 'transporte Eliminado');
  }
}

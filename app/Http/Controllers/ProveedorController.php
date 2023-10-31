<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Models\AuxBarrios;
use Illuminate\Http\Request;
use App\Models\AuxMunicipios;
use App\Models\AuxLocalidades;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $name = trim($request->get('name'));
    if ($name) {
      $proveedores = DB::table('proveedores as resp')
        ->join('AuxBarrios as auxb', 'resp.barrio_id', '=', 'auxb.id')
        ->join('AuxLocalidades as auxLoc', 'resp.localidad_id', '=', 'auxLoc.id')
        ->join('AuxMunicipios as auxMun', 'resp.municipio_id', '=', 'auxMun.id')
        ->select('auxb.nombrebarrio as barrio', 'auxLoc.localidad as localidad', 'auxMun.ciudadmunicipio as municipio', 'resp.razonsocial', 'resp.dire_calle', 'resp.dire_nro', 'resp.piso', 'resp.codpost', 'resp.dire_obs', 'resp.telefono', 'resp.fax', 'resp.cuit', 'resp.correo', 'resp.dpto', 'resp.marcas', 'resp.info', 'resp.id', 'resp.correo')
        ->where('status', '=', 'A')
        ->orWhere('razonsocial', 'like', '%' . $request->name . '%')
        // ->orWhere('marcas', 'like', '%' . $request->name . '%')
        ->paginate(15);
    } else {
      $proveedores = DB::table('proveedores as resp')
        ->join('AuxBarrios as auxb', 'resp.barrio_id', '=', 'auxb.id')
        ->join('AuxLocalidades as auxLoc', 'resp.localidad_id', '=', 'auxLoc.id')
        ->join('AuxMunicipios as auxMun', 'resp.municipio_id', '=', 'auxMun.id')
        ->select('auxb.nombrebarrio as barrio', 'auxLoc.localidad as localidad', 'auxMun.ciudadmunicipio as municipio', 'resp.razonsocial', 'resp.dire_calle', 'resp.dire_nro', 'resp.piso', 'resp.codpost', 'resp.dire_obs', 'resp.telefono', 'resp.fax', 'resp.cuit', 'resp.correo', 'resp.dpto', 'resp.marcas', 'resp.info', 'resp.id', 'resp.correo')
        ->where('status', '=', 'A')
        ->paginate(15);
    }
    return view('proveedor.index', compact('proveedores', 'name'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $barrios = AuxBarrios::all();
    $localidades = AuxLocalidades::all();
    $municipios = AuxMunicipios::all();
    return view('proveedor.create', compact('localidades', 'municipios', 'barrios'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request, Proveedor $proveedor)
  {
    $proveedor::create($request->all());
    return redirect()->route('proveedor.index')
      ->with('success', 'Alta realizada con exito');
  }

  /**
   * Display the specified resource.
   */
  public function show(Proveedor $proveedor)
  {
    $proveedor = DB::table('proveedores as resp')
      ->join('AuxBarrios as auxb', 'resp.barrio_id', '=', 'auxb.id')
      ->join('AuxLocalidades as auxLoc', 'resp.localidad_id', '=', 'auxLoc.id')
      ->join('AuxMunicipios as auxMun', 'resp.municipio_id', '=', 'auxMun.id')
      ->select('auxb.nombrebarrio as barrio', 'auxLoc.localidad as localidad', 'auxMun.ciudadmunicipio as municipio', 'resp.razonsocial', 'resp.dire_calle', 'resp.dire_nro', 'resp.piso', 'resp.codpost', 'resp.dire_obs', 'resp.telefono', 'resp.fax', 'resp.cuit', 'resp.correo', 'resp.dpto', 'resp.marcas', 'resp.info', 'resp.id', 'resp.correo')
      ->where('resp.status', '=', 'A')
      ->where('resp.id', '=', $proveedor->id)
      ->first();

    $proveedores_personales = DB::table('proveedor_personal as rp')
      ->join('AuxProfesiones as auxProf', 'rp.profesion_id', '=', 'auxProf.id')
      ->join('AuxAreas as auxA', 'rp.area_id', '=', 'auxA.id')
      ->join('AuxCargos as auxCar', 'rp.cargo_id', '=', 'auxCar.id')
      ->select('rp.nombre', 'rp.apellido', 'rp.teldirecto', 'rp.interno', 'rp.telcelular', 'rp.telparticular', 'rp.email', 'rp.observaciones', 'rp.fuera', 'auxA.area as area', 'auxCar.cargo as cargo', 'auxProf.nombreprofesion as profesion', 'rp.id', 'rp.proveedor_id')
      ->where('rp.proveedor_id', '=', $proveedor->id)
      ->where('rp.status', '=', 'A')
      ->paginate(10);

    $productos =  DB::table('proveedor_productos as rpr')
      ->join('AuxProductosproveedores as auxProd', 'rpr.producto_id', '=', 'auxProd.id')
      ->select('auxProd.nombre as producto', 'rpr.id', 'rpr.proveedor_id')
      ->where('rpr.proveedor_id', '=', $proveedor->id)
      ->where('rpr.status', '=', 'A')
      ->get();

    return view('proveedor.show', ['proveedor' => $proveedor, 'proveedores_personales' => $proveedores_personales, 'productos' => $productos]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Proveedor $proveedor)
  {
    $proveedor = proveedor::find($proveedor->id);
    $barrios = AuxBarrios::all();
    $localidades = AuxLocalidades::all();
    $municipios = AuxMunicipios::all();

    return view('proveedor.edit', ['proveedor' => $proveedor, 'barrios' => $barrios, 'localidades' => $localidades, 'municipios' => $municipios]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Proveedor $proveedor)
  {
    $proveedor->update($request->all());
    return redirect()->route('proveedor.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Proveedor $proveedor)
  {
    $proveedor = Proveedor::findOrFail($proveedor->id);
    $proveedor->status = 'C';
    $proveedor->update();
    return redirect()->route('proveedor.index')
      ->with('danger', 'Proveedor Eliminado');
  }
}
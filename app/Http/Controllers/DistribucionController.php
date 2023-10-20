<?php

namespace App\Http\Controllers;

use App\Models\AuxPagos;
use App\Models\AuxVeraz;
use App\Models\AuxZonas;
use App\Models\AuxCalles;
use App\Models\AuxCobrar;
use App\Models\AuxEstado;
use App\Models\AuxBarrios;
use App\Models\AuxContacto;
use App\Models\AuxTipoPagos;
use App\Models\Distribucion;
use Illuminate\Http\Request;
use App\Models\AuxMunicipios;
use App\Models\AuxLocalidades;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class DistribucionController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    // $distribuciones = Distribucion::orderBy('razonsocial', 'ASC')->paginate(15);

    $distribuciones = DB::table('distribucions as d')
      ->join('AuxCalles as auxCalle', 'd.dire_calle_id', '=', 'auxCalle.id')
      ->join('AuxBarrios as auxB', 'd.barrio_id', '=', 'auxB.id')
      ->join('AuxLocalidades as auxLoc', 'd.localidad_id', '=', 'auxLoc.id')
      ->join('AuxMunicipios as auxMun', 'd.municipio_id', '=', 'auxMun.id')
      ->join('AuxZonas as auxZon', 'd.zona_id', '=', 'auxZon.id')
      ->select('d.clisg_id', 'd.razonsocial', 'd.nomfantasia', 'd.dire_nro', 'd.piso', 'd.codpost', 'd.dire_obs', 'd.telefono', 'd.fax', 'd.cuit', 'd.correo', 'd.dpto', 'd.marcas', 'd.info', 'd.id', 'd.correo', 'auxB.nombrebarrio as barrio', 'auxMun.ciudadmunicipio as municipio', 'auxZon.nombre as zona', 'auxLoc.localidad as localidad', 'auxCalle.calle as dire_calle')
      ->paginate(15);
    return view('distribucion.index', compact('distribuciones'));
  }

  /**
   * Search a list of registered
   */
  public function search(Request $request)
  {
    $distribuciones = DB::table('distribucions as d')
      ->join('AuxCalles as auxCalle', 'd.dire_calle_id', '=', 'auxCalle.id')
      ->join('AuxBarrios as auxB', 'd.barrio_id', '=', 'auxB.id')
      ->join('AuxLocalidades as auxLoc', 'd.localidad_id', '=', 'auxLoc.id')
      ->join('AuxMunicipios as auxMun', 'd.municipio_id', '=', 'auxMun.id')
      ->join('AuxZonas as auxZon', 'd.zona_id', '=', 'auxZon.id')
      ->select('d.clisg_id', 'd.razonsocial', 'd.nomfantasia', 'd.dire_nro', 'd.piso', 'd.codpost', 'd.dire_obs', 'd.telefono', 'd.fax', 'd.cuit', 'd.correo', 'd.dpto', 'd.marcas', 'd.info', 'd.id', 'd.correo', 'auxB.nombrebarrio as barrio', 'auxMun.ciudadmunicipio as municipio', 'auxZon.nombre as zona', 'auxLoc.localidad as localidad', 'auxCalle.calle as dire_calle')
      ->where('nomfantasia', 'like', '%' . $request->name . '%')
      ->orWhere('razonsocial', 'like', '%' . $request->name . '%')
      ->orWhere('clisg_id', 'like', '%' . $request->name . '%')
      // ->orderBy('nomfantasia', 'asc')
      // ->orderBy('nomfantasia', 'asc', 'razonSocial', 'asc',  'clisg', 'asc')
      ->paginate(15);

    return view('distribucion.index', compact('distribuciones'));
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
  public function show(Distribucion $distribucion)
  {
    $distribucion = DB::table('distribucions as d')
      ->join('AuxCalles as auxCalle', 'd.dire_calle_id', '=', 'auxCalle.id')
      ->join('AuxBarrios as auxB', 'd.barrio_id', '=', 'auxB.id')
      ->join('AuxLocalidades as auxLoc', 'd.localidad_id', '=', 'auxLoc.id')
      ->join('AuxMunicipios as auxMun', 'd.municipio_id', '=', 'auxMun.id')
      ->join('AuxZonas as auxZon', 'd.zona_id', '=', 'auxZon.id')
      ->join('AuxContacto as auxCon', 'd.contacto_id', '=', 'auxCon.id')
      ->join('AuxVeraz as auxVez', 'd.veraz_id', '=', 'auxVez.id')
      ->join('AuxEstado as auxEst', 'd.estado_id', '=', 'auxEst.id')
      ->join('AuxCobrar as auxCob', 'd.cobrar_id', '=', 'auxCob.id')
      ->join('AuxPagos as auxPag', 'd.cobro_id', '=', 'auxPag.id')
      ->join('AuxTipoPagos as auxTPag', 'd.tcobro_id', '=', 'auxTPag.id')
      ->select(
        'd.clisg_id',
        'd.razonsocial',
        'd.nomfantasia',
        'd.dire_nro',
        'd.piso',
        'd.codpost',
        'd.dire_obs',
        'd.telefono',
        'd.fax',
        'd.cuit',
        'd.correo',
        'd.dpto',
        'd.marcas',
        'd.info',
        'd.id',
        'd.correo',
        'd.auto',
        'd.desde',
        'd.hasta',
        'd.productCDA',
        'd.lunes',
        'd.sabado',
        'd.fac_imp',
        'd.desde1',
        'd.hasta1',
        'd.obsrecep',
        'auxCalle.calle as dire_calle',
        'auxB.nombrebarrio as barrio',
        'auxLoc.localidad as localidad',
        'auxMun.ciudadmunicipio as municipio',
        'auxZon.nombre as zona',
        'auxCon.contacto as contacto',
        'auxVez.estado as veraz',
        'auxEst.nomEstado as estado',
        'auxCob.accion as cobrar',
        'auxPag.nombre as condpago',
        'auxTPag.nombre as tipopago'
      )
      ->where('d.id', '=', $distribucion->id)
      ->orderBy('nomfantasia', 'asc')
      ->first();

    $distribuciones_personal = DB::table('distribucion_personal as dp')
      ->join('AuxAreas as auxA', 'dp.area_id', '=', 'auxA.id')
      ->join('AuxCargos as auxCar', 'dp.cargo_id', '=', 'auxCar.id')
      ->join('AuxProfesiones as auxProf', 'dp.profesion_id', '=', 'auxProf.id')
      ->select(
        'dp.id',
        'dp.distribucion_id',
        'dp.nombre',
        'dp.apellido',
        'dp.teldirecto',
        'dp.interno',
        'dp.telcelular',
        'dp.telparticular',
        'dp.email',
        'dp.observaciones',
        'dp.fuera',
        'auxA.area as area',
        'auxCar.cargo as cargo',
        'auxProf.nombreprofesion as profesion'
      )
      ->where('dp.distribucion_id', '=', $distribucion->id)
      ->paginate(10);

    $productos =  DB::table('distribucion_productos as dpr')
      ->join('AuxProductosdistribucion as auxProd', 'dpr.producto_id', '=', 'auxProd.id')
      ->select('dpr.precio', 'dpr.fecha', 'dpr.nomproducto', 'dpr.fechaUEnt', 'dpr.id')
      ->where('dpr.distribucion_id', '=', $distribucion->id)
      ->get();

    return view('distribucion.show', ['distribucion' => $distribucion, 'distribuciones_personal' => $distribuciones_personal, 'productos' => $productos]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Distribucion $distribucion)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Distribucion $distribucion)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Distribucion $distribucion)
  {
    //
  }
}

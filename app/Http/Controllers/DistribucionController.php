<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\AuxZonas;
use App\Models\AuxBarrios;
use App\Models\Distribucion;
use App\Models\AuxLocalidades;
use App\Models\AuxMunicipios;


class DistribucionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $distribuciones = Distribucion::orderBy('razonsocial', 'ASC')->paginate(15);

        $distribuciones = DB::table('distribucions as d')
        ->join('AuxBarrios as auxB', 'd.barrio_id', '=', 'auxB.id')
        ->join('AuxLocalidades as auxLoc', 'd.localidad_id', '=', 'auxLoc.id')
        ->join('AuxMunicipios as auxMun', 'd.municipio_id', '=', 'auxMun.id')
        ->join('AuxZonas as auxZon', 'd.zona_id', '=', 'auxZon.id')
        ->select( 'd.clisg_id', 'd.razonsocial', 'd.nomfantasia', 'd.dire_calle', 'd.dire_nro', 'd.piso', 'd.codpost', 'd.dire_obs', 'd.telefono', 'd.fax', 'd.cuit', 'd.correo', 'd.dpto', 'd.marcas', 'd.info', 'd.id', 'd.correo', 'auxB.nombrebarrio as barrio', 'auxMun.ciudadmunicipio as municipio', 'auxZon.nombre as zona', 'auxLoc.localidad as localidad')
        ->paginate(20);
        return view('distribucion', compact('distribuciones'));
      }

          /**
     * Search a list of registered
     */
    public function search(Request $request)
    {
      $distribuciones = DB::table('distribucions as d')
        ->join('AuxBarrios as auxB', 'd.barrio_id', '=', 'auxB.id')
        ->join('AuxLocalidades as auxLoc', 'd.localidad_id', '=', 'auxLoc.id')
        ->join('AuxMunicipios as auxMun', 'd.municipio_id', '=', 'auxMun.id')
        ->join('AuxZonas as auxZon', 'd.zona_id', '=', 'auxZon.id')
        ->select('d.id', 'd.clisg_id', 'd.razonsocial', 'd.nomfantasia', 'd.dire_calle', 'd.dire_nro', 'd.piso', 'd.codpost', 'd.dire_obs', 'd.telefono', 'd.fax', 'd.cuit', 'd.correo', 'd.dpto', 'd.marcas', 'd.info', 'd.id', 'd.correo', 'auxB.nombrebarrio as barrio', 'auxMun.ciudadmunicipio as municipio', 'auxZon.nombre as zona', 'auxLoc.localidad as localidad')
        ->where('nomfantasia', 'like', '%' . $request->name . '%')
        ->orWhere('razonsocial', 'like', '%' . $request->name . '%')
        ->orWhere('clisg_id', 'like', '%' . $request->name . '%')
        ->paginate(20);

    return view('distribucion', compact('distribuciones'));

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
      $distribuciones_personal = DB::table('distribucion_personal as dp')
        ->join('AuxProfesiones as auxProf', 'dp.profesion_id', '=', 'auxProf.id')
        ->join('AuxAreas as auxA', 'dp.area_id', '=', 'auxA.id')
        ->join('AuxCargos as auxCar', 'dp.cargo_id', '=', 'auxCar.id')
        ->select('dp.nombre', 'dp.apellido', 'dp.teldirecto', 'dp.interno', 'dp.telcelular', 'dp.telparticular', 'dp.email', 'dp.marcas', 'dp.fuera', 'auxA.area as area', 'auxCar.cargo as cargo', 'auxProf.nombreprofesion as profesion', 'dp.id')
        ->where('dp.distribucion_id', '=', $distribucion->id)
        ->paginate(10);

      $productos =  DB::table('distribucion_productos as dpr')
        ->join('AuxProductosdistribucion as auxProd', 'dpr.producto_id', '=', 'auxProd.id')
        ->select('dpr.precio', 'dpr.fecha', 'dpr.nomproducto', 'dpr.fechaUEnt', 'dpr.id')
        ->where('dpr.distribucion_id', '=', $distribucion->id)
        ->get();

        return view('distribuciones.show', ['distribucion' => $distribucion, 'distribuciones_personal' => $distribuciones_personal, 'productos'=>$productos]);
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
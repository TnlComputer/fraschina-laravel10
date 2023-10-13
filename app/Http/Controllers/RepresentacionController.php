<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;
use App\Models\AuxAreas;
use App\Models\AuxZonas;
use App\Models\AuxBarrios;
use App\Models\AuxLocalidades;
use App\Models\AuxProfesiones;
use App\Models\Representacion;
use App\Models\Representacion_Personal;
use App\Models\Representacion_Productos;

class RepresentacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = Auth::user();

        $representaciones = DB::table('representacions as r')
            ->join('AuxBarrios as auxb', 'r.barrio_id', '=', 'auxb.id')
            ->join('AuxLocalidades as auxLoc', 'r.localidad_id', '=', 'auxLoc.id')
            ->join('AuxMunicipios as auxMun', 'r.municipio_id', '=', 'auxMun.id')
            ->join('AuxZonas as auxZon', 'r.zona_id', '=', 'auxZon.id')
            ->select('auxb.nombrebarrio as barrio', 'auxLoc.localidad', 'auxMun.ciudadmunicipio as municipio', 'auxZon.nombre as zona', 'r.razonsocial', 'r.dire_calle', 'r.dire_nro', 'r.piso', 'r.codpost', 'r.dire_obs', 'r.telefono', 'r.fax', 'r.cuit', 'r.correo', 'r.dpto', 'r.marcas', 'r.info', 'r.id', 'r.correo')
        ->paginate(15);
        return view('representacion', compact('representaciones'));
    }

          /**
     * Search a list of registered
     */
    public function search(Request $request)
    {
      $representaciones = DB::table('representacions as r')
        ->join('AuxBarrios as auxb', 'r.barrio_id', '=', 'auxb.id')
        ->join('AuxLocalidades as auxLoc', 'r.localidad_id', '=', 'auxLoc.id')
        ->join('AuxMunicipios as auxMun', 'r.municipio_id', '=', 'auxMun.id')
        ->join('AuxZonas as auxZon', 'r.zona_id', '=', 'auxZon.id')
        ->select('auxb.nombrebarrio as barrio', 'auxLoc.localidad', 'auxMun.ciudadmunicipio as municipio', 'auxZon.nombre as zona', 'r.razonsocial', 'r.dire_calle', 'r.dire_nro', 'r.piso', 'r.codpost', 'r.dire_obs', 'r.telefono', 'r.fax', 'r.cuit', 'r.correo', 'r.dpto', 'r.marcas', 'r.info', 'r.id', 'r.correo')
        ->orWhere('razonsocial', 'like', '%' . $request->name . '%')
        ->paginate(15);

        return view('representacion', compact('representaciones'));
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

        // $comentarios =  DB::table('representacion_comentarios as rc')
        //     ->select('rc.comentario', 'rc.fecha')
        //     ->where('rc.representacion_id', '=', $representacion->id)
        //     ->get();

        $representaciones_personal = DB::table('representacion_personal as rp')
            ->join('AuxProfesiones as auxProf', 'rp.profesion_id', '=', 'auxProf.id')
            ->join('AuxAreas as auxA', 'rp.area_id', '=', 'auxA.id')
            ->join('AuxCargos as auxCar', 'rp.cargo_id', '=', 'auxCar.id')
            ->select('rp.nombre', 'rp.apellido', 'rp.teldirecto', 'rp.interno', 'rp.telcelular', 'rp.telparticular', 'rp.email', 'rp.marcas', 'rp.fuera', 'auxA.area as area', 'auxCar.cargo as cargo', 'auxProf.nombreprofesion as profesion', 'rp.id')
            ->where('rp.representacion_id', '=', $representacion->id)
            ->paginate(10);

        $productos =  DB::table('representacion_productos as rpr')
            ->join('AuxProductosRepresentacion as auxProd', 'rpr.producto_id', '=', 'auxProd.id')
            ->select('auxProd.nombre as producto', 'rpr.pl', 'rpr.p', 'rpr.l', 'rpr.w', 'rpr.glutenhumedo','rpr.glutenseco', 'rpr.cenizas', 'rpr.fn', 'rpr.humedad', 'rpr.estabilidad', 'rpr.absorcion', 'rpr.puntuaciones', 'rpr.particularidades', 'rpr.id')
            ->where('rpr.representacion_id', '=', $representacion->id)
            ->get();


        // return view('representaciones.show', ['represento' => $represento, 'representaciones_personal' => $representaciones_personal, 'productos'=>$productos, 'comentarios'=>$comentarios]);
        return view('representaciones.show', ['represento' => $represento, 'representaciones_personal' => $representaciones_personal, 'productos'=>$productos]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Representacion $representacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Representacion $representacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Representacion $representacion)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\AuxAreas;
use App\Models\AuxZonas;
use App\Models\AuxBarrios;
use Illuminate\Http\Request;
use App\Models\AuxLocalidades;
use App\Models\AuxProfesiones;

use App\Models\Representacion;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;
use Illuminate\Support\Facades\Auth;
use App\Models\Representacion_Personal;

class RepresentacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = Auth::user();

        $representaciones = Representacion::orderBy('id', 'ASC')->paginate(10);
        // var_dump($representaciones->id);
        // $id = $representaciones->id;
        // $representaciones_personal = DB::table('representacion_personal as rp')
        //     ->join('representacions as r', 'rp.representacion_id', '=', 'r.id')
        //     ->select('rp.nombre', 'rp.apellido', 'rp.aread_id', 'rp.ncategoriacargo_id')
        //     ->where('rp.id', '=', $id)
        //     ->orderBy('cargo_id', 'ASC')->paginate(10);
        // return view('representacion', compact('representaciones', 'representaciones_personal'));
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
            ->join('AuxBarrios as auxb', 'r.barrio_id', '=', 'auxb.id')
            ->join('AuxLocalidades as auxLoc', 'r.localidad_id', '=', 'auxLoc.id')
            ->join('AuxMunicipios as auxMun', 'r.municipio_id', '=', 'auxMun.id')
            ->join('AuxZonas as auxZon', 'r.zona', '=', 'auxZon.id')
            ->select('auxb.nombrebarrio as barrio', 'auxLoc.localidad', 'auxMun.ciudadmunicipio as municipio', 'auxZon.nombre as zona', 'r.razonsocial', 'r.dire_calle', 'r.dire_nro', 'r.piso', 'r.codpost', 'r.dire_obs', 'r.telefono', 'r.fax', 'r.cuit', 'r.correo', 'r.dpto', 'r.infoenparticular', 'r.info', 'r.comentarios', 'r.id')
            ->where('r.id', '=', $representacion->id)
            ->first();

        $representaciones_personal = DB::table('representacion_personal as rp')
            ->join('AuxProfesiones as auxProf', 'rp.profesion_id', '=', 'auxProf.id')
            ->join('AuxAreas as auxA', 'rp.area_id', '=', 'auxA.id')
            ->join('AuxCargos as auxCar', 'rp.cargo_id', '=', 'auxCar.id')
            ->select('rp.nombre', 'rp.apellido', 'rp.teldirecto', 'rp.interno', 'rp.telcelular', 'rp.telparticular', 'rp.email', 'rp.infoenparticular', 'rp.fuera', 'auxA.area as area', 'auxCar.cargo as cargo', 'auxProf.nombreprofesion as profesion', 'rp.id')
            ->where('rp.representacion_id', '=', $representacion->id)
            ->paginate(10);

        return view('representaciones.show', ['represento' => $represento, 'representaciones_personal' => $representaciones_personal]);


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
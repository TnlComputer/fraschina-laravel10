<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Representacion;
use Illuminate\Support\Facades\DB;
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
        $representaciones_personal = DB::table('representacion_personal as rp')
            // ->join('representacions as r', 'rp.representacion_id', '=', 'r.id')
            // ->select('rp.nombre', 'rp.apellido', 'rp.area_id', 'rp.categoriacargo_id')
            ->where('rp.representacion_id', '=', $representacion->id)
            ->paginate(10);


        return view('representaciones.show', compact('representaciones_personal'));

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
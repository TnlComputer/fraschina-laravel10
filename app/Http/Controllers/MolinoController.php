<?php

namespace App\Http\Controllers;

use App\Models\Molino;
use Illuminate\Http\Request;
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
        ->select('auxb.nombrebarrio as barrio', 'auxLoc.localidad as localidad', 'auxMun.ciudadmunicipio as municipio', 'resp.razonsocial', 'resp.dire_calle', 'resp.dire_nro', 'resp.piso', 'resp.codpost', 'resp.dire_obs', 'resp.telefono', 'resp.fax', 'resp.cuit', 'resp.correo', 'resp.dpto', 'resp.marcas', 'resp.info', 'resp.id', 'resp.correo')
        ->where('status', '=', 'A')
        ->orWhere('razonsocial', 'like', '%' . $request->name . '%')
        // ->orWhere('marcas', 'like', '%' . $request->name . '%')
        ->paginate(15);
    } else {
      $molinos = DB::table('molinos as resp')
        ->join('AuxBarrios as auxb', 'resp.barrio_id', '=', 'auxb.id')
        ->join('AuxLocalidades as auxLoc', 'resp.localidad_id', '=', 'auxLoc.id')
        ->join('AuxMunicipios as auxMun', 'resp.municipio_id', '=', 'auxMun.id')
        ->select('auxb.nombrebarrio as barrio', 'auxLoc.localidad as localidad', 'auxMun.ciudadmunicipio as municipio', 'resp.razonsocial', 'resp.dire_calle', 'resp.dire_nro', 'resp.piso', 'resp.codpost', 'resp.dire_obs', 'resp.telefono', 'resp.fax', 'resp.cuit', 'resp.correo', 'resp.dpto', 'resp.marcas', 'resp.info', 'resp.id', 'resp.correo')
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
    //
  }

  /**
   * Display the specified resource.
   */
  public function search(Request $request)
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
  public function show(Molino $molino)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Molino $molino)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Molino $molino)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Molino $molino)
  {
    //
  }
}

<?php

namespace App\Http\Controllers;

use App\Models\Agro;
use Illuminate\Http\Request;

class AgroController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $agros = Agro::orderBy('razonsocial', 'ASC')->paginate(15);
    return view('agro.index', compact('agros'));
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
  public function show(Agro $agro)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Agro $agro)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Agro $agro)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Agro $agro)
  {
    //
  }
}

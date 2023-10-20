<?php

namespace App\Http\Controllers;

use App\Models\Molino;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MolinoController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $molinos = Molino::orderBy('razonsocial', 'ASC')->paginate(15);
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

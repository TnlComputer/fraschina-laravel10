<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Representacion_Personal;

class RepresentacionPersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Representacion_Personal $representacion_Personal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Representacion_Personal $representacion_Personal)
    {
      $repPersonal = DB::table('representacion_personal as rp')
      ->where('representacion_Personal.id', '=', $representacion_Personal->id);
      return view('representacion.personal.edit', compact('repPersonal', $repPersonal));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Representacion_Personal $representacion_Personal)
    {
        //       $note->update($request->all());
        // return redirect()->route('note.index')->with('success', 'Note updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Representacion_Personal $representacion_Personal)
    {
        //         $note->delete();
        // return redirect()->route('note.index')->with('danger', 'Note deleted');

    }
}
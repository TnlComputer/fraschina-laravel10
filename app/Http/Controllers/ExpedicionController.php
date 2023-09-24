<?php

namespace App\Http\Controllers;

use App\Models\Expedicion;
use Illuminate\Http\Request;

class ExpedicionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expediciones = Expedicion::orderBy('razonsocial', 'ASC')->paginate(15);
        return view('expedicion', compact('expediciones'));

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
    public function show(Expedicion $expedicion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expedicion $expedicion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expedicion $expedicion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expedicion $expedicion)
    {
        //
    }
}
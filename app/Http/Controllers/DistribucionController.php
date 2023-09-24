<?php

namespace App\Http\Controllers;

use App\Models\Distribucion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DistribucionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $distribuciones = Distribucion::orderBy('razonsocial', 'ASC')->paginate(15);
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
        //
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
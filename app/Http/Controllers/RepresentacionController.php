<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Representacion;
use Illuminate\Support\Facades\Auth;

class RepresentacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = Auth::user();

        $representaciones = Representacion::orderBy('razonsocial', 'ASC')->paginate(15);
        // return view('representacion', compact('representaciones', 'user'));
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
        //
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
<?php

namespace App\Http\Controllers;

use App\Models\Molinos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MolinosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $molinos = Molinos::orderBy('razonsocial', 'ASC')->paginate(15);
        return view('molino', compact('molinos'));

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
    public function show(Molinos $molinos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Molinos $molinos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Molinos $molinos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Molinos $molinos)
    {
        //
    }
}
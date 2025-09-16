<?php

namespace App\Http\Controllers;

use App\Models\Plnt;
use Illuminate\Http\Request;

class PlntController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plants = Plnt::all();
        return view('plnts.index', compact('plnts'))
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
    public function show(Plnt $plnt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plnt $plnt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plnt $plnt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plnt $plnt)
    {
        //
    }
}

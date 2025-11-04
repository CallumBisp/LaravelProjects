<?php

namespace App\Http\Controllers;

use App\Models\Charm;
use App\Models\Area;
use Illuminate\Http\Request;

class CharmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $charms = Charm::all();
        return view('charms.index', compact('charms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $areas = Area::all(); //Fetch all areas
        return view('charms.create')->with('areas', $areas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Area $area)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/charms'), $imageName);
        };

        $area->charms()->create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $imageName,
            'area_id' => $area->id
        ]);

        return redirect()->route('areas.show', $area)->with('success', 'Charm added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Charm $charm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Charm $charm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Charm $charm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Charm $charm)
    {
        //
    }
}

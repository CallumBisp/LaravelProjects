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
    public function store(Request $request, Charm $charm)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
            'area' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/charms'), $imageName);
        };

        Charm::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $imageName,
            'area_id' => $request->input('area'),
        ]);

        return redirect()->route('charms.index')->with('success', 'Charm added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Charm $charm)
    {
        //takes the charm and the area associated with it
        $charm = Charm::with('area')->findOrFail($charm->id);
        //  $charm = Charm::with('area')->get(); // eager load area relationship
        //  dd($charm);
        return view('charms.show', compact('charm'));
        // return view('charms.show')->with('charm', $charm);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Charm $charm)
{
    return view('charms.edit', [
        'charm' => $charm,
        'areas' => Area::all(),
    ]);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Charm $charm)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
            'area' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/charms'), $imageName);
        };

        $charm->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $imageName,
            'area_id' => $request->input('area'),
        ]);

        return to_route('charms.show', $charm)->with('Success! Charm updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Charm $charm)
    {
        $charm->delete();
        return to_route('charms.index');
    }
}

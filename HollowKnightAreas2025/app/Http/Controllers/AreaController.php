<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areas = Area::all(); //Fetch all areas
        return view('areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('areas.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    /*A request is given to the store function*/
    public function store(Request $request)
    {
        /* the information gets validated */
        $request->validate([
            'name' => 'required',
            'description' => 'required|max:1000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'connections' => 'required',
            'rooms' => 'required',
        ]);

        #renaming the image file to a valid name

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/areas'), $imageName);
        }

        /* once everything is verified, a new area is created and put into the database */
        Area::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName, //store the image
            'rooms' => $request->rooms,
            'connections' => $request->connections,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return to_route('areas.index')->with('success', 'Area created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Area $area)
    {
        return view('areas.show')->with('area', $area);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Area $area)
    {
        return view('areas.edit')->with('area', $area);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Area $area)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required|max:1000',
            'image'
        ])
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Area $area)
    {
        //
    }
}

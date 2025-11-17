<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AreaController extends Controller
{
    /**
     * Display a listing of the areas.
     */
    public function index()
    {
        $areas = Area::all(); //Fetch all areas
        return view('areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new area.
     */
    public function create()
    {
        return view('areas.create');
    }

    /**
     * Store a newly created area in storage.
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
     * Display the specified area.
     */
    public function show(Area $area)
    {
        $area->load('charms');
        return view('areas.show')->with('area', $area);
    }

    /**
     * Show the form for editing the specified area.
     */
    public function edit(Area $area)
    {
        return view('areas.edit')->with('area', $area);
    }

    /**
     * Update the specified area in storage.
     */
    public function update(Request $request, Area $area)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required|max:1000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'connections' => 'required',
            'rooms' => 'required'
        ]);

        // checking if the submission has an image 
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/areas'), $imageName);
        }

        // updating the area with the new values taken from the "update" request
        $area->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName, //store the image
            'rooms' => $request->rooms,
            'connections' => $request->connections,
            'updated_at' => now()
        ]);

        return to_route('areas.show', $area)->with('success', 'Area updated successfully!');
    }

    /**
     * Remove the specified area from storage.
     */
    public function destroy(Area $area)
    {
        $area->delete();
        return to_route('areas.index');
    }
}

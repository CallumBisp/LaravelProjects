<?php

namespace App\Http\Controllers;

use App\Models\Boss;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BossController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bosses = Boss::with('areas')->get();
        return view('bosses.index', compact('bosses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $areas = Area::all();
        return view('bosses.create')->with('areas', $areas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required|max:1000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'health' => 'required',
            'areas' => 'array',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/bosses'), $imageName);
        }

        /* once everything is verified, a new boss is created and put into the database */
        $boss = Boss::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName, //store the image
            'health' => $request->health,
            'areas' => $request->areas,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        if ($request->has('areas')) {
            $boss->areas()->attach($request->areas);
        }

        return to_route('bosses.index')->with('success','Boss created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Boss $boss)
    {
        $boss->load('areas');
        
        // $boss = $boss->get('areas');
        // dd($boss);
        return view('bosses.show', compact('boss'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Boss $boss)
    {
        $areas = Area::all();
        $areaBosses = $boss->areas->pluck('id')->toArray();
        return view('bosses.edit', compact('boss', 'areas', 'areaBosses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Boss $boss)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required|max:1000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'health' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/areas'), $imageName);
        }

        /* once everything is verified, a new area is created and put into the database */
        $boss->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName, //store the image
            'health' => $request->health,
            'updated_at' => now()
        ]);

        return to_route('bosses.show', $boss)->with('success','Boss updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Boss $boss)
    {
        $boss->areas()->detach();
        $boss->delete();
        return to_route('bosses.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Timekeeper;
use App\Http\Requests\StoreTimekeeperRequest;
use App\Http\Requests\UpdateTimekeeperRequest;

class TimekeeperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('timekeepers.index', [
            'timekeepers' => Timekeeper::all(),
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('timekeepers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTimekeeperRequest $request)
    {
        //
        Timekeeper::create($request->validated());
        return redirect()->route('timekeepers.index')->with('success', 'Timekeeper created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Timekeeper $timekeeper)
    {
        //
        return view('timekeepers.show', compact('timekeeper'));
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Timekeeper $timekeeper)
    {
        //
        return view('timekeepers.edit', compact('timekeeper'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTimekeeperRequest $request, Timekeeper $timekeeper)
    {
        //
        $timekeeper->update($request->validated());
        return redirect()->route('timekeepers.index')->with('success', 'Timekeeper updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Timekeeper $timekeeper)
    {
        //
        Timekeeper::destroy($timekeeper->id);
        return redirect()->route('timekeepers.index')->with('success', 'Timekeeper deleted successfully.');
        
    }
}

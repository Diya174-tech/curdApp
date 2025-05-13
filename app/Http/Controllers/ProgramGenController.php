<?php

namespace App\Http\Controllers;
use App\Models\CenterManagements;
use App\Models\ProgramCreates;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProgramGenController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $centers = CenterManagements::all();  // Get all centers
        return view('program_create.create', compact('centers'));
    }

    // Store the newly created program
    public function store(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'center_id' => 'required|exists:center_managments,center_id',
            'Program_name' => 'required|string|max:255',
        ]);
    
        // Create the new program
       ProgramCreates::create($validated);
    
        // Redirect with success message
        return redirect(to: 'program-masters')->with('success', 'Program created successfully');
    }
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    
}

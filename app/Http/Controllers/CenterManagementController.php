<?php

namespace App\Http\Controllers;

use App\Models\CenterManagements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CenterManagementController extends Controller
{
    public function index()
    {
        $centers = CenterManagements::all(); // fetch all records
        return view('center_managements.index', compact('centers'));
    }
    public function create()
    {
        return view('center_managements.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'center_name' => 'required|string|max:255',
            'center_address' => 'required|string|max:255',
            'center_email' => 'required|email|',
        ]);

         CenterManagements::create($validated);

         return redirect('center-managements')->with('success', 'Center created successfully!');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $center = CenterManagements::findOrFail($id);
        return view('center_managements.edit', compact('center'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'center_name' => 'required|string|max:255',
            'center_address' => 'required|string|max:255',
            'center_email' => 'required|email|max:255',
        ]);

        $center = CenterManagements::findOrFail($id);
        $center->update($request->all());

        return redirect('center-managements')->with('success', 'Center updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $center = CenterManagements::findOrFail($id);
        $center->delete();

        return redirect('center-managements')->with('success', 'Center deleted successfully.');
    }

    public function boot() {
        DB::enableQueryLog();
    }
}

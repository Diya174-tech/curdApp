<?php

namespace App\Http\Controllers;
use App\Models\CenterManagements;
use Illuminate\Support\Facades\DB;
use App\Models\ProgramMasters;
use App\Models\ProgramCreates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; 

class ProgramMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = ProgramMasters::with(['centers', 'progs'])->get();
        return view('program_masters.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        $centers = CenterManagements::all();
        return view('program_masters.create', compact('centers'));

    }

    public function store(Request $request)
    {
       
        $request->validate([
            'center_id' => 'required',
            'create_id' => 'required',
            'program_name' => 'required',
            'number_of_days' => 'required|integer',
            'Program_Fees' => 'required|numeric',
            'CCFRI' => 'required|numeric',
            'ACCB' => 'nullable|numeric',
            'Parent_Fees' => 'required|numeric',
        ]);

        ProgramMasters::create([
            'center_id' => $request->center_id,
            'create_id' => $request->create_id,
            'program_name' => $request->program_name,
            'number_of_days' => $request->number_of_days,
            'Program_Fees' => $request->Program_Fees,
            'CCFRI' => $request->CCFRI,
            'ACCB' => $request->ACCB,
            'Parent_Fees' => $request->Parent_Fees,
        ]);

        return redirect('program-masters')->with('success', 'Program assigned successfully!');
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

        $program = ProgramMasters::findOrFail($id);
        $centers = CenterManagements::all();
        $progs = ProgramCreates::where('center_id', $program->center_id)->get();
        return view('program_masters.edit', compact('program', 'centers', 'progs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'center_id' => 'required|exists:center_managments,center_id',
            'create_id' => 'required',
            'number_of_days' => 'required',
            'Program_Fees' => 'required|numeric',
            'CCFRI' => 'required|numeric',
            'Parent_Fees' => 'required|numeric',
        ]);

        $program = ProgramMasters::findOrFail($id);
        $program->update($request->all());

        return redirect('program-masters')->with('success', 'Program updated successfully.');
    }

    public function getPrograms($center_id)
    {
        $progs = ProgramCreates::where('center_id', $center_id)->pluck('program_name', 'create_id');
        return response()->json($progs);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ProgramMasters::findOrFail($id)->delete();
        return redirect('program-masters')->with('success', 'Program deleted successfully.');
    }
}

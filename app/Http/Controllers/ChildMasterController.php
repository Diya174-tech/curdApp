<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\CenterManagements;
use App\Models\ChildMasters;
use App\Models\ProgramMasters;
use App\Models\ProgramCreates;
use App\Models\FeesMasters;

use Illuminate\Http\Request;

class ChildMasterController extends Controller
{
    public function index()
    {
        $childs = ChildMasters::with(['center', 'program'])->get();
        return view('child_masters.index', compact('childs'));
        
    }
    public function create()
    {
        $centers = CenterManagements::all();
        $programs = ProgramMasters::all();
        return view('child_masters.create',compact('centers','programs'));
    }
    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'center_id' => 'required|exists:center_managments,center_id',
    //         'Program_id' => 'required|exists:program_masters,Program_id',
    //         'CHild_First_Name' => 'required|string|max:255',
    //         'Child_Last_Name' => 'required|string|max:255',
    //         'PArent_First_Name' => 'required|string|max:255',
    //         'Parent_Last_Name' => 'required|string|max:255',
    //         'child_dob' => 'required|date',
    //         'Child_parent_email' => 'required|email',
    //         'Child_parent_mobno' => 'required|digits_between:10,15',
    //         'Child_Institution_number' => 'required|string|max:50',
    //         'child_transit_number' => 'required|string|max:50',
    //         'child_account_number' => 'required|string|max:50',
    //         'adminition_date' => 'required|date',
    //         'end_date' => 'required|date|after_or_equal:adminition_date',
    //         'active_status' => 'required|in:Active,Inactive',
    //         'Registration_Fees_Paid' => 'required|numeric|min:0',
    //         'number_of_days' => 'required|integer|min:1|max:7',
    //     ]);

    //     ChildMasters::create($validated );
    //     return redirect('child-masters')->with('success', 'Child created Successfully');
    // }

    /**
     * Display the specified resource.
     */
    
public function store(Request $request)
{
    $validated = $request->validate([
        'center_id' => 'required|exists:center_managments,center_id',
        'Program_id' => 'required|exists:program_masters,Program_id',
        'CHild_First_Name' => 'required|string|max:255',
        'Child_Last_Name' => 'required|string|max:255',
        'PArent_First_Name' => 'required|string|max:255',
        'Parent_Last_Name' => 'required|string|max:255',
        'child_dob' => 'required|date',
        'Child_parent_email' => 'required|email',
        'Child_parent_mobno' => 'required|digits_between:10,15',
        'Child_Institution_number' => 'required|string|max:50',
        'child_transit_number' => 'required|string|max:50',
        'child_account_number' => 'required|string|max:50',
        'adminition_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:adminition_date',
        'active_status' => 'required|in:Active,Inactive',
        'Registration_Fees_Paid' => 'required|numeric|min:0',
        'number_of_days' => 'required|integer|min:1|max:7',
    ]);

    // Step 1: Create the child record
    $child = ChildMasters::create($validated);

    // Step 2: Fetch program details
    $program = DB::table('program_masters')
        ->where('Program_id', $validated['Program_id'])
        ->where('center_id', $validated['center_id'])
        ->first();

    if (!$program) {
        return back()->with('error', 'Program not found for this center.'); }
        // Step 3: Insert fees_masters record
        FeesMasters::create([
            'center_id' => $validated['center_id'],
            'Program_id' => $validated['Program_id'],
            'child_id' => $child->child_id, 
            'number_of_days' => $validated['number_of_days'],
            'parent_fees' => $program->Parent_Fees,
            'CCFRI' => $program->CCFRI,
            'accb_received' => $program->ACCB,
            'total_fees' => $program->Program_Fees,
            'institution_number' => $validated['Child_Institution_number'],
            'transit_number' => $validated['child_transit_number'],
            'account_number' => $validated['child_account_number'],
        ]);

    return redirect('child-masters')->with('success', 'Child and Fee record created successfully!');
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
        $child = ChildMasters::findOrFail($id);
        $centers = CenterManagements::all();
        $programs = ProgramMasters::all();
        return view('child_masters.edit', compact('child', 'centers', 'programs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $child = ChildMasters::findOrFail($id);
        $validated = $request->validate([
            'center_id' => 'required',
            'Program_id' => 'required',
            'CHild_First_Name' => 'required',
            'Child_Last_Name' => 'required',
            'PArent_First_Name' => 'required',
            'Parent_Last_Name' => 'required',
            'child_dob' => 'required|date',
            'Child_parent_email' => 'required|email',
            'Child_parent_mobno' => 'required',
            'Child_Institution_number' => 'required',
            'child_transit_number' => 'required',
            'child_account_number' => 'required',
            'adminition_date' => 'required|date',
            'end_date' => 'required|date',
            'active_status' => 'required|in:Active,Inactive',
            'Registration_Fees_Paid' => 'required|numeric',
            'number_of_days' => 'required'
        ]);

        $child = ChildMasters::findOrFail($id);
        $child->update($request->all());

        return redirect('child-masters')->with('success', 'Fee record updated successfully.');
    }

    public function getPrograms($centerId)
    {
        $programs = ProgramMasters::where('center_id', $centerId)->pluck('program_name', 'Program_id');
        return response()->json($programs);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $child = ChildMasters::findOrFail($id);
        $child->delete();
        return redirect('child-masters')->with('success', 'Child deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\FeesMasters;
use Illuminate\Http\Request;
use App\Models\CenterManagements;
use App\Models\ProgramMasters;
use App\Models\ProgramCreates;
use Illuminate\Support\Facades\DB;
use App\Models\ChildMasters;

class FeesMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $fees = FeesMasters::with(['center', 'program'])->get();
        return view('fees_masters.index', compact('fees'));
    }
    //joined data 
    // public function index()
    // {
    //     $fees = DB::table('child_masters as ch')
    //         ->join('center_managments as cm', 'ch.center_id', '=', 'cm.center_id')
    //         ->join('program_masters as pm', function ($join) {
    //             $join->on('ch.Program_id', '=', 'pm.Program_id')
    //                  ->on('ch.center_id', '=', 'pm.center_id');
    //         })
    //         ->select(
    //             'pm.Program_id',
    //             'cm.center_name as Center_Name',
    //             'pm.program_name as Program_Name',
    //             DB::raw("CONCAT(ch.CHild_First_Name, ' ', ch.Child_Last_Name) as Child_Name"),
    //             DB::raw("CONCAT(ch.PArent_First_Name, ' ', ch.Parent_Last_Name) as Parent_Name"),
    //             'ch.child_dob as Date_of_Birth',
    //             'ch.number_of_days as Number_of_Days',
    //             'ch.Child_Institution_number as Institution_Number',
    //             'ch.child_transit_number as Transit_Number',
    //             'ch.child_account_number as Account_Number',
    //             'pm.ACCB as ACCB',
    //             'pm.Program_Fees as Total_Fees',
    //             'pm.CCFRI as CCFRI',
    //             'pm.ACCB as ACCB_Received',
    //             'pm.Parent_Fees as Parent_Fees'
    //         )
    //         ->get();

    //     return view('fees_masters.index', compact('fees'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $centers = CenterManagements::all();
        $programs = ProgramMasters::all();
        return view('fees_masters.create', compact('centers', 'programs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'center_id' => 'required|exists:center_managments,center_id',
            'parent_fees' => 'required',
            'CCFRI' => 'required|numeric',
            'fees_amount' => 'required|numeric|min:0',
            'number_of_days' => 'required|numeric|min:1|max:7'

        ]);

        FeesMasters::create($validated);
        return redirect('fees-masters')->with('success', 'Fees record created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.x   `
     */
    public function edit(string $id)
    {
        $fee = FeesMasters::with('child')->findOrFail($id);
        $centers = CenterManagements::all();
        $programs = ProgramMasters::all();
        return view('fees_masters.edit', compact('fee', 'centers', 'programs'));
    }

    // public function update(Request $request, string $id)
    // {
    //     $fees = FeesMasters::findOrFail($id);
    //     $validated = $request->validate([
    //         'center_id' => 'required',
    //         'Program_id' => 'required',
    //         'child_id ' => 'required',
    //         'parent_fees' => 'required',
    //         'CCFRI' => 'required',
    //         'institution_number' => 'required',
    //         'transit_number' => 'required',
    //         'account_number' => 'required',
    //         'total_fees' => 'required',
    //         'accb_received' => 'required'

    //     ]);

    //     $fees= FeesMasters::findOrFail($id);
    //     $fees>update($request->all());

    //     return redirect('fees-masters')->with('success', 'Fee record updated successfully.');
    // }
    public function update(Request $request, $id)
{
    $request->validate([
        'center_id' => 'required',
        'Program_id' => 'required',
        'number_of_days' => 'required|integer',
        'total_fees' => 'required|numeric',
        'CCFRI' => 'required|numeric',
        'parent_fees' => 'required|numeric',
        'institution_number' => 'required',
        'transit_number' => 'required',
        'account_number' => 'required',

        // child fields
        'CHild_First_Name' => 'required|string',
        'Child_Last_Name' => 'required|string',
        'PArent_First_Name' => 'required|string',
        'Parent_Last_Name' => 'required|string',
        'child_dob' => 'required|date',
    ]);

    // Update Fees
    $fee = FeesMasters::findOrFail($id);
    $fee->center_id = $request->center_id;
    $fee->Program_id = $request->Program_id;
    $fee->number_of_days = $request->number_of_days;
    $fee->total_fees = $request->total_fees;
    $fee->CCFRI = $request->CCFRI;
    $fee->parent_fees = $request->parent_fees;
    $fee->institution_number = $request->institution_number;
    $fee->transit_number = $request->transit_number;
    $fee->account_number = $request->account_number;
    $fee->save();

    // Update child
    if ($fee->child) {
        $child = $fee->child;
        $child->CHild_First_Name = $request->CHild_First_Name;
        $child->Child_Last_Name = $request->Child_Last_Name;
        $child->PArent_First_Name = $request->PArent_First_Name;
        $child->Parent_Last_Name = $request->Parent_Last_Name;
        $child->child_dob = $request->child_dob;
        $child->Child_Institution_number = $request->institution_number;
        $child->number_of_days = $request->number_of_days;
        $child->save();
    }

    return redirect()->route('fees-masters.index')->with('success', 'Fee and Child information updated successfully.');
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
        FeesMasters::destroy($id);
        return redirect('fees-masters')->with('success', 'Fee record deleted successfully.');
    }

    public function updateAccb(Request $request, $id)
    {
        $validated = $request->validate([
            'accb_received' => 'required|numeric',
        ]);

        $fee = FeesMasters::find($id);
        if (!$fee) {
            return response()->json(['success' => false, 'message' => 'Fee record not found.']);
        }

        $fee->accb_received = $validated['accb_received'];
        $fee->save();

        return response()->json(['success' => true, 'message' => 'ACCB value updated successfully.']);
    }

}

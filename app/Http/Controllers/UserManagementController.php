<?php

namespace App\Http\Controllers;

use App\Models\UserManagements;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = UserManagements::all();
        return view('user_managements.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user_managements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_name' => 'required|string|max:255',
            'user_type' => 'required',
            'user_status' => 'required',
        ]);
        UserManagements::create($request->all());

        return redirect('user-managements')->with('success', 'User created successfully.');
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
        $user = UserManagements::findOrFail($id);
        return view('user_managements.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'user_type' => 'required',
            'user_status' => 'required',
        ]);

        $user = UserManagements::findOrFail($id);
        $user->update($request->all());

        return redirect('user-managements')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = UserManagements::findOrFail($id);
        $user->delete();

        return redirect('user-managements')->with('success', 'User deleted successfully.');
    }
}

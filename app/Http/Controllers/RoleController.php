<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public function index(){
        $user = User::all(); // Fetch all users from the 'users' table
        return view('role.role', compact('user')); 
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('role.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'role' => 'required|in:admin,user',
        ]);
        
        // Update the user's information
        $user->update($request->only('name', 'email', 'role'));

        return redirect()->route('role.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->route('role.role')->with('success', 'User deleted successfully.');
       
    }
    
}
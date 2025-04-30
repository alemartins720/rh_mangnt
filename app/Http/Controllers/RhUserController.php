<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RhUserController extends Controller
{
    public function index()
    {
        Auth::user()->can('admin') ?: abort(403, 'You are not authorized to access this page!');

        $colaborators = User::where('role', 'rh')->get();

        return view('colaborators.rh-users', compact('colaborators'));
    }

    public function newColaborator()
    {
        Auth::user()->can('admin') ?: abort(403, 'You are not authorized to access this page!');

        // Get all departments
        $departments = Department::all();

        return view('colaborators.add-rh-colaborator' , compact('departments'));
    }

    public function createRhColaborator(Request $request)
    {
        Auth::user()->can('admin') ?: abort(403, 'You are not authorized to access this page!');

        // Form validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'select_department' => 'required|exists:departments,id'
        ]);

        // Create new RH user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 'rh';
        $user->department_id = $request->select_department;
        $user->permissions = '["rh"]';
        $user->save();

        return redirect()->route('colaborators.rh-users')->with('success' , 'Colaborator created successfully!');
    }
}

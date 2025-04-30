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
}

<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DepartmentController extends Controller
{
    public function index()
    {
        Auth::user()->can('admin') ?: abort(403 ,'You are not authorized to access this page!');

        $departments = Department::all();

        return view('department.departments' , compact('departments'));

    }
}

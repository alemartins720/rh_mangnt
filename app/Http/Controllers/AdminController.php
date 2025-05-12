<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function home()
    {
        Auth::user()->can('admin') ?: abort(403 , 'You are not authorized to access this page');

        // Display admin home page
        return view('home');
    }
}

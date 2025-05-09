<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RhManagementController extends Controller
{

    public function home()
    {
        Auth::user()->can('rh') ?: abort(403, 'You are not authorized to access thsi page!');

        // Get all colaborators that are not role admin nor role rh
        $colaborators = User::with('detail', 'department')
            ->where('role', 'colaborator')
            ->withTrashed()
            ->get();

        return view('colaborators.colaborators' , compact('colaborators'));
    }
}

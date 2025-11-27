<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        // sesuaikan dengan nama role di DB-mu
        if ($user->role === 'produsen') {
            return view('dashboard-produsen', compact('user'));
        }

        // default: pelanggan
        return view('dashboard-pelanggan', compact('user'));
    }
}

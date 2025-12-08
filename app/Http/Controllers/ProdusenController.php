<?php

namespace App\Http\Controllers;

use App\Models\User;

class ProdusenController extends Controller
{
    public function show(User $user)
    {
        return view('viewprodusen', [
            'produsen' => $user
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserAccountController extends Controller
{
    public function create()
    {
        return inertia('UserAccount/Create');
    }

    public function store(Request $request)
    {

        User::create($request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed|min:8'
        ]));

        $request->session()->regenerateToken();

        return redirect()->route('listing.index')->with([
            'success' => 'User was created'
        ]);
    }
}

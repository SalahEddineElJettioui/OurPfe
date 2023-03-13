<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
{
    public function create()
    {
        return inertia('UserAccount/Create');
    }

    public function store(Request $request)
    {

        $user = User::make($request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed|min:8'
        ]));

        $user->password = Hash::make($user->password);

        $user->save();

        Auth::login($user);

        $request->session()->regenerateToken();

        return redirect()->route('listing.index')->with([
            'success' => 'User was created'
        ]);
    }
}

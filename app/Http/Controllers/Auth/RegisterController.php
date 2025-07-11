<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view ('auth.register', [
            'title' => 'Register Page'
        ]);
    }

    public function store(Request $request)
    {
        
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        $user = User::create([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => bcrypt($validateData['password'])
        ]);

        Auth::login($user);

        return redirect('/')->with('success', 'Registration successful! Welcome, ' . $user->name);
    }
}
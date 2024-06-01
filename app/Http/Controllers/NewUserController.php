<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class NewUserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.new_register');
    }

    public function register(Request $request)
    {
        Log::info('Register request received', $request->all());

        $validatedData = $request->validate([
            'name' => 'required',
            'login' => 'required|unique:new_users',
            'email' => 'required|email|unique:new_users',
            'password' => 'required|confirmed',
        ]);

        $newUser = NewUser::create([
            'name' => $validatedData['name'],
            'login' => $validatedData['login'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        Auth::login($newUser);

        return redirect()->route('new_users.success')->with('success', 'User registered successfully.');
    }

    public function registrationSuccess()
    {
        return view('auth.registration_success');
    }
}


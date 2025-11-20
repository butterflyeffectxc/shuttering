<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function loginView()
    {
        return view('users.login');
    }
    function registerView()
    {
        return view('users.register');
    }
    function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $roles = Auth::user()->role;
            if ($roles == '1') {
                return redirect('/admin');
            } elseif ($roles == '2') {
                return redirect('/admin');
            } elseif ($roles == '3') {
                return redirect('/homepage');
            } else {
                return redirect()->intended('/landing-page');
            }
        }

        return back()->withErrors([
            'email' => 'Username & Password invalid.',
        ])->onlyInput('email');
    }
    function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'role' => 'required',
        ]);

        // Hash password
        $data['password'] = Hash::make($request->password);

        User::create($data);
        return redirect('/login')->with('success', 'Register berhasil!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Photographer;
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
                return redirect('/admins/bookings');
            } elseif ($roles == '2') {
                return redirect('/photographers/profile');
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
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out.');
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
        return redirect('/login')->with('success', 'Register successful!');
    }
    function registerViewPhotographer()
    {
        return view('users.register-photographer');
    }
    function registerPhotographer(Request $request)
    {
        $validated = $request->validate([
            // USER TABLE
            'name' => 'required|max:255',
            'phone' => 'required|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'role' => 'required', // 1 = customer, 2 = photographer (sesuaikan)

            // PHOTOGRAPHER TABLE
            'location' => 'required|max:255',
            'profile_photo' => 'nullable|max:255',
            'start_rate' => 'required|numeric',
            'description' => 'nullable|string',
            'status' => 'required|in:1,2',
        ]);
        // 1️⃣ Insert ke tabel USERS
        $user = User::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        // 2️⃣ Insert ke tabel PHOTOGRAPHERS
        Photographer::create([
            'user_id' => $user->id,
            'location' => $validated['location'],
            'profile_photo' => $validated['profile_photo'] ?? "",
            'start_rate' => $validated['start_rate'],
            'description' => $validated['description'] ?? "",
            'status' => $validated['status'],
            'verified_by_admin' => '1', // default
        ]);
        // dd($data);
        return redirect('/login')->with('success', 'Registration successful!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Photographer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PhotographerController extends Controller
{
    function registerView()
    {
        return view('users.register-photographer');
    }
    public function registerPhotographer(Request $request)
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

    function showAll()
    {
        $photographers = Photographer::all();
        return view('admins.photographers.index', compact('photographers'));
    }
    function showDetail(Photographer $photographer)
    {
        return view('admins.photographers.detail', compact('photographer'));
    }
}

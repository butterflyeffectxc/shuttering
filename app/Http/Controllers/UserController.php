<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', 3)->get();
        return view('admins.users.index', compact('users'));
    }

    public function showProfile()
    {
        if (!auth()->check()) {
            abort(403);
        }

        $user = User::with([
            'wishlists.photographer.photoTypes',
            'wishlists.photographer.user'
        ])->findOrFail(auth()->id());

        return view('users.profile-user.profile', compact('user'));
        // $userId = auth()->id();
        // // user harus login
        // if (!auth()->check()) {
        //     abort(403);
        // }
        // // user cuma boleh buka profile sendiri
        // if (auth()->id() != $userId) {
        //     abort(403, 'Unauthorized access');
        // }

        // $likedPhotographers = User::where('id', $userId)->with(['photographer', 'wishlists', 'user'])->firstOrFail();
        // // dd($user);
        // return view('users.profile-user.profile', compact('likedPhotographers'));
    }
    // public function updateProfile()
    // {
    //     $userId = auth()->id();
    //     $user = User::where('id', $userId)->firstOrFail();
    //     return view('users.profile-user.edit', compact('user'));
    // }
    public function editProfile(Request $request, User $user)
    {
        // $user = auth()->user();
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'current_password' => 'required_with:new_password',
            'new_password' => 'nullable|min:8|confirmed',
        ]);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        // 🔐 CEK PASSWORD LAMA
        if ($request->filled('new_password')) {

            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors([
                    'current_password' => 'Current password is incorrect'
                ])->withInput();
            }

            $user->update([
                'password' => Hash::make($request->new_password),
            ]);
        }

        return back()->with('success', 'Profile updated successfully');
    }
}

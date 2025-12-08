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
        $photographers = Photographer::with(['user', 'photoTypes'])->where('status', 2)->get();
        return view('admins.photographers.index', compact('photographers'));
    }
    function showAllUnverify()
    {
        $photographers = Photographer::with(['user', 'photoTypes'])->where('status', 1)->get();
        return view('admins.photographers.verify', compact('photographers'));
    }
    function updatePhotographerVerify(Request $request, Photographer $photographer) {
         $request->validate([
            'status' => 'required'
        ]);

        // $userId = auth()->id();
        // $photographer = Photographer::where('user_id', $userId)->first();

        // if ($booking->photographer_id !== $photographer->id) {
        //     abort(403, "You cannot modify this booking");
        // }

        $photographer->status = $request->status;
        $photographer->save();

        return redirect()->back()->with('success', 'Booking status updated successfully.');
    }
    function showDetail(Photographer $photographer)
    {
        return view('admins.photographers.detail', compact('photographer'));
    }

    public function updateProfile()
    {
        $userId = auth()->id();

        // eager load to avoid N+1
        $photographer = Photographer::with(['user', 'photoTypes', 'catalogues'])
            ->where('user_id', $userId)
            ->firstOrFail();
        // ambil semua jenis foto
        $photoTypes = \App\Models\PhotoType::all();
        return view('photographers.profile-photographers.edit', compact('photographer', 'photoTypes'));
    }
    public function editProfile(Request $request, Photographer $photographer)
    {
        $validated = $request->validate([
            'name'          => 'required|max:255',
            'phone'         => 'required|max:20',
            'email'         => 'required|email',
            'location'      => 'required|max:255',
            'start_rate'    => 'required|numeric',
            'description'   => 'nullable|string',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'photo_type'    => 'nullable|array|max:2',
            'photo_type.*'  => 'exists:photo_types,id'
        ]);

        // Update USER table (name, phone, email)
        $photographer->user->update([
            'name'  => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
        ]);

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {

            // delete old
            if ($photographer->profile_photo && file_exists(public_path('profile_photos/' . $photographer->profile_photo))) {
                unlink(public_path('profile_photos/' . $photographer->profile_photo));
            }

            // store new
            $file = $request->file('profile_photo');
            $newFileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('profile_photos'), $newFileName);

            $photographer->profile_photo = $newFileName;
        }

        // Update photographer table
        $photographer->update([
            'location'    => $validated['location'],
            'start_rate'  => $validated['start_rate'],
            'description' => $validated['description'] ?? $photographer->description,
        ]);

        // Update photo type (many to many)
        if ($request->has('photo_type')) {
            $photographer->photoTypes()->sync($validated['photo_type']);
        } else {
            // kalau kosong, hapus relasi
            $photographer->photoTypes()->sync([]);
        }

        return back()->with('success', 'Profile berhasil diperbarui!');
    }

}

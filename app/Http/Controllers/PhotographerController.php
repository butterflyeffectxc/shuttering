<?php

namespace App\Http\Controllers;

use App\Models\Photographer;
use App\Models\PhotoType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PhotographerController extends Controller
{
    function showAll()
    {
        $photographers = Photographer::with(['user', 'photoTypes'])->where('verified_by_admin', 2)->get();
        return view('admins.photographers.index', compact('photographers'));
    }
    function showAllUnverify()
    {
        $photographers = Photographer::with(['user', 'photoTypes'])->where('verified_by_admin', 1)->get();
        return view('admins.photographers.verify', compact('photographers'));
    }
    function showAllSuspended()
    {
        $photographers = Photographer::with(['user', 'photoTypes'])->where('verified_by_admin', 3)->get();
        return view('admins.photographers.suspended', compact('photographers'));
    }
    function updatePhotographerVerify(Request $request, Photographer $photographer)
    {
        $request->validate([
            'verified_by_admin' => 'required'
        ]);
        $photographer->verified_by_admin = $request->verified_by_admin;
        $photographer->save();

        return redirect()->back()->with('success', 'Photographer status updated successfully.');
    }
    function suspendPhotographer(Request $request, Photographer $photographer)
    {
        $request->validate([
            'verified_by_admin' => 'required'
        ]);
        $photographer->verified_by_admin = $request->verified_by_admin;
        $photographer->save();

        return redirect()->back()->with('success', 'Photographer status updated successfully.');
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
        $photoTypes = PhotoType::all();
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
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:3548',
            'status' => 'required|in:1,2',
            'photo_type' => 'required|array|min:1|max:2',
            'photo_type.*' => 'exists:photo_types,id',
        ], [
            'photo_type.required' => 'Choose minimal 1 photo type',
            'photo_type.min' => 'Choose minimal 1 photo type',
            'photo_type.max' => 'Choose maximal 2 photo type',
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
            'status' => $request->status,
        ]);

        // Update photo type (many to many)
        if ($request->has('photo_type')) {
            $photographer->photoTypes()->sync($validated['photo_type']);
        } else {
            // kalau kosong, hapus relasi
            $photographer->photoTypes()->sync([]);
        }

        return back()->with('success', 'Profile successfully changed!');
    }
    public function showCatalogue(Photographer $photographer)
    {
        $catalogues = $photographer->catalogues()->latest()->get();

        return view('admins.photographers.catalogue', compact('catalogues', 'photographer'));
    }
}

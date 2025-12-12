<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use App\Models\Photographer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatalogueController extends Controller
{
    public function showPerPhotographer()
    {
        // id user yang login
        $userId = auth()->id();
        // cari photographer berdasarkan user_id
        $photographer = Photographer::where('id', $userId)->first();

        if (!$photographer) {
            abort(403, "Access denied");
        }
        // ambil booking sesuai id photographer
        $catalogues = Catalogue::with(['photographer'])->where('photographer_id', $photographer->id)->orderBy('id', 'desc')->get();
        return view('photographers.catalogues.index', compact('catalogues'));
    }
    public function store(Request $request)
{
    // Validasi input: harus ada file dan berbentuk array
    $request->validate([
        'photo.*' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Ambil user yang login
    $user = Auth::user();

    // Ambil photographer_id dari user
    $photographer = Photographer::where('user_id', $user->id)->first();

    if (!$photographer) {
        return back()->with('error', 'Hanya fotografer yang dapat mengupload katalog.');
    }

    $photographerId = $photographer->id;

    // Loop semua file foto
    if ($request->hasFile('photo')) {
        foreach ($request->file('photo') as $image) {
            // Nama file unik
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            // Simpan ke storage/public/catalogues
            $image->storeAs('catalogues', $filename, 'public');
            // Insert ke tabel catalogues
            Catalogue::create([
                'photographer_id' => $photographerId,
                'photo' => $filename,
                'status_approve' => 'pending'
            ]);
        }
    }

    return back()->with('success', 'Foto katalog berhasil diupload.');
}
//   public function store(Request $request, Booking $booking)
//     {
//         dd($request->request());
//         $request->validate([
//             'booking_id' => 'required|integer',
//             'photographer_id' => 'required|integer',
//             'photo.*' => 'required|image|mimes:jpg,jpeg,png,webp|max:8192'
//         ]);

//         if ($request->hasFile('photo')) {
//             foreach ($request->file('photo') as $file) {

//                 $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
//                 $file->move(public_path('photo_result'), $filename);

//                 PhotoResult::create([
//                     'booking_id' => $request->booking_id,
//                     'photographer_id' => $request->photographer_id,
//                     'photo' => $filename,
//                     'status_approve' => '1', // pending
//                 ]);
//             }
//         }

//         return back()->with('success', 'Photos uploaded successfully!');
//     }
}

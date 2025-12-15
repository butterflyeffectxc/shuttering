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
        $photographer = Photographer::where('user_id', Auth::id())->firstOrFail();

        $catalogues = $photographer->catalogues()->latest()->get();

        return view('photographers.profile-photographers.catalogue', compact('catalogues', 'photographer'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|array',
            'photo.*' => 'image|mimes:jpg,jpeg,png|max:8192',
        ]);

        $photographer = Photographer::where('user_id', Auth::id())->first();

        if (!$photographer) {
            return back()->with('error', 'Unauthorized.');
        }

        // hitung jumlah foto yang SUDAH ADA
        $existingCount = $photographer->catalogues()->count();

        // hitung jumlah foto yang AKAN diupload
        $uploadCount = count($request->file('photo'));

        // VALIDASI TOTAL
        if ($existingCount + $uploadCount > 10) {
            return back()->with(
                'error',
                "You already have {$existingCount} photos. You can upload maximum " . (10 - $existingCount) . " more photos."
            );
        }

        foreach ($request->file('photo') as $image) {
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // simpan ke public/catalogue
            $image->move(public_path('catalogue'), $filename);

            Catalogue::create([
                'photographer_id' => $photographer->id,
                'photo' => $filename,
            ]);
        }

        return back()->with('success', 'Catalogue uploaded successfully.');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'photo.*' => 'required|image|mimes:jpg,jpeg,png,webp|max:8192',
    //     ]);

    //     $user = Auth::user();

    //     $photographer = Photographer::where('user_id', $user->id)->first();
    //     if (!$photographer) {
    //         return back()->with('error', 'Hanya fotografer yang dapat mengupload katalog.');
    //     }

    //     // Cek limit maksimal 10 foto
    //     if ($photographer->catalogues()->count() >= 10) {
    //         return back()->with('error', 'Maximum 10 catalogue photos allowed.');
    //     }

    //     if ($request->hasFile('photo')) {
    //         foreach ($request->file('photo') as $image) {

    //             // Stop jika sudah 10
    //             if ($photographer->catalogues()->count() >= 10) {
    //                 break;
    //             }

    //             $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

    //             // ⬇️ SIMPAN LANGSUNG KE PUBLIC
    //             $image->move(public_path('catalogue'), $filename);

    //             Catalogue::create([
    //                 'photographer_id' => $photographer->id,
    //                 'photo' => $filename,
    //             ]);
    //         }
    //     }

    //     return back()->with('success', 'Catalogue photos uploaded successfully.');
    // }
    public function destroy(Catalogue $catalogue)
    {
        // Ambil photographer dari user yang login
        $photographer = Photographer::where('user_id', Auth::id())->first();

        if (!$photographer) {
            abort(403, 'Unauthorized');
        }
        // Pastikan catalogue milik photographer yang login
        if ($catalogue->photographer_id != $photographer->id) {
            abort(403, 'You are not allowed to delete this photo.');
        }

        // Hapus file dari folder public/catalogue
        $path = public_path('catalogue/' . $catalogue->photo);
        if (file_exists($path)) {
            unlink($path);
        }

        // Soft delete data catalogue
        $catalogue->delete();

        return back()->with('success', 'Catalogue photo deleted successfully.');
    }

    // public function store(Request $request)
    // {
    //     // Validasi input: harus ada file dan berbentuk array
    //     $request->validate([
    //         'photo.*' => 'required|image|mimes:jpg,jpeg,png|max:8192',
    //     ]);

    //     // Ambil user yang login
    //     $user = Auth::user();

    //     // Ambil photographer_id dari user
    //     $photographer = Photographer::where('user_id', $user->id)->first();

    //     if (!$photographer) {
    //         return back()->with('error', 'Hanya fotografer yang dapat mengupload katalog.');
    //     }

    //     $photographerId = $photographer->id;

    //     // Loop semua file foto
    //     if ($request->hasFile('photo')) {
    //         foreach ($request->file('photo') as $image) {
    //             // Nama file unik
    //             $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
    //             // Simpan ke storage/public/catalogues
    //             $image->storeAs('catalogues', $filename, 'public');
    //             // Insert ke tabel catalogues
    //             Catalogue::create([
    //                 'photographer_id' => $photographerId,
    //                 'photo' => $filename,
    //             ]);
    //         }
    //     }

    //     return back()->with('success', 'Foto katalog berhasil diupload.');
    // }
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

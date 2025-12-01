<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Photographer;
use App\Models\PhotoResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhotoResultController extends Controller
{
    public function store(Request $request, Booking $booking)
    {
        $request->validate([
            'photos.*' => 'required|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        // Validasi photographer
        $photographer = Photographer::where('user_id', Auth::id())->first();

        if ($photographer->id != $booking->photographer_id) {
            abort(403, 'Anda tidak berhak upload ke booking ini.');
        }

        // Simpan foto
        foreach ($request->file('photos') as $photo) {

            $filename = time() . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();

            // storage/app/public/photo_results
            $photo->storeAs('photo_results', $filename, 'public');

            PhotoResult::create([
                'booking_id' => $booking->id,
                'photographer_id' => $photographer->id,
                'photo' => $filename,
                'status_approve' => 'pending',
            ]);
        }

        return back()->with('success', 'Hasil foto berhasil diupload.');
    }
}

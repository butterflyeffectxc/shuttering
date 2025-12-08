<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Photographer;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function showFormUser(Booking $booking)
    {
        // Pastikan booking milik user
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        // Cek jika review sudah ada
        if ($booking->review) {
            return back()->with('error', 'Anda sudah memberikan review.');
        }

        return view('reviews.user_form', compact('booking'));
    }

    public function store(Request $request, Booking $booking)
    {
        // Booking harus milik user
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        if ($booking->review) {
            return back()->with('error', 'Review untuk booking ini sudah ada.');
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'note' => 'nullable|string'
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'booking_id' => $booking->id,
            'rating' => $request->rating,
            'note' => $request->note,
        ]);

        return redirect()->route('user.bookings')->with('success', 'Review berhasil dikirim.');
    }
    public function showBookingDetail(Booking $booking)
    {
        $userId = auth()->id();

        // Ambil photographer yang login
        $photographer = Photographer::where('user_id', $userId)->first();

        if (!$photographer) {
            abort(403, "Access denied");
        }

        // Pastikan booking ini memang milik fotografer tersebut
        if ($booking->photographer_id !== $photographer->id) {
            abort(403, "This booking does not belong to you");
        }

        // Load semua relasi yang dibutuhkan
        $booking->load([
            'user',
            'review.user',
            'photographer.user',
            'photoType',
            'photoResults'
        ]);
        // dd($booking->review);
        return view('photographers.bookings.detail', compact('booking'));
    }
}

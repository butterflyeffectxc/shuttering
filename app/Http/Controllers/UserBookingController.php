<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Photographer;
use App\Models\User;
use Illuminate\Http\Request;

class UserBookingController extends Controller
{
    public function showForm(Photographer $photographer)
    {
        $photoTypes = $photographer->photoTypes;
        return view('users.bookings.form', compact('photographer', 'photoTypes'));
    }
    public function fillForm(Request $request, Photographer $photographer, Booking $booking)
    {
        $userId = auth()->id();
        $validated = $request->validate([
            'session_date' => 'required|date',
            'session_duration' => 'required',
            'session_location' => 'required|string',
            'photo_type_id' => 'required|string',
            'notes' => 'nullable|string',
            'total_price' => 'required',
        ]);
        $booking = Booking::create([
            'user_id' => $userId,
            'photographer_id' => $photographer->id,
            'session_date' => $validated['session_date'],
            'session_duration' => $validated['session_duration'],
            'session_location' => $validated['session_location'],
            'photo_type_id' => $validated['photo_type_id'],
            'notes' => $validated['notes'] ?? null,
            'total_price' => $validated['total_price'],
            'status' => 'pending',
        ]);
        // dd($booking);
        return redirect()->to('user/booking')->with('success', 'Booking berhasil dibuat!');
    }
    public function showBooking()
    {
        $userId = auth()->id();
        $customer = User::where('id', $userId)->first();

        if (!$customer) {
            abort(403, "Access denied");
        }
        // dd($userId);
        $bookings = Booking::where('user_id', $userId)->get();
        return view('users.bookings.list', compact('bookings'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Photographer;
use App\Models\User;
use Carbon\Carbon;
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
        return redirect()->to('users/booking')->with('success', 'Booking made successfully!');
    }
    public function showBooking()
    {
        $userId = auth()->id();

        // eager load to avoid N+1
        $bookings = Booking::with(['photographer.user', 'photoType', 'review'])
            ->where('user_id', $userId)
            ->orderByDesc('created_at')
            ->get();
        // Format dates if you want here (optional)
        // We'll also keep raw values so blade/JS can use either
        $bookings->transform(function ($b) {
            // example: format session_date (if stored as date or datetime)
            if ($b->session_date) {
                try {
                    $b->formatted_session_date = Carbon::parse($b->session_date)->translatedFormat('l, F j, Y');
                    // combine times if you store duration/time differently
                } catch (\Exception $e) {
                    $b->formatted_session_date = $b->session_date;
                }
            } else {
                $b->formatted_session_date = '-';
            }

            return $b;
        });
        // dd($bookings);
        return view('users.bookings.list', compact('bookings'));
    }
    public function cancelBooking(Request $request, Booking $booking)
    {
        // aturan H-1: tidak bisa cancel
        if ($request->status == 'canceled') {
            $sessionDate = Carbon::parse($booking->session_date);
            $now = Carbon::now();

            // jika hari ini >= H-1
            if ($now->diffInDays($sessionDate, false) <= 2) {
                return redirect()->back()->with(
                    'error',
                    'Booking cannot be canceled less than 1 day before the session.'
                );
            }
        }
        $booking->update([
            'status' => 'canceled'
        ]);
        return redirect()->to('users/booking')->with('success', 'Booking successfully canceled!');
    }
}

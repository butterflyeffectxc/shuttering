<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Photographer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function showAll()
    {
        $bookings = Booking::with(['user', 'photographer', 'photoType'])->orderBy('id', 'desc')->get();
        return view('admins.bookings.index', compact('bookings'));
    }

    public function showDetail(Booking $booking)
    {
        return view('admins.bookings.detail', compact('booking'));
    }

    public function showPending(Booking $booking)
    {
        // id user yang login
        $userId = auth()->id();
        // cari photographer berdasarkan user_id
        $photographer = Photographer::where('user_id', $userId)->first();

        if (!$photographer) {
            abort(403, "Access denied");
        }
        // ambil booking sesuai id photographer
        $bookings = Booking::with(['user', 'photoType'])
            ->where('photographer_id', $photographer->id)->where('status', 'pending')
            ->orderBy('id', 'desc')
            ->get();

        return view('photographers.bookings.index', compact('bookings'));
    }
    public function showAlreadyProcessed(Booking $booking)
    {
        // id user yang login
        $userId = auth()->id();
        // cari photographer berdasarkan user_id
        $photographer = Photographer::where('user_id', $userId)->first();

        if (!$photographer) {
            abort(403, "Access denied");
        }
        // ambil booking sesuai id photographer
        $bookings = Booking::with(['user', 'photoType'])
            ->where('photographer_id', $photographer->id)->where('status', 'confirmed')
            ->orderBy('id', 'desc')
            ->get();

        return view('photographers.bookings.confirm', compact('bookings'));
    }
    public function showAlreadyCanceled(Booking $booking)
    {
        // id user yang login
        $userId = auth()->id();
        // cari photographer berdasarkan user_id
        $photographer = Photographer::where('user_id', $userId)->first();

        if (!$photographer) {
            abort(403, "Access denied");
        }
        // ambil booking sesuai id photographer
        $bookings = Booking::with(['user', 'photoType'])
            ->where('photographer_id', $photographer->id)->where('status', 'canceled')
            ->orderBy('id', 'desc')
            ->get();

        return view('photographers.bookings.canceled', compact('bookings'));
    }
    public function showPerPhotographerDetail(Booking $booking)
    {
        $userId = auth()->id();
        $photographer = Photographer::where('user_id', $userId)->first();

        // keamanan: jangan sampai photographer lain buka booking yang bukan miliknya
        if ($booking->photographer_id !== $photographer->id) {
            abort(403, "You are not allowed to view this booking");
        }

        return view('photographers.bookings.detail', compact('booking'));
    }

    public function updateConfirmStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:confirmed,canceled,paid'
        ]);

        $userId = auth()->id();
        $photographer = Photographer::where('user_id', $userId)->first();

        // keamanan
        if (!$photographer || $booking->photographer_id !== $photographer->id) {
            abort(403, "You cannot modify this booking");
        }

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

        $booking->status = $request->status;
        $booking->save();

        return redirect()->back()->with('success', 'Booking status updated successfully.');
    }

    // public function updateConfirmStatus(Request $request, Booking $booking)
    // {
    //     $request->validate([
    //         'status' => 'required|in:confirmed,canceled,paid'
    //     ]);

    //     $userId = auth()->id();
    //     $photographer = Photographer::where('user_id', $userId)->first();

    //     // keamanan
    //     if ($booking->photographer_id !== $photographer->id) {
    //         abort(403, "You cannot modify this booking");
    //     }

    //     $booking->status = $request->status;
    //     $booking->save();

    //     return redirect()->back()->with('success', 'Booking status updated successfully.');
    // }
    public function showToUpload(Booking $booking)
    {
        // id user yang login
        $userId = auth()->id();
        // cari photographer berdasarkan user_id
        $photographer = Photographer::where('user_id', $userId)->first();

        if (!$photographer) {
            abort(403, "Access denied");
        }
        // ambil booking sesuai id photographer
        $bookings = Booking::with(['user', 'photoType'])
            ->where('photographer_id', $photographer->id)->where('status', 'paid')
            ->orderBy('id', 'desc')
            ->get();

        return view('photographers.bookings.upload', compact('bookings'));
    }
    public function uploadImages(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|integer',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        foreach ($request->file('images') as $img) {
            $filename = time() . '-' . $img->getClientOriginalName();
            $img->storeAs('results', $filename, 'public');

            // Simpan ke database jika perlu
            // PhotoResult::create([
            //     'booking_id' => $request->booking_id,
            //     'image' => $filename
            // ]);
        }

        return back()->with('success', 'Photos successfully uploaded!');
    }

    public function showAlreadyCompleted(Booking $booking)
    {
        // id user yang login
        $userId = auth()->id();
        // cari photographer berdasarkan user_id
        $photographer = Photographer::where('user_id', $userId)->first();

        if (!$photographer) {
            abort(403, "Access denied");
        }
        // ambil booking sesuai id photographer
        $bookings = Booking::with(['user', 'photoType'])
            ->where('photographer_id', $photographer->id)->where('status', 'completed')
            ->orderBy('id', 'desc')
            ->get();

        return view('photographers.bookings.completed', compact('bookings'));
    }
    public function showHistory(Booking $booking)
    {
        // id user yang login
        $userId = auth()->id();
        // cari photographer berdasarkan user_id
        $photographer = Photographer::where('user_id', $userId)->first();

        if (!$photographer) {
            abort(403, "Access denied");
        }
        // ambil booking sesuai id photographer
        $bookings = Booking::with(['user', 'photoType'])
            ->where('photographer_id', $photographer->id)
            ->orderBy('id', 'desc')
            ->get();

        return view('photographers.bookings.history', compact('bookings'));
    }
}

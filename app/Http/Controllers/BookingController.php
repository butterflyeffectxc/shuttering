<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['customer', 'photographer'])->orderBy('id', 'desc')->get();
        return view('admins.bookings.index', compact('bookings'));
    }

    public function show(Booking $booking)
    {
        return view('admins.bookings.detail', compact('booking'));
    }
}

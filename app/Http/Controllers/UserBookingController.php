<?php

namespace App\Http\Controllers;

use App\Models\Photographer;
use Illuminate\Http\Request;

class UserBookingController extends Controller
{
    public function showForm(Photographer $photographer)
    {
        return view('users.bookings.form', compact('photographer'));
    }
    public function fillForm(Request $request)
    {
        // $validated = 
    }
}

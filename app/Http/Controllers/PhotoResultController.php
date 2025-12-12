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
        $photographer = Photographer::where('user_id', Auth::id())->first();
        if (!$photographer) {
            abort(403, 'Photographer not found for this user.');
        }
        // Booking harus milik photographer
        if ($booking->photographer_id !== $photographer->id) {
            abort(403, 'Unauthorized');
        }

        if ($booking->photoResult) {
            return back()->with('error', 'You have already submitted a photo result..');
        }
        // dd($request);
        $request->validate([
            'booking_id' => 'required',
            'photo_link' => [
                'required',
                'url',
                'regex:/^https?:\/\/(?:www\.)?drive\.google\.com\/.+$/'
            ],
            'status' => 'required'
        ], [
            'photo_link.regex' => 'Photo link must be a valid Google Drive link.',
        ]);

        PhotoResult::create([
            'photographer_id' => $photographer,
            'booking_id' => $request->booking_id,
            'photo_link' => $request->photo_link,
            'status' => "1",
        ]);
        return back()->with('success', 'Photos uploaded successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Photographer;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function store(Request $request, Photographer $photographer)
    {
        // pastikan user login
        $userId = auth()->id();

        // pastikan photographer valid
        $photographer = Photographer::findOrFail($photographer);

        // // cegah wishlist duplikat
        // $exists = Wishlist::where('user_id', $userId)
        //     ->where('photographer_id', $photographer->id)
        //     ->exists();

        // if ($exists) {
        //     return back()->with('info', 'Photographer already in wishlist');
        // }

        Wishlist::create([
            'user_id' => $userId,
            'photographer_id' => $photographer->id,
        ]);

        return back()->with('success', 'Added to wishlist');
    }
    public function destroy($photographerId)
    {
        Wishlist::where('user_id', auth()->id())
            ->where('photographer_id', $photographerId)
            ->delete();

        return back()->with('success', 'Removed from wishlist');
    }
}

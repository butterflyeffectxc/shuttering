<?php

namespace App\Http\Controllers;

use App\Models\Photographer;
use Illuminate\Http\Request;

class UserViewController extends Controller
{
    public function showPhotographer()
    {
        $photographers = Photographer::with(['user', 'photoTypes'])->where('status', '1')->get();
        return view('users.home-page', compact('photographers'));
    }

    public function showPhotographerDetail(Photographer $photographer)
    {
        // dd($photographer);
        // $photographer =  Photographer::with(['user', 'photoTypes'])->get();
        return view('users.bookings.detail', compact('photographer'));
    }
}

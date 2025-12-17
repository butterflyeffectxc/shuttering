<?php

namespace App\Http\Controllers;

use App\Models\Photographer;
use App\Models\PhotoType;
use Illuminate\Http\Request;

class UserViewController extends Controller
{
    public function showPhotographer(Request $request)
    {
        $photoTypes = PhotoType::all();

        $photographers = Photographer::with(['user', 'photoTypes'])
            ->where('status', '1')
            ->whereIn('verified_by_admin', ['1', '2'])->whereHas('photoTypes')
            // SEARCH
            ->when($request->search, function ($query) use ($request) {
                $query->whereHas('user', function ($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->search . '%');
                })
                    ->orWhere('location', 'like', '%' . $request->search . '%');
            })

            // FILTER BY PHOTO TYPE
            ->when($request->type, function ($query) use ($request) {
                $query->whereHas('photoTypes', function ($q) use ($request) {
                    $q->where('photo_types.id', $request->type);
                });
            })->get();

        return view('users.home-page', compact('photographers', 'photoTypes'));
    }


    public function showPhotographerDetail(Photographer $photographer)
    {
        // dd($photographer->catalogues());
        // $photographer =  Photographer::with(['user', 'photoTypes'])->get();
        return view('users.bookings.detail', compact('photographer'));
    }
}

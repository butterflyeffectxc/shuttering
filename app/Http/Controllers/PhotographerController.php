<?php

namespace App\Http\Controllers;

use App\Models\Photographer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PhotographerController extends Controller
{
    function registerView()
    {
        return view('users.register-photographer');
    }
    function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'role' => 'required',
            'location' => 'required',
            'role' => 'required',
            'start_rate' => 'required',
            'description' => 'nullable',
            'status' => 'required',
        ]);
        $data['password'] = Hash::make($request->password);
        Photographer::create($data);
        return redirect('/login');
    }
    function index()
    {
        $photographers = Photographer::all();
        return view('admin.photographer', compact('photographers'));
    }
}

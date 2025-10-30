<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/coba', function () {
    return view('index');
});
Route::get('/login', function () {
    return view('users.login');
});
Route::get('/', function () {
    return view('users.landing-page');
});
Route::get('/homepage', function () {
    return view('users.home-page');
});
Route::get('/photographer', function () {
    return view('users.photographer.list');
});
Route::get('/photographer/detail', function () {
    return view('users.photographer.detail');
});

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PhotographerController;
use App\Http\Controllers\UserController;
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

Route::get('/login', [AuthController::class, 'loginView']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerView']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/register/photographer', [PhotographerController::class, 'registerView']);
Route::post('/register/photographer', [PhotographerController::class, 'register']);
// Admin
Route::get('/photographers', [PhotographerController::class, 'index']);
Route::get('/photographers/detail/{photographer:id}', [PhotographerController::class, 'show']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/bookings/detail/{booking:id}', [BookingController::class, 'show']);
Route::get('/bookings', [BookingController::class, 'index']);

Route::get('/demo', function () {
    return view('index');
});
Route::get('/login', function () {
    return view('users.login');
});
Route::get('/register', function () {
    return view('users.register');
});
Route::get('/', function () {
    return view('users.landing-page');
});
Route::get('/homepage', function () {
    return view('users.home-page');
});
Route::get('/booking', function () {
    return view('users.bookings.list');
});
Route::get('/booking/fill-form', function () {
    return view('users.bookings.form');
});
Route::get('/photographer/detail', function () {
    return view('users.bookings.detail');
});
Route::get('/admin', function () {
    return view('admins.index');
});

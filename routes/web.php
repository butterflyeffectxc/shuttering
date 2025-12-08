<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PhotographerController;
use App\Http\Controllers\PhotoResultController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserBookingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserViewController;
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
Route::post('/register/photographer', [PhotographerController::class, 'registerPhotographer']);
// Admin Start
// Verified Photographer Account
Route::get('/photographers', [PhotographerController::class, 'showAll']);
Route::get('/photographers/to-verify', [PhotographerController::class, 'showAllUnverify']);
Route::put('/photographers/to-verify/{photographer:id}', [PhotographerController::class, 'updatePhotographerVerify']);
Route::get('/photographers/detail/{photographer:id}', [PhotographerController::class, 'showDetail']);
// See User Account
Route::get('/users', [UserController::class, 'index']);
// See Booking
Route::get('/bookings/detail/{booking:id}', [BookingController::class, 'showDetail']);
Route::get('/bookings', [BookingController::class, 'showAll']);
// Admin End

// Photographer Start
// Profile
Route::get('/photographers/profile', [PhotographerController::class, 'updateProfile']);
Route::put('/photographers/profile/{photographer}', [PhotographerController::class, 'editProfile']);

// Booking
Route::get('/photographers/bookings/detail/{booking:id}', [BookingController::class, 'showPerPhotographerDetail']);
Route::get('/photographers/bookings', [BookingController::class, 'showPending']);
Route::get('/photographers/bookings/processed', [BookingController::class, 'showAlreadyProcessed']);
Route::get('/photographers/bookings/canceled', [BookingController::class, 'showAlreadyCanceled']);
Route::get('/photographers/bookings/upload', [BookingController::class, 'showToUpload']);
Route::post('/photographers/bookings/upload-images', [PhotographerController::class, 'uploadImages']);
Route::put('/photographers/bookings/update-status/{booking:id}', [BookingController::class, 'updateConfirmStatus']);
// Photo Result
Route::post('/photographers/photo-result/{booking}', [PhotoResultController::class, 'store'])
    ->name('photoresult.store');
// Review
Route::get('/photographers/bookings/review', [ReviewController::class, 'showPhotographer']);
// Upload


// User
Route::get('/homepage', [UserViewController::class, 'showPhotographer']);
Route::get('/users/photographers/detail/{photographer:id}', [UserViewController::class, 'showPhotographerDetail']);
Route::get('/booking/fill-form/{photographer:id}', [UserBookingController::class, 'showForm']);
Route::post('/booking/fill-form/{photographer:id}', [UserBookingController::class, 'fillForm']);
Route::get('/users/booking', [UserBookingController::class, 'showBooking']);
Route::put('/users/booking/cancel/{booking:id}', [UserBookingController::class, 'cancelBooking']);
Route::get('/users/booking/review/{booking:id}', [ReviewController::class, 'showFormUser']);
Route::get('/users/booking/review/{booking:id}', [ReviewController::class, 'store']);
Route::get('/sweetalert', function () {
    return view('admins.sweetalert');
});
// sampah
Route::get('/demo', function () {
    return view('index');
});
Route::get('/', function () {
    return view('users.landing-page');
});
Route::get('/booking', function () {
    return view('users.bookings.list');
});
Route::get('/photographer/detail', function () {
    return view('users.bookings.detail');
});
Route::get('/admin', function () {
    return view('admins.index');
});

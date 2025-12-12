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

Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerView']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/register/photographer', [AuthController::class, 'registerViewPhotographer']);
Route::post('/register/photographer', [AuthController::class, 'registerPhotographer']);
// Admin Start
Route::middleware(['auth', 'role:1'])->group(function () {
    // Verified Photographer Account
    Route::get('/admins/photographers', [PhotographerController::class, 'showAll']);
    Route::get('/admins/photographers/to-verify', [PhotographerController::class, 'showAllUnverify']);
    Route::put('/admins/photographers/to-verify/{photographer:id}', [PhotographerController::class, 'updatePhotographerVerify']);
    Route::get('/admins/photographers/detail/{photographer:id}', [PhotographerController::class, 'showDetail']);
    // See User Account
    Route::get('/admins/users', [UserController::class, 'index']);
    // See Booking
    Route::get('/admins/bookings', [BookingController::class, 'showAll']);
    Route::get('/admins/bookings/detail/{booking:id}', [BookingController::class, 'showDetail']);
});
// Admin End

// Photographer Start
Route::middleware(['auth', 'role:2'])->group(function () {
    // Profile
    Route::get('/photographers/profile', [PhotographerController::class, 'updateProfile']);
    Route::put('/photographers/profile/{photographer}', [PhotographerController::class, 'editProfile']);
    // Booking
    Route::get('/photographers/bookings/detail/{booking:id}', [BookingController::class, 'showPerPhotographerDetail']);
    Route::get('/photographers/bookings', [BookingController::class, 'showPending']);
    Route::get('/photographers/bookings/processed', [BookingController::class, 'showAlreadyProcessed']);
    Route::get('/photographers/bookings/canceled', [BookingController::class, 'showAlreadyCanceled']);
    Route::get('/photographers/bookings/completed', [BookingController::class, 'showAlreadyCompleted']);
    Route::get('/photographers/bookings/history', [BookingController::class, 'showHistory']);
    Route::get('/photographers/bookings/upload', [BookingController::class, 'showToUpload']);
    // Route::post('/photographers/bookings/upload-images', [PhotographerController::class, 'uploadImages']);
    Route::put('/photographers/bookings/update-status/{booking:id}', [BookingController::class, 'updateConfirmStatus']);
    // Review
    Route::get('/photographers/bookings/completed/detail/{booking:id}', [ReviewController::class, 'showBookingDetail']);
    // Photo Result
    Route::post('/photographers/photo-result/{booking:id}', [PhotoResultController::class, 'store'])
    ->name('photoresult.store');
    // Catalogue
    Route::get('/photographers/catalogue', [PhotographerController::class, 'index']);
    Route::put('/photographers/catalogue/{photographer:id}', [PhotographerController::class, 'store']);
});

// User
Route::get('/homepage', [UserViewController::class, 'showPhotographer']);
Route::get('/users/photographers/detail/{photographer:id}', [UserViewController::class, 'showPhotographerDetail']);
Route::get('/booking/fill-form/{photographer:id}', [UserBookingController::class, 'showForm']);
Route::post('/booking/fill-form/{photographer:id}', [UserBookingController::class, 'fillForm']);
Route::get('/users/booking', [UserBookingController::class, 'showBooking']);
Route::put('/users/booking/cancel/{booking:id}', [UserBookingController::class, 'cancelBooking']);
Route::get('/users/booking/review/{booking:id}', [ReviewController::class, 'showFormUser']);
Route::post('/users/booking/review/{booking:id}', [ReviewController::class, 'store']);
Route::get('/', function () {
    return view('users.landing-page');
});

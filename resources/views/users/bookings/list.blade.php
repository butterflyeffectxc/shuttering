@extends('layouts.main')
@section('content')
    <div class="booking-bg text-white">
        <div class="container page-content">
            @include('partial.navbar')
            <h3>My Bookings</h3>
            {{-- list booking --}}
            <div class="booking-container mt-5 m-0 justify-content-start text-white">
                @forelse ($bookings as $booking)
                    <div class="booking-card">
                        <div class="booking-card-header">
                            <img src="{{ $booking->photographer->profile_photo ? asset('profile_photos/' . $booking->photographer->profile_photo) : asset('assets/default_profile.png') }}"
                                class="booking-card-photo" alt="photo">
                            @if ($booking->status == 'pending')
                                <span class="chip-status chip-pending">Pending</span>
                            @elseif($booking->status == 'confirmed')
                                <span class="chip-status chip-confirmed">Confirmed</span>
                            @elseif($booking->status == 'completed')
                                <span class="chip-status chip-completed">Completed</span>
                            @elseif($booking->status == 'paid')
                                <span class="chip-status chip-paid">Paid</span>
                            @else
                                <span class="chip-status chip-canceled">Canceled</span>
                            @endif
                        </div>

                        <div class="booking-card-body">
                            <h3 class="booking-card-name">{{ $booking->photographer->user->name }}
                                <div class="booking-card-info">
                                    <div class="booking-card-row">
                                        <img src="{{ asset('assets/icon_calendar.svg') }}" class="booking-card-icon"
                                            alt="calendar" />
                                        <p>{{ $booking->session_date }}<br>{{ $booking->session_duration }}</p>
                                    </div>
                                    <div class="booking-card-row">
                                        <img src="{{ asset('assets/location.svg') }}" class="booking-card-icon"
                                            alt="location" />
                                        <p>{{ $booking->session_location }}</p>
                                    </div>
                                </div>

                                <!-- pass data to modal using data- attributes -->
                                @if ($booking->status == 'completed')
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-secondary-sm flex-fill detail-btn" type="button"
                                            data-bs-toggle="modal" data-bs-target="#detailBooking_{{ $booking->id }}">
                                            Details
                                        </button>
                                        <button class="btn btn-primary-sm flex-fill review-btn" type="button"
                                            data-bs-toggle="modal" data-bs-target="#modalReview_{{ $booking->id }}">
                                            Write a Review
                                        </button>
                                    </div>
                                @else
                                    <button class="btn btn-secondary-sm w-100 detail-btn" type="button"
                                        data-bs-toggle="modal" data-bs-target="#detailBooking_{{ $booking->id }}">
                                        Details
                                    </button>
                                @endif
                        </div>
                    </div>
                @empty
                    <p>No bookings found.</p>
                @endforelse
            </div>
        </div>
    </div>
    @foreach ($bookings as $booking)
        {{-- modal image booking complete --}}
        @if ($booking->status == 'completed')
            <div class="modal fade" id="detailBooking_{{ $booking->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content booking-modal p-3">
                        <div class="modal-header border-0">
                            <h5 class="modal-title text-white">Booking Details</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body d-flex gap-4">
                            {{-- LEFT SIDE — DETAILS --}}
                            <div class="left-detail bg-dark p-4 rounded-3 flex-grow-1" style="max-width: 350px;">
                                <div class="d-flex gap-3 align-items-center p-3 rounded-3 photographer-box mb-3">
                                    <img src="{{ $booking->photographer->profile_photo ? asset('profile_photos/' . $booking->photographer->profile_photo) : asset('assets/default_profile.png') }}"
                                        class="booking-card-photo" alt="photographer">

                                    <div class="flex-grow-1 text-white">
                                        <h6 class="mb-0 fw-bold">{{ $booking->photographer->user->name }}</h6>
                                        <p class="small mb-0">{{ $booking->photoType->name }}</p>
                                    </div>
                                    <span class="chip-status chip-completed">Completed</span>
                                </div>

                                <div class="d-flex gap-2 align-items-start text-white mb-3">
                                    <img src="{{ asset('assets/icon_calendar.svg') }}" class="detail-icon">
                                    <p class="mb-0">
                                        {{ $booking->session_date }} <br>
                                        {{ $booking->session_duration }}
                                    </p>
                                </div>

                                <div class="d-flex gap-2 align-items-start text-white mb-4">
                                    <img src="{{ asset('assets/location.svg') }}" class="detail-icon">
                                    <p class="mb-0">{{ $booking->session_location }}</p>
                                </div>

                                <h6 class="fw-bold text-white">Includes:</h6>
                                <ul class="text-white small mt-2">
                                    <li>20 edited soft files (digital photos)</li>
                                    <li>5 printed photos</li>
                                </ul>
                                {{-- Review Section --}}
                                <div class="mt-4">
                                    <h6 class="fw-bold text-white">Write a Review</h6>
                                    <p class="text-white small">Tell us what you think!</p>
                                    <div class="stars d-flex gap-2">
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#modalReview_{{ $booking->id }}">
                                            <i class="bi bi-star star" data-index="1"></i>
                                            <i class="bi bi-star star" data-index="2"></i>
                                            <i class="bi bi-star star" data-index="3"></i>
                                            <i class="bi bi-star star" data-index="4"></i>
                                            <i class="bi bi-star star" data-index="5"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            {{-- RIGHT SIDE — PHOTO GRID --}}
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="text-white mb-0">Your Photos</h5>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-light btn-sm" id="select-all">Select All</button>
                                        <button class="btn btn-warning btn-sm">
                                            <i class="fa fa-download me-1"></i> Download (5)
                                        </button>
                                    </div>
                                </div>

                                {{-- <p class="small text-white mb-3">Total {{ count($booking->photos) }} edited photos</p> --}}

                                <div class="photo-grid row g-3">
                                    {{-- @foreach ($booking->photos as $photo)
                                        <div class="col-4">
                                            <div class="photo-item position-relative">
                                                <img src="{{ asset('booking_photos/' . $photo->filename) }}"
                                                    class="w-100 rounded-3" style="height:150px; object-fit: cover;">
                                                <div class="check-overlay position-absolute top-0 end-0 m-2">
                                                    <input type="checkbox" class="photo-check">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            {{-- modal detail for cancel booking --}}
            <div class="modal fade" id="detailBooking_{{ $booking->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal modal-dialog-centered">
                    <div class="modal-content booking-modal p-3">
                        <div class="modal-header border-0">
                            <h5 class="modal-title">Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            @if ($booking->status == 'canceled')
                                <div class="photographer-box d-flex gap-3 align-items-center p-3 rounded-3 mb-3">
                                    <img src="{{ asset('assets/icon_info.svg') }}" class="detail-icon"
                                        alt="photographer">
                                    <div class="flex-grow-1 text-white">
                                        <p class="small mb-0">You canceled this booking.</p>
                                    </div>
                                </div>
                            @elseif($booking->status == 'paid')
                                <div class="photographer-box d-flex gap-3 align-items-center p-3 rounded-3 mb-3">
                                    <img src="{{ asset('assets/icon_info.svg') }}" class="detail-icon"
                                        alt="photographer">
                                    <div class="flex-grow-1 text-white">
                                        <p class="small mb-0">Your photo will be uploaded within 5–7 days.</p>
                                    </div>
                                </div>
                            @endif
                            <div class="photographer-box d-flex gap-3 align-items-center p-3 rounded-3 mb-3">
                                <img id="dataPhoto"
                                    src="{{ $booking->photographer->profile_photo ? asset('profile_photos/' . $booking->photographer->profile_photo) : asset('assets/default_profile.png') }}"
                                    class="booking-card-photo" alt="photographer">
                                <div class="flex-grow-1 text-white">
                                    <h6 class="mb-0 fw-bold" id="dataName">
                                        {{ $booking->photographer->user->name }} </h6>
                                    <p class="small mb-0" id="dataType">{{ $booking->photoType->name }}</p>
                                </div>
                                @if ($booking->status == 'pending')
                                    <span class="chip-status chip-pending">Pending</span>
                                @elseif($booking->status == 'confirmed')
                                    <span class="chip-status chip-confirmed">Confirmed</span>
                                @elseif($booking->status == 'completed')
                                    <span class="chip-status chip-completed">Completed</span>
                                @elseif($booking->status == 'paid')
                                    <span class="chip-status chip-paid">Paid</span>
                                @else
                                    <span class="chip-status chip-canceled">Canceled</span>
                                @endif
                            </div>

                            <div class="mb-3">
                                <div class="d-flex gap-2 align-items-start mb-2">
                                    <img src="{{ asset('assets/icon_calendar.svg') }}" class="detail-icon"
                                        alt="calendar">
                                    <p class="mb-0 text-white"><span
                                            id="dataDateText">{{ $booking->session_date }}</span><br>
                                        <span id="dataDuration">{{ $booking->session_duration }}</span>
                                    </p>
                                </div>

                                <div class="d-flex gap-2 align-items-start">
                                    <img src="{{ asset('assets/location.svg') }}" class="detail-icon" alt="location">
                                    <p class="mb-0 text-white" id="dataLocation">{{ $booking->session_location }}</p>
                                </div>
                            </div>

                            <div class="mt-4">
                                <h6 class="fw-bold text-white">Includes:</h6>
                                <ul class="text-white small mt-2" id="dataIncludes">
                                    <li>20 edited soft files (digital photos)</li>
                                    <li>5 printed photos</li>
                                </ul>
                            </div>
                        </div>
                        <div class="modal-footer border-0" style="display: block;">
                            <form action="/users/booking/cancel/{{ $booking->id }}" method="POST"
                                id="cancel-form-{{ $booking->id }}">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-secondary-sm d-block w-100 cancel-btn" type="submit"
                                    data-id="{{ $booking->id }}">
                                    Cancel Booking
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
    {{-- modal review --}}
    @foreach ($bookings as $booking)
        <div class="modal fade" id="modalReview_{{ $booking->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content booking-modal p-3">

                    <form action="{{ url('users/booking/review/' . $booking->id) }}" method="POST">
                        @csrf

                        <div class="modal-header border-0">
                            <h1 class="modal-title fs-5">Review</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                            <input type="hidden" id="ratingInput_{{ $booking->id }}" name="rating">

                            <div class="stars d-flex justify-content-between mb-3">
                                <i class="bi bi-star star" data-value="1"></i>
                                <i class="bi bi-star star" data-value="2"></i>
                                <i class="bi bi-star star" data-value="3"></i>
                                <i class="bi bi-star star" data-value="4"></i>
                                <i class="bi bi-star star" data-value="5"></i>
                            </div>

                            <div class="form-floating">
                                <textarea class="form-control" name="note" id="note" placeholder="Leave a comment here"
                                    style="height: 100px"></textarea>
                                <label for="note">Add a comment...</label>
                            </div>
                        </div>

                        <div class="modal-footer border-0">
                            <button type="submit" class="btn btn-primary-sm w-100">
                                Submit Review
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        {{-- <div class="modal fade" id="modalReview_{{ $booking->id }}" tabindex="-1" aria-labelledby="modalReviewLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content booking-modal p-3">
                    <div class="modal-header border-0">
                        <h1 class="modal-title fs-5" id="modalReviewLabel">Write a Review</h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <!-- FORM START -->
                    <form action="{{ url('users/booking/review/' . $booking->id) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <!-- Hidden input to store rating -->
                            <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                            <input type="hidden" name="rating" id="ratingInput">
                            <div class="stars d-flex justify-content-between mb-3">
                                <i class="bi bi-star star" data-value="1"></i>
                                <i class="bi bi-star star" data-value="2"></i>
                                <i class="bi bi-star star" data-value="3"></i>
                                <i class="bi bi-star star" data-value="4"></i>
                                <i class="bi bi-star star" data-value="5"></i>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control input-glass-stretch" placeholder="Leave a comment here" id="note"
                                    style="height: 100px" name="note"></textarea>
                                <label for="note">Add a comment...</label>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="submit" class="btn btn-primary-sm w-100">Submit Review
                                {{ $booking->id }}</button>
                        </div>
                    </form>
                    <!-- FORM END -->

                </div>
            </div>
        </div> --}}
    @endforeach

    @include('partial.footer')
@endsection
@push('scripts')
    <script>
        // cancel button
        document.querySelectorAll('.cancel-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const id = this.dataset.id;
                const form = document.getElementById('cancel-form-' + id);

                Swal.fire({
                    title: 'Cancel Booking?',
                    text: 'Are you sure you want to cancel this booking?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, cancel it'
                }).then(result => {
                    if (result.isConfirmed) form.submit();
                });
            });
        });

        // document.querySelectorAll('.cancel-btn').forEach(btn => {
        //     btn.addEventListener('click', function(e) {
        //         e.preventDefault();

        //         let id = this.getAttribute('data-id');
        //         let form = document.getElementById('cancel-form-' + id);

        //         Swal.fire({
        //             title: "Cancel Booking?",
        //             text: "Are you sure you want to cancel this booking?",
        //             icon: "warning",
        //             showCancelButton: true,
        //             confirmButtonColor: "#d33",
        //             cancelButtonColor: "#3085d6",
        //             confirmButtonText: "Yes, cancel it"
        //         }).then((result) => {
        //             if (result.isConfirmed) {
        //                 form.submit();
        //             }
        //         });
        //     });
        // });

        // submit review
        document.querySelectorAll('form[action*="/users/booking/review/"]').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Submit Review?',
                    text: 'Are you sure your review is correct?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Submit',
                    cancelButtonText: 'Cancel'
                }).then(result => {
                    if (result.isConfirmed) this.submit();
                });
            });
        });
    </script>
@endpush

@extends('layouts.main')
@section('content')
    <div class="booking-bg text-white">
        <div class="container page-content">
            @include('partial.navbar')
            <h3>My Bookings</h3>

            <div class="booking-container mt-5 m-0 justify-content-start text-white">
                @forelse ($bookings as $booking)
                    <div class="booking-card">
                        <div class="booking-card-header">
                            <img src="" class="booking-card-photo" alt="photo">
                            @if ($booking->status == 'pending')
                                <span class="chip-status chip-pending">Pending</span>
                            @elseif($booking->status == 'confirmed')
                                <span class="chip-status chip-confirmed">Confirmed</span>
                            @elseif($booking->status == 'complete')
                                <span class="chip-status chip-complete">Complete</span>
                            @elseif($booking->status == 'paid')
                                <span class="chip-status chip-paid">Paid</span>
                            @else
                                <span class="chip-status chip-canceled">Canceled</span>
                            @endif
                        </div>

                        <div class="booking-card-body">
                            <h3 class="booking-card-name">{{ $booking->photographer->user->name }}</h3>

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
                            <button class="btn btn-secondary-sm detail-btn" type="button" data-bs-toggle="modal"
                                data-bs-target="#detailBooking_{{ $booking->id }}">
                                Details
                            </button>
                        </div>
                    </div>
                @empty
                    <p>No bookings found.</p>
                @endforelse
            </div>
        </div>
    </div>
    @foreach ($bookings as $booking)
        <div class="modal fade" id="detailBooking_{{ $booking->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content booking-modal">
                    <div class="modal-header border-0">
                        <h5 class="modal-title">Details</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        @if ($booking->status == 'canceled')
                            <div class="photographer-box d-flex gap-3 align-items-center p-3 rounded-3 mb-3">
                                <img src="{{ asset('assets/icon_info.svg') }}" class="detail-icon" alt="photographer">
                                <div class="flex-grow-1 text-white">
                                    <p class="small mb-0">You canceled this booking.</p>
                                </div>
                            </div>
                        @elseif($booking->status == 'paid')
                            <div class="photographer-box d-flex gap-3 align-items-center p-3 rounded-3 mb-3">
                                <img src="{{ asset('assets/icon_info.svg') }}" class="detail-icon" alt="photographer">
                                <div class="flex-grow-1 text-white">
                                    <p class="small mb-0">Your photo will be uploaded within 5–7 days.</p>
                                </div>
                            </div>
                        @endif
                        <div class="photographer-box d-flex gap-3 align-items-center p-3 rounded-3 mb-3">
                            <img id="dataPhoto" src="{{ asset('photographer/' . $booking->photographer->profile_photo) }}"
                                class="photographer-photo" alt="photographer">
                            <div class="flex-grow-1 text-white">
                                <h6 class="mb-0 fw-bold" id="dataName">
                                    {{ $booking->photographer->user->name }} </h6>
                                <p class="small mb-0" id="dataType">{{ $booking->photoType->name }}</p>
                            </div>
                            @if ($booking->status == 'pending')
                                <span class="chip-status chip-pending">Pending</span>
                            @elseif($booking->status == 'confirmed')
                                <span class="chip-status chip-confirmed">Confirmed</span>
                            @elseif($booking->status == 'complete')
                                <span class="chip-status chip-complete">Complete</span>
                            @elseif($booking->status == 'paid')
                                <span class="chip-status chip-paid">Paid</span>
                            @else
                                <span class="chip-status chip-canceled">Canceled</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <div class="d-flex gap-2 align-items-start mb-2">
                                <img src="{{ asset('assets/icon_calendar.svg') }}" class="detail-icon" alt="calendar">
                                <p class="mb-0 text-white"><span id="dataDateText">{{ $booking->session_date }}</span><br>
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
                    <div class="modal-footer border-0 w-100">
                        <form action="/users/booking/cancel/{{ $booking->id }}" method="POST"
                            id="cancel-form-{{ $booking->id }}">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-secondary-sm w-100 cancel-btn" type="submit"
                                data-id="{{ $booking->id }}">
                                Cancel Booking
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- modal detail --}}
    @include('partial.footer')
@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cancelButtons = document.querySelectorAll('.cancel-btn');

            cancelButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const bookingId = this.getAttribute('data-id');
                    const form = document.getElementById('cancel-form-' + bookingId);

                    Swal.fire({
                        title: 'Apakah kamu yakin?',
                        text: "Kamu tidak bisa mengembalikan proses ini!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, hapus data!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection

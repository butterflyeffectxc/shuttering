@extends('layout.main')
@section('content')
    <div class="booking-bg text-white">
        <div class="container page-content">
            @include('partial.navbar')
            <h3>My Bookings</h3>
            <div class="filter my-3">
                <div class="filter-chip">
                    <a href=""><span class="chip">All</span></a>
                    <a href=""><span class="chip">Pending</span></a>
                    <a href=""><span class="chip">Confirmed</span></a>
                    <a href=""><span class="chip">Paid</span></a>
                    <a href=""><span class="chip">Complete</span></a>
                    <a href=""><span class="chip">Wedding</span></a>
                    <a href=""><span class="chip">Maternity</span></a>
                </div>
                <div class="filter-dropdown">

                </div>
            </div>
            <div class="">
                <div class="row booking-container mt-5 m-0 justify-content-between text-white">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 m-0">
                        <a href="">
                            <div class="booking-card">
                                <div class="booking-card-header">
                                    <img src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e"
                                        alt="Cecilia Bright" class="booking-card-photo" />
                                    <span class=" chip-status chip-pending">Pending</span>
                                </div>
                                <div class="booking-card-body">
                                    <h3 class="booking-card-name">Cecilia Bright</h3>
                                    <div class="booking-card-info">
                                        <div class="booking-card-row">
                                            <img src="{{ asset('assets/calendar.svg') }}" alt="calendar"
                                                class="booking-card-icon" />
                                            <p>Saturday, November 15, 2025<br>14.00 – 18.00</p>
                                        </div>
                                        <div class="booking-card-row">
                                            <img src="{{ asset('assets/location.svg') }}" alt="location"
                                                class="booking-card-icon" />
                                            <p>Grand Ballroom, Hotel Jakarta</p>
                                        </div>
                                    </div>
                                    <button class="btn btn-secondary-sm">Details</button>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partial.footer')
@endsection

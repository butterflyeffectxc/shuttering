@extends('layouts.main')
@section('content')
    <div class="main-bg">
        <div class="container py-3">
            @include('partial.navbar')
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="sticky-scroll">
                        <h2>The Photographer.</h2>
                        <img src="{{ $photographer->profile_photo ? asset('profile_photos/' . $photographer->profile_photo) : asset('assets/default_profile.png') }}"
                            alt="" class="img-form">
                        <h2 class="pt-2">{{ $photographer->user->name }}</h2>
                        <div class="d-flex justify-content-start gap-3 pb-2">
                            <h6 class="photocard-location"><img src="{{ asset('assets/location.svg') }}" width="24"
                                    alt=""> {{ $photographer->location }}</h6>
                            {{-- <h6 class="photocard-location"><img src="{{ asset('assets/icon_star.svg') }}" width="24"
                                    alt=""> 5/5</h6> --}}
                            @if ($photographer->reviews_count > 0)
                                <h6 class="photocard-location">
                                    <img src="{{ asset('assets/icon_star.svg') }}" width="24" alt="">
                                    {{ number_format($photographer->reviews_avg_rating, 1) }}/5
                                    <span class="text-muted">({{ $photographer->reviews_count }})</span>
                                </h6>
                            @else
                                <h6 class="photocard-location text-muted">
                                    <img src="{{ asset('assets/icon_star.svg') }}" width="24" alt=""
                                        style="opacity:0.4">
                                    Belum ada rating
                                </h6>
                            @endif
                        </div>
                        <p>Start From: Rp{{ number_format($photographer->start_rate, 0, ',', '.') }}/Hour</p>
                    </div>
                </div>
                <div class="col-12 col-md-8 mx-auto">
                    <div class="d-flex justify-content-center">
                        <div class="card card-glass-stretch px-3 py-2">
                            <div class="card-body text-white">
                                <div class="py-1">
                                    <h2 class="fw-bold">Book Your Photoshoot</h2>
                                    <p>Fill in the details below to request a booking. The photographer will review and
                                        confirm your request.</p>
                                    <hr>
                                </div>
                                <form method="POST" action="{{ url('booking/fill-form/' . $photographer->id) }}"
                                    class="text-white text-start">
                                    @csrf
                                    <h5>Session Details</h5>
                                    <div class="mb-3 row">
                                        <div class="col">
                                            <label for="date" class="form-label"><b>Session Date</b></label>
                                            <input type="date" class="form-control input-glass text-white py-2"
                                                id="date" name="session_date" value="{{ old('session_date') }}"
                                                min="{{ \Carbon\Carbon::now()->addDays(7)->format('Y-m-d') }}" required>
                                        </div>
                                        {{-- <div class="col">
                                            <label for="duration" class="form-label"><b>Duration</b></label>
                                            <input type="time" class="form-control input-glass text-white py-2"
                                                id="duration" placeholder="duration" name="session_duration"
                                                data-rate="{{ $photographer->start_rate }}" required>
                                        </div> --}}
                                        <div class="col">
                                            <label for="duration" class="form-label"><b>Duration</b></label>
                                            <select class="form-control input-glass text-white py-2" id="duration"
                                                name="session_duration" data-rate="{{ $photographer->start_rate }}"
                                                required>
                                                <option value="">-- Select Duration --</option>
                                                <option value="1">1 Hour</option>
                                                <option value="1.5">1.5 Hour</option>
                                                <option value="2">2 Hour</option>
                                                <option value="2.5">2.5 Hour</option>
                                                <option value="3">3 Hour</option>
                                                <option value="3.5">3.5 Hour</option>
                                                <!-- contoh lanjut sampai 24 Hour -->
                                                @for ($i = 4; $i <= 24; $i++)
                                                    <option value="{{ $i }}">{{ $i }} Hour</option>
                                                @endfor
                                            </select>
                                        </div>

                                    </div>
                                    <div class="mb-3">
                                        <label for="location" class="form-label"><b>Session Location</b></label>
                                        <input type="text" class="form-control input-glass text-white py-2"
                                            id="location" placeholder="e.g. Grand Ballroom, Hotel XYZ, Jakarta"
                                            name="session_location" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="photo_type" class="form-label"><b>Type of Photoshoot</b></label>
                                        <select class="form-control input-glass" aria-label="Default select example"
                                            name="photo_type_id" required>
                                            <option value="">-- Select Type --</option>
                                            @foreach ($photoTypes as $type)
                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="total_price" class="form-label"><b>Total Price</b></label>
                                        <!-- TAMPILAN (formatted, readonly) -->
                                        <input type="text" id="total_price" class="form-control input-glass text-white"
                                            readonly>
                                        <!-- DIKIRIM KE BACKEND (integer murni) -->
                                        <input type="hidden" id="total_price_raw" name="total_price">
                                    </div>
                                    <div class="mb-3">
                                        <label for="notes" class="form-label"><b>Additional Notes</b></label>
                                        <div class="form-floating">
                                            <textarea class="form-control input-glass-stretch" value="{{ old('notes') }}" placeholder="Leave a comment here"
                                                id="notes" style="height: 100px" name="notes"></textarea>
                                            <label for="notes">Any special requests or details...</label>
                                        </div>
                                        <small>*Edited soft files will be upload in Google Drive</small>
                                    </div>
                                    {{-- hidden input --}}
                                    <input type="text" class="form-control input-glass text-white py-2" id="status"
                                        name="status" value="pending" hidden>
                                    {{-- hidden input --}}
                                    <div class="my-3">
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-primary-sm">Submit Booking Request</button>
                                        </div>
                                        <div class="d-flex justify-content-center mt-3">
                                            <small>* Required fields. Your booking will be pending until the photographer
                                                confirms.</small>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('partial.footer')
    </div>
@endsection

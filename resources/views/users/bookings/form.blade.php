@extends('layouts.main')
@section('content')
    <div class="main-bg">
        <div class="container py-3">
            @include('partial.navbar')
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="sticky-scroll">
                        <h2>The Photographer.</h2>
                        <img src="{{ asset('assets/Cecilia.jpg') }}" alt="" class="img-form">
                        <h2>Cecilia Bright</h2>
                        <div class="d-flex justify-content-start gap-3 pb-2">
                            <h6 class="photocard-location"><img src="{{ asset('assets/location.svg') }}" width="24"
                                    alt=""> Jakarta</h6>
                            <h6 class="photocard-location"><img src="{{ asset('assets/icon_star.svg') }}" width="24"
                                    alt=""> 5/5</h6>
                        </div>
                        <p>Start From: Rp1.000.000/Session</p>
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
                                <form method="GET" action="/login" class="text-white text-start">
                                    <h5>Session Details</h5>
                                    <div class="mb-3 row">
                                        <div class="col">
                                            <label for="date" class="form-label"><b>Session Date</b></label>
                                            <input type="date" class="form-control input-glass text-white py-2"
                                                id="date" placeholder="date" name="date">
                                        </div>
                                        <div class="col">
                                            <label for="duration" class="form-label"><b>Duration</b></label>
                                            <input type="time" class="form-control input-glass text-white py-2"
                                                id="duration" placeholder="duration" name="duration">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="location" class="form-label"><b>Session Location</b></label>
                                        <input type="text" class="form-control input-glass text-white py-2"
                                            id="location" placeholder="e.g. Grand Ballroom, Hotel XYZ, Jakarta"
                                            name="location">
                                    </div>
                                    <div class="mb-3">
                                        <label for="photo_type" class="form-label"><b>Type of Photoshoot</b></label>
                                        <select class="form-select input-glass" aria-label="Default select example"
                                            name="photo_type">
                                            <option selected>Open this select menu</option>
                                            <option value="1">Commercial</option>
                                            <option value="2">Event/Corporate</option>
                                            <option value="3">Family/Maternity</option>
                                            <option value="4">Fashion</option>
                                            <option value="5">Graduation</option>
                                            <option value="6">Lifestyle</option>
                                            <option value="7">Potrait/Personal</option>
                                            <option value="7">Prewedding/Wedding</option>
                                            <option value="8">Street Photography</option>
                                            <option value="9">Travel/Outdoor/Nature</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="notes" class="form-label"><b>Additional Notes</b></label>
                                        <div class="form-floating">
                                            <textarea class="form-control input-glass-stretch" placeholder="Leave a comment here" id="floatingTextarea2"
                                                style="height: 100px"></textarea>
                                            <label for="floatingTextarea2">Any special requests or details...</label>
                                        </div>
                                        <small>*Includes 20 edited soft files (digital photos) and 5 printed photos per
                                            session</small>
                                    </div>
                                    <div class="my-3">
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-primary-sm">Register</button>
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

@extends('layout.main')
@section('content')
    <div class="">
        <div class="home-color">
            <div class="container text-white page-content">
                @include('partial.navbar')
                <h1>Our Photographers</h1>
                <div class="card card-small text-bg-dark">
                    <img src="{{ asset('assets/Cecilia.jpg') }}" class="card-img" alt="">
                    <div class="card-img-overlay d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="">
                                <h6>Jakarta</h6>
                                <small>5/5</small>
                            </div>
                            <a href=""><i class="fa-solid icon-big fa-heart"></i></a>
                        </div>
                        <div class="mt-auto">
                            <h4 class="card-text">Cecilia Bright</h4>
                            <p class="card-text">Wedding & Lifestyle</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

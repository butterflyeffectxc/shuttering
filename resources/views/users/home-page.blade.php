@extends('layout.main')
@section('content')
    <div class="">
        <div class="home-color">
            <div class="container page-content">
                @include('partial.navbar')
                <div class="mt-5 text-white">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h1 class="font-large">Snap!</h1>
                            <h1>Feel. Frame. Repeat.</h1>
                            <p>From creative shoots to cinematic storytelling — Shuttering is where emotions meet artistry.
                            </p>
                            <div class="d-flex justify-content-start gap-2">
                                <a href="" class="btn btn-glass"><i class="fa-solid icon-small fa-hashtag"></i>
                                    Scenery</a>
                                <a href="" class="btn btn-glass"><i class="fa-solid icon-small fa-hashtag"></i>
                                    Scenery</a>
                                <a href="" class="btn btn-glass"><i class="fa-solid icon-small fa-hashtag"></i>
                                    Scenery</a>
                            </div>
                            <a href="" class="btn btn-glass mt-3">What moments are you going to capture?<i
                                    class="fa-solid fa-arrow-right ms-3"></i></a>
                        </div>
                        <div class="col-12 col-md-6 text-center">
                            <img src="{{ asset('assets/scenery.jpg') }}" alt="" class="img-medium">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="home-bg">
            <div class="container mt-auto page-content text-white py-5">
                <div class="row container mt-auto page-content text-white py-5">
                    <div class="col-12 col-md-4">
                        <h1 class="font-instrument font-large">Wedding Photoshoot.</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit id sunt quidem ad ipsam inventore!
                        </p>
                        <div class="d-flex align-items-center justify-content-start">
                            <a href=""><i class="fa-solid icon-big fa-heart"></i></a>
                            <a href="" class="btn btn-glass-blur">Book Now</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="overflow-auto">
                            <div class="d-flex flex-row gap-3">
                                <div class="rounded-image">
                                    <img src="{{ asset('assets/scenery.jpg') }}" alt="">
                                </div>
                                <div class="rounded-image">
                                    <img src="{{ asset('assets/scenery.jpg') }}" alt="">
                                </div>
                                <div class="rounded-image">
                                    <img src="{{ asset('assets/scenery.jpg') }}" alt="">
                                </div>
                                <div class="rounded-image">
                                    <img src="{{ asset('assets/scenery.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

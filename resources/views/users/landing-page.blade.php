@extends('layout.main')
@section('content')
    <div class="landing-bg">
        <div class="container page-content">
            <div class="mt-5 text-center text-white">
                <img src="{{ asset('assets/Shuttering.svg') }}" alt="" class="logo-big">
                <p><b>Transform your moments into lasting works of art. <br>From personal portraits to commercial visuals,
                        Shuttering brings your story to life<br>— frame by frame.</b></p>
                <div class="d-grid gap-2 col-2 mx-auto mt-5">
                    <a href="{{ url('/login') }}" class="btn btn-primary-lg">Capture Now</a>
                </div>
            </div>
        </div>
    </div>
@endsection

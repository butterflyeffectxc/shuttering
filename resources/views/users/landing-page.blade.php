@extends('layout.main')
@section('content')
    <div class="landing-bg">
        <div class="container page-content">
            <div class="d-flex justify-content-center gap-3">
                <a href="" class="btn btn-glass">Button</a>
                <a href="" class="btn btn-glass">Button</a>
                <a href="" class="btn btn-glass">Button</a>
                <a href="" class="btn btn-glass">Button</a>
            </div>
            <div class="mt-5 text-center text-white">
                <img src="{{ asset('assets/Shuttering.svg') }}" alt="" class="logo-big">
                <p>Transform your moments into lasting works of art. <br>From personal portraits to commercial visuals,
                    Shuttering brings your story to life<br><b>— frame by frame.</b></p>
                <div class="d-grid gap-2 col-3 mx-auto mt-5">
                    <a href="#" class="btn btn-glass-blur">Capture Now</a>
                </div>
            </div>
        </div>
    </div>
@endsection

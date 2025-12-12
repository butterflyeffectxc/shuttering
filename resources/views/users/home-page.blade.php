@extends('layouts.main')
@section('content')
    <div class="">
        <div class="home-color">
            <div class="home-frame">
                <div class="container page-content">
                    @include('partial.navbar')
                    <div class="mt-5 text-white">
                        <div class="row">
                            <div class="col-12 col-md-5">
                                <h1 class="font-large">Snap!</h1>
                                <h1>Feel. Frame. Repeat.</h1>
                                <p>From creative shoots to cinematic storytelling — Shuttering is where emotions meet
                                    artistry.
                                </p>
                                <input type="text" class="form-control input-glass text-white py-2 mb-3" id="search"
                                    placeholder="Search" name="search">
                            </div>
                            <div class="my-3">
                                <a href=""><span class="chip">All</span></a>
                                <a href=""><span class="chip">Potrait</span></a>
                                <a href=""><span class="chip">Formal</span></a>
                                <a href=""><span class="chip">Fashion</span></a>
                                <a href=""><span class="chip">Lifestyle</span></a>
                                <a href=""><span class="chip">Wedding</span></a>
                                <a href=""><span class="chip">Maternity</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="photocard-bg pt-3 pb-5">
            <div class="container">
                <div class="photocard-container">
                    @foreach ($photographers as $photographer)
                        <a href="{{ url('users/photographers/detail/' . $photographer->id) }}" class="photocard-wrapper">
                            <div class="photocard">
                                <img src="{{ $photographer->profile_photo ? asset('profile_photos/' . $photographer->profile_photo) : asset('assets/default_profile.png') }}"
                                    alt="">
                                <div class="photocard-overlay">
                                    <div class="photocard-top">
                                        <button class="photocard-fav active btn-primary-sm">
                                            <img src="{{ asset('assets/favorite_outline.svg') }}" alt="">
                                        </button>
                                    </div>
                                    <div class="photocard-bottom">
                                        <span class="photocard-location">
                                            <img src="{{ asset('assets/location.svg') }}" width="24">
                                            {{ $photographer->location }}
                                        </span>
                                        <div class="d-flex justify-content-start align-items-center gap-2">
                                            <h3>{{ $photographer->user->name }}</h3>
                                            @if ($photographer->verified_by_admin === '2')
                                                <img src="{{ asset('assets/icon_verified.svg') }}" alt=""
                                                    style="width:24px; height:24px;">
                                            @endif
                                        </div>
                                        <p>
                                            @foreach ($photographer->photoTypes as $type)
                                                {{ $type->name }}{{ !$loop->last ? ' & ' : '' }}
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    @include('partial.footer')
@endsection
{{-- <div class="card text-bg-dark">
                                <img src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e" class="card-img"
                                    alt="Cecilia Bright">
                                <div class="photocard-overlay">
                                    <div class="d-flex align-items-end">
                                        <span class="photocard-location"><img src="{{ asset('assets/location.svg') }}"
                                                width="24" alt=""> Jakarta</span>
                                        <h3 class="card-title">Cecilia Bright</h3>
                                        <p class="card-text">Wedding & Lifestyle</p>
                                    </div>
                                </div>
                            </div> --}}

@extends('layout.main')
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
                                <input type="text" class="form-control input-glass text-white py-2" id="search"
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
        <div class="photocard-bg">
            <div class="container py-5">
                <div class="row photocard-container">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <a href="{{ url('booking') }}">
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
                            <div class="photocard">
                                <img src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e"
                                    alt="Cecilia Bright">
                                <div class="photocard-overlay">
                                    <div class="photocard-top">
                                        <button class="photocard-fav active btn-primary-sm">
                                            <img src="{{ asset('assets/favorite_outline.svg') }}" alt="">
                                        </button>
                                    </div>
                                    <div class="photocard-bottom">
                                        <span class="photocard-location"><img src="{{ asset('assets/location.svg') }}"
                                                width="24" alt=""> Jakarta</span>
                                        <h3>Cecilia Bright</h3>
                                        <p>Wedding & Lifestyle</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <a href="{{ url('booking') }}">
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
                            <div class="photocard">
                                <img src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e"
                                    alt="Cecilia Bright">
                                <div class="photocard-overlay">
                                    <div class="photocard-top">
                                        <button class="photocard-fav active btn-primary-sm">
                                            <img src="{{ asset('assets/favorite_outline.svg') }}" alt="">
                                        </button>
                                    </div>
                                    <div class="photocard-bottom">
                                        <span class="photocard-location"><img src="{{ asset('assets/location.svg') }}"
                                                width="24" alt=""> Jakarta</span>
                                        <h3>Cecilia Bright</h3>
                                        <p>Wedding & Lifestyle</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <a href="{{ url('booking') }}">
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
                            <div class="photocard">
                                <img src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e"
                                    alt="Cecilia Bright">
                                <div class="photocard-overlay">
                                    <div class="photocard-top">
                                        <button class="photocard-fav active btn-primary-sm">
                                            <img src="{{ asset('assets/favorite_outline.svg') }}" alt="">
                                        </button>
                                    </div>
                                    <div class="photocard-bottom">
                                        <span class="photocard-location"><img src="{{ asset('assets/location.svg') }}"
                                                width="24" alt=""> Jakarta</span>
                                        <h3>Cecilia Bright</h3>
                                        <p>Wedding & Lifestyle</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <a href="{{ url('booking') }}">
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
                            <div class="photocard">
                                <img src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e"
                                    alt="Cecilia Bright">
                                <div class="photocard-overlay">
                                    <div class="photocard-top">
                                        <button class="photocard-fav active btn-primary-sm">
                                            <img src="{{ asset('assets/favorite_outline.svg') }}" alt="">
                                        </button>
                                    </div>
                                    <div class="photocard-bottom">
                                        <span class="photocard-location"><img src="{{ asset('assets/location.svg') }}"
                                                width="24" alt=""> Jakarta</span>
                                        <h3>Cecilia Bright</h3>
                                        <p>Wedding & Lifestyle</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Tambahkan photocard lainnya di sini -->
                </div>
            </div>
        </div>
    </div>
    @include('partial.footer')
@endsection

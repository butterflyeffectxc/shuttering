@extends('layouts.main')
@section('content')
    <div class="">
        <div class="detail-photographer-bg">
            <div class="container page-content">
                @include('partial.navbar')
                <div class="mt-5 text-white">
                    <div class="row">
                        <div class="col-3">
                            <h3>
                                @foreach ($photographer->photoTypes as $type)
                                    {{ $type->name }}{{ !$loop->last ? ' & ' : '' }}
                                @endforeach Photographer based in
                            </h3>
                            <h3 class="font-instrument">{{ $photographer->location }}</h3>
                            <div class="py-1">
                                <p><i class="fa-solid fa-circle-check"></i> Available for session</p>
                                <p><i class="fa-solid fa-location-dot"></i> {{ $photographer->location }}</p>
                            </div>
                            <div class="py-1">
                                <p>Interest</p>
                                <div class="justify-content-start">
                                    @foreach ($photographer->photoTypes as $type)
                                        <a href="" class="chip-status chip-pending">{{ $type->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-6"></div>
                        <div class="col-3">
                            <h6>{{ $photographer->description }}</h6>
                            <a href="{{ url('booking/fill-form') }}" class="btn btn-primary-sm">Book a Session <i
                                    class="fa-solid fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <h1 class="font-super-large">{{ $photographer->user->name }}</h1>
                </div>
            </div>
        </div>
        {{-- <div class="portofolio-bg">
            <div class="mb-auto container page-content">
                <div class="font-color">
                    <h1 class="font-large">The Wedding of</h1>
                    <h1 class="font-instrument ">Mario and Bernadette</h1>
                    <p><i class="fa-solid fa-location-dot"></i> Bukit Batu, Jawa Tengah</p>
                </div>
            </div>
        </div> --}}
        <section class="wedding-carousel position-relative">
            <div class="container py-5">
                <div class="row align-items-center">
                    <!-- Left Text Section -->
                    <div class="col-md-5 text-start text-white">
                        <h2 class="fw-bold title">Wedding of</h2>
                        <h1 class="names"><em>Mario and Bernadette</em></h1>
                        <p class="location"><img src="assets/location.svg" width="18" alt=""> Bukit Batu, Jawa
                            Tengah</p>
                    </div>

                    <!-- Right Carousel Section -->
                    <div class="col-md-7">
                        <div id="weddingCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('assets/bg_dua.jpg') }}" class="d-block w-100 main-photo"
                                        alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('assets/bg_tiga.jpg') }}" class="d-block w-100 main-photo"
                                        alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('assets/bg_empat.jpg') }}" class="d-block w-100 main-photo"
                                        alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('assets/bg_dua.jpg') }}" class="d-block w-100 main-photo"
                                        alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('assets/bg_tiga.jpg') }}" class="d-block w-100 main-photo"
                                        alt="...">
                                </div>
                            </div>

                            <!-- Controls -->
                            <button class="carousel-control-prev" type="button" data-bs-target="#weddingCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon custom-arrow" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#weddingCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon custom-arrow" aria-hidden="true"></span>
                            </button>
                        </div>

                        <!-- Thumbnail Strip -->
                        <div class="thumb-strip d-flex justify-content-center gap-3 mt-4">
                            <img src="{{ asset('assets/bg_dua.jpg') }}" class="thumb active-thumb">
                            <img src="{{ asset('assets/bg_tiga.jpg') }}" class="thumb ">
                            <img src="{{ asset('assets/bg_empat.jpg') }}" class="thumb ">
                            <img src="{{ asset('assets/bg_empat.jpg') }}" class="thumb ">
                            <img src="{{ asset('assets/bg_dua.jpg') }}" class="thumb">
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection

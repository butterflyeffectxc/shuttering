@extends('layouts.main')
@section('content')
    <div class="">
        <div class="detail-photographer-bg"
            @if ($photographer->profile_photo) data-bg="{{ asset('profile_photos/' . $photographer->profile_photo) }}" @endif>
            <div class="container page-content position-relative z-1">
                @include('partial.navbar')

                <div class="mt-5 text-white">
                    <div class="row align-items-center min-vh-75">
                        <div class="col-lg-4">
                            <h3>
                                @foreach ($photographer->photoTypes as $type)
                                    {{ $type->name }}{{ !$loop->last ? ' & ' : '' }}
                                @endforeach Photographer based in
                            </h3>

                            <h3 class="font-instrument">{{ $photographer->location }}</h3>

                            <div class="py-2">
                                <p><i class="fa-solid fa-circle-check"></i> Available for session</p>
                                <p><i class="fa-solid fa-location-dot"></i> {{ $photographer->location }}</p>
                            </div>

                            <div class="py-2">
                                <p class="fw-semibold">Interest</p>
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach ($photographer->photoTypes as $type)
                                        <span class="chip">{{ $type->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4"></div>

                        <div class="col-lg-4">
                            <p class="lead">{{ $photographer->description }}</p>

                            <a href="{{ url('booking/fill-form/' . $photographer->id) }}"
                                class="btn btn-primary-sm px-4 mt-3">
                                Book a Session <i class="fa-solid fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>

                    <h1 class="font-super-large mt-4">
                        {{ $photographer->user->name }}
                    </h1>
                </div>
            </div>
        </div>
        <section class="catalogue-carousel position-relative">
            <div class="container py-5">
                <div class="row align-items-center">
                    <!-- Left Text Section -->
                    <div class="col-md-5 text-start text-white">
                        <h2 class="fw-bold title">Portofolio of</h2>
                        <h1 class="names"><em>{{ $photographer->user->name }}</em></h1>
                        <p class="location"><img src="assets/location.svg" width="18"
                                alt="">{{ $photographer->location }}</p>
                    </div>

                    <!-- Right Carousel Section -->
                    <div class="col-md-7">
                        @if ($photographer->catalogues->isNotEmpty())
                            {{-- CAROUSEL UTAMA --}}
                            <div id="catalogueCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">

                                    @forelse ($photographer->catalogues as $index => $catalogue)
                                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                            <img src="{{ asset('catalogue/' . $catalogue->photo) }}"
                                                class="d-block w-100 main-photo" alt="photo">
                                        </div>
                                    @empty
                                        <div class="carousel-item active">
                                            <img src="{{ asset('assets/default-catalogue.jpg') }}"
                                                class="d-block w-100 main-photo" alt="default">
                                        </div>
                                    @endforelse

                                </div>

                                {{-- CONTROL --}}
                                <button class="carousel-control-prev" type="button" data-bs-target="#catalogueCarousel"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </button>

                                <button class="carousel-control-next" type="button" data-bs-target="#catalogueCarousel"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </button>
                            </div>

                            {{-- Thumbnail --}}
                            @if ($photographer->catalogues->count())
                                <div class="thumb-strip d-flex justify-content-center gap-3 mt-4">
                                    @foreach ($photographer->catalogues as $index => $catalogue)
                                        <img src="{{ asset('catalogue/' . $catalogue->photo) }}"
                                            class="thumb {{ $index === 0 ? 'active-thumb' : '' }}"
                                            data-bs-target="#catalogueCarousel" data-bs-slide-to="{{ $index }}">
                                    @endforeach
                                </div>
                            @endif
                        @else
                            <div class="card px-4 pt-3">
                                <p>Photographer have no catalogue at the moment.</p>
                            </div>
                        @endif

                    </div>

                </div>
            </div>
        </section>

    </div>
@endsection
@push('scripts')
    <script>
        // dynamic photo
        document.querySelectorAll('.detail-photographer-bg').forEach(el => {
            const bg = el.dataset.bg;
            if (bg) {
                el.style.backgroundImage = `url('${bg}')`;
            }
        });
        // carousel
        document.addEventListener('DOMContentLoaded', function() {
            const carouselEl = document.getElementById('catalogueCarousel');
            const thumbStrip = document.querySelector('.thumb-strip');
            if (!carouselEl || !thumbStrip) return;
            const thumbs = Array.from(document.querySelectorAll('.thumb'));
            const carousel = bootstrap.Carousel.getOrCreateInstance(carouselEl);
            carouselEl.addEventListener('slid.bs.carousel', function(e) {
                thumbs.forEach((thumb, index) => {
                    const isActive = index === e.to;
                    thumb.classList.toggle('active-thumb', isActive);

                    // auto scroll ke tengah
                    if (isActive) {
                        const left =
                            thumb.offsetLeft -
                            thumbStrip.offsetWidth / 2 +
                            thumb.offsetWidth / 2;

                        thumbStrip.scrollTo({
                            left: left,
                            behavior: 'smooth'
                        });
                    }
                });
            });

        });
    </script>
@endpush

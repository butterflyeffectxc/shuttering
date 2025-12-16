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
                                <input type="text" id="search" class="form-control input-glass text-white py-2 mb-3"
                                    placeholder="Search photographer, location..." name="search"
                                    value="{{ request('search') }}">


                            </div>
                            <div class="my-3 d-flex flex-wrap gap-2">
                                {{-- ALL --}}
                                <a href="{{ request()->fullUrlWithQuery(['type' => null]) }}">
                                    <span class="chip {{ request('type') ? '' : 'chip-active' }}">All</span>
                                </a>
                                {{-- <a href="{{ request()->url() }}">
                                    <span class="chip {{ request('type') ? '' : 'chip-active' }}">All</span>
                                </a> --}}
                                {{-- FILTER BY PHOTOTYPE --}}
                                @foreach ($photoTypes as $photoType)
                                    <a href="{{ request()->fullUrlWithQuery(['type' => $photoType->id]) }}">
                                        <span class="chip {{ request('type') == $photoType->id ? 'chip-active' : '' }}">
                                            {{ $photoType->name }}
                                        </span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="photocard-bg pt-3 pb-5">
            <div class="container">
                <div class="photocard-container">
                    @forelse ($photographers as $photographer)
                        <a href="{{ url('users/photographers/detail/' . $photographer->id) }}" class="photocard-wrapper">
                            <div class="photocard">
                                <img src="{{ $photographer->profile_photo ? asset('profile_photos/' . $photographer->profile_photo) : asset('assets/default_profile.png') }}"
                                    alt="">
                                <div class="photocard-overlay">
                                    <div class="photocard-top">
                                        {{-- <form action="{{ url('users/photographer/wishlist/' . $photographer->id) }}"></form>
                                        <button class="photocard-fav active btn-primary-sm">
                                            <img src="{{ asset('assets/favorite_outline.svg') }}" alt="">
                                        </button> --}}
                                    </div>
                                    <div class="photocard-bottom">
                                        <span class="photocard-location">
                                            <img src="{{ asset('assets/location.svg') }}" width="24">
                                            {{ $photographer->location }}
                                        </span>
                                        <div class="d-flex justify-content-start align-items-center gap-2">
                                            <h3>{{ $photographer->user->name }}</h3>
                                            @if ($photographer->verified_by_admin == '2')
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
                    @empty
                        <h6>There is no available photographer at the moment.</h6>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
    @include('partial.footer')
@endsection
@push('scripts')
    <script>
        const searchInput = document.getElementById('search');
        if (searchInput) {
            let debounceTimer;

            searchInput.addEventListener('input', function() {
                clearTimeout(debounceTimer);

                debounceTimer = setTimeout(() => {
                    const searchValue = this.value.trim();
                    const url = new URL(window.location.href);

                    if (searchValue) {
                        url.searchParams.set('search', searchValue);
                    } else {
                        url.searchParams.delete('search');
                    }

                    // keep phototype filter
                    const type = "{{ request('type') }}";
                    if (type) {
                        url.searchParams.set('type', type);
                    }

                    window.location.href = url.toString();
                }, 400);
            });
        }
    </script>
@endpush

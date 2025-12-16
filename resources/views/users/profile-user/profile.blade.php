@extends('layouts.main')
@section('content')
    <div class="profile-bg">
        <div class="page-content">
            <div class="container">
                @include('partial.navbar')
            </div>
            <div class="banner">
                <img src="{{ asset('assets/default_banner.png') }}" alt="" class="img-banner">
            </div>
            <div class="row">
                <div class="col-12 col-md-3 profile-left">
                    <div class="container d-flex align-items-center flex-column profile-container">
                        <img src="{{ asset('assets/default_profile.svg') }}" alt="" class="img-profile z-1">
                        <h5 class="mt-3">{{ $user->name }}</h5>
                        <p>{{ $user->email }}</p>
                        {{-- <a href="{{ url('users/profile/edit' . $user->id) }}" class="btn btn-primary-sm px-3">Edit Profile
                            <i class="bi ps-1 bi-pencil"></i></a> --}}
                        <div class="mt-5">
                            <form method="POST" action="{{ url('logout') }}" id="logout-form">
                                @csrf
                                <button type="button" class="sidebar-link btn btn-danger btn-rounded w-100 text-start"
                                    onclick="confirmLogout()">
                                    <span>Log out</span>
                                    <i class="bi ps-1 bi-box-arrow-right"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-9 profile-right">
                    <div class="container mt-4">
                        <div class="card px-4 py-3">
                            <h5>Edit Profile</h5>
                            <form action="{{ url('users/profile/edit/' . $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="my-3">
                                    <label for="name" class="form-label"><b>Name</b></label>
                                    <input type="text" class="form-control input-glass text-white py-2" id="name"
                                        placeholder="Nutty Matcha" name="name" value="{{ old('name', $user->name) }}"
                                        required>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label"><b>Email</b></label>
                                    <input type="email" class="form-control input-glass text-white py-2" id="email"
                                        placeholder="nutmatch45@gmail.com" name="email"
                                        value="{{ old('email', $user->email) }}" required>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label"><b>Phone Number</b></label>
                                    <input type="text" class="form-control input-glass text-white py-2" id="phone"
                                        placeholder="nutmatch45@gmail.com" name="phone"
                                        value="{{ old('phone', $user->phone) }}" required>
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="current_password" class="form-label"><b>Current Password</b></label>
                                    <input type="password" class="form-control input-glass text-white py-2"
                                        id="current_password" name="current_password">

                                    @error('current_password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="new_password" class="form-label"><b>New Password</b></label>
                                    <input type="password" class="form-control input-glass text-white py-2"
                                        id="new_password" name="new_password">

                                    @error('new_password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="new_password_confirmation" class="form-label"><b>Confirm New
                                            Password</b></label>
                                    <input type="password" class="form-control input-glass text-white py-2"
                                        id="new_password_confirmation" name="new_password_confirmation">
                                </div>
                                <button type="submit" class="btn btn-primary-sm w-100">Save Change</button>
                            </form>
                        </div>
                        {{-- <div class="wishlist-card-container mt-4">
                            @forelse ($user->wishlists as $wishlist)
                                @php $photographer = $wishlist->photographer; @endphp
                                <div class="wishlist-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-md-4">
                                                <img src="{{ $photographer->profile_photo ? asset('profile_photos/' . $photographer->profile_photo) : asset('assets/default_profile.png') }} "
                                                    alt="" class="img-wishlist">
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="mt-1">{{ $photographer->user->name }}</h6>
                                                    <img src="{{ asset('assets/favorite_fill.svg') }}" alt="">
                                                </div>
                                                <p>
                                                    <span><img src="{{ asset('assets/location.svg') }}"
                                                            alt="">{{ $photographer->location }} </span>
                                                <p>Rate: Rp{{ number_format($photographer->start_rate) }}/hour</p>
                                                </p>
                                            </div>
                                            <div class="d-flex flex-wrap gap-2">
                                                @foreach ($photographer->photoTypes as $type)
                                                    <span class="chip">{{ $type->name }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="container">
                                    <p>Your liked photographer will be show here.</p>
                                </div>
                            @endforelse
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partial.footer')
@endsection
@push('scripts')
    <script>
        function confirmLogout() {
            Swal.fire({
                title: 'Logout?',
                text: 'Are you sure you want to log out?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, logout',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        }
    </script>
@endpush

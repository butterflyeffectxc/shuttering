@extends('layouts.admin')
@section('contentCms')
    <div class="page-heading">
        <h3>Photographer Profile</h3>
    </div>

    <div class="page-content">
        <div class="card">
            <div class="card-header mb-2">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">
                        Edit Photographer Profile
                    </h5>
                    <div class="ml-auto">
                        {{-- optional button --}}
                    </div>
                </div>
            </div>

            <div class="card-body">

                <form method="POST" action="{{ url('photographers/profile/' . $photographer->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        {{-- LEFT COLUMN --}}
                        <div class="col-md-6">

                            {{-- NAME --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Full Name</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $photographer->user->name) }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- PHONE --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Phone</label>
                                <input type="text" name="phone"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone', $photographer->user->phone) }}">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- EMAIL --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Email</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $photographer->user->email) }}">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- LOCATION --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Location</label>
                                <input type="text" name="location"
                                    class="form-control @error('location') is-invalid @enderror"
                                    value="{{ old('location', $photographer->location) }}">
                                @error('location')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>

                        {{-- RIGHT COLUMN --}}
                        <div class="col-md-6">

                            {{-- START RATE --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Start Rate</label>
                                <input type="text" name="start_rate"
                                    class="form-control @error('start_rate') is-invalid @enderror"
                                    value="{{ old('start_rate', $photographer->start_rate) }}">
                                @error('start_rate')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- PROFILE PHOTO --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Profile Photo</label>
                                <input type="file" name="profile_photo"
                                    class="form-control @error('profile_photo') is-invalid @enderror">

                                @if ($photographer->profile_photo)
                                    <div class="mt-2">
                                        <img src="{{ asset('profile_photos/' . $photographer->profile_photo) }}"
                                            width="120" class="rounded shadow-sm">
                                    </div>
                                @endif

                                @error('profile_photo')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- DESCRIPTION --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Description</label>
                                <textarea name="description" class="form-control" rows="4">{{ old('description', $photographer->description) }}</textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>

                    </div>

                    {{-- PHOTO TYPES --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Photo Types (max 3)</label>

                        <div class="d-flex flex-wrap gap-3">
                            @foreach ($photoTypes as $type)
                                <label class="d-flex align-items-center gap-2">
                                    <input type="checkbox" name="photo_type[]" value="{{ $type->id }}"
                                        @checked(in_array($type->id, old('photo_type', $photographer->photoTypes->pluck('id')->toArray())))>
                                    {{ $type->name }}
                                </label>
                            @endforeach
                        </div>

                        @error('photo_type')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button class="btn btn-primary mt-2 w-100">
                        Update Profile
                    </button>

                </form>

            </div>
        </div>
    </div>
@endsection

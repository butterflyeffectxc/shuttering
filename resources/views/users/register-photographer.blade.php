@extends('layouts.main')
@section('content')
    <div class="landing-bg scroll-content">
        <div class="container page-content">
            <div class="my-5 text-center text-white">
                <img src="{{ asset('assets/Shuttering.svg') }}" alt="" class="logo-medium">
                <div class="d-flex justify-content-center mt-3">
                    <div class="card card-glass px-3 py-2">
                        <div class="card-body text-white">
                            <div class="py-1">
                                <h5 class="fw-bold">Get Started</h5>
                                <h6>Fill in your details to create an account</h6>
                            </div>
                            <form method="POST" action="{{ url('register/photographer') }}" class="text-white text-start">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label"><b>Full Name</b></label>
                                    <input type="text"
                                        class="form-control input-glass text-white py-2  @error('name') is-invalid @enderror"
                                        id="name" placeholder="Nutty Matcha" name="name" value="{{ old('name') }}"
                                        required>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label"><b>Phone Number</b></label>
                                    <input type="text"
                                        class="form-control input-glass text-white py-2  @error('phone') is-invalid @enderror"
                                        id="phone" placeholder="+6212345678910" name="phone" maxlength="15"
                                        value="{{ old('phone') }}" required
                                        oninput="this.value = this.value.replace(/[^0-9+]/g, '')">
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label"><b>Email</b></label>
                                    <input type="email"
                                        class="form-control input-glass text-white py-2  @error('email') is-invalid @enderror"
                                        id="email" placeholder="nutmatch45@gmail.com" name="email"
                                        value="{{ old('email') }}" required>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 position-relative">
                                    <label for="password" class="form-label"><b>Password</b></label>
                                    <div class="position-relative">
                                        <input type="password" class="form-control input-glass text-white py-2 pe-5"
                                            id="password" placeholder="*****" name="password" minlength="8"
                                            value="{{ old('password') }}" required>
                                        <span
                                            class="fa fa-fw fa-eye field-icon toggle-password position-absolute top-50 end-0 translate-middle-y me-3"
                                            onclick="visiblePassword()"></span>
                                    </div>
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 position-relative">
                                    <label for="password_confirmation" class="form-label"><b>Confirm
                                            Password</b></label>
                                    <div class="position-relative">
                                        <input type="password" class="form-control input-glass text-white py-2 pe-5"
                                            id="password_confirmation" placeholder="*****" name="password_confirmation"
                                            minlength="8" value="{{ old('password_confirmation') }}" required>
                                        <span
                                            class="fa fa-fw fa-eye field-icon toggle-password position-absolute top-50 end-0 translate-middle-y me-3"
                                            onclick="visiblePasswordConfirmation()"></span>
                                    </div>
                                    @error('password_confirmation')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="location" class="form-label"><b>Location</b></label>
                                    <input type="text"
                                        class="form-control input-glass text-white py-2  @error('location') is-invalid @enderror"
                                        id="location" placeholder="Jakarta" name="location" value="{{ old('location') }}"
                                        required>
                                    @error('location')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="start_rate" class="form-label"><b>Start Rate</b></label>
                                    <input type="text"
                                        class="form-control input-glass text-white py-2  @error('start_rate') is-invalid @enderror"
                                        id="start_rate" placeholder="Rp. 80.000" name="start_rate"
                                        value="{{ old('start_rate') }}" required>
                                    @error('start_rate')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label"><b>Description</b></label>
                                    <div class="form-floating">
                                        <textarea class="form-control input-glass-stretch" value="{{ old('description') }}" name="description"
                                            placeholder="Leave a comment here" id="description" style="height: 100px"></textarea>
                                        <label for="description">Add your small introduction</label>
                                    </div>
                                    <input type="text" class="form-control input-glass text-white py-2" id="role"
                                        value="2" name="role" required hidden>
                                    <input type="text" class="form-control input-glass text-white py-2" id="status"
                                        value="1" name="status" required hidden>
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary-sm">Register</button>
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <span>Already have an Account?<a href="{{ url('login') }}"
                                            class="ps-1 font-color">Sign
                                            in</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

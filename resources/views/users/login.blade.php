@extends('layouts.main')
@section('content')
    <div class="landing-bg">
        <div class="container page-content">
            <div class="mt-5 text-center text-white">
                <img src="{{ asset('assets/Shuttering.svg') }}" alt="" class="logo-medium">
                <div class="d-flex justify-content-center mt-3">
                    <div class="card card-glass px-3 py-2">
                        <div class="card-body text-white">
                            <div class="py-1">
                                <h5 class="fw-bold">Welcome Back</h5>
                                <h6>Please sign in to continue</h6>
                            </div>
                            <form method="POST" action="/login" class="text-white text-start">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label"><b>Email</b></label>
                                    <input type="email" class="form-control input-glass text-white py-2" id="email"
                                        placeholder="nutmatch45@gmail.com" name="email" value="{{ old('email') }}"
                                        required>
                                    {{-- @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror --}}
                                </div>
                                <div class="position-relative mb-3">
                                    <label for="password" class="form-label"><b>Password</b></label>
                                    <input type="password" class="form-control input-glass text-white py-2 pe-5"
                                        id="password" placeholder="******" name="password" value="{{ old('password') }}"
                                        required>

                                    <!-- Ikon Mata -->
                                    <span class="fa fa-fw fa-eye field-icon toggle-password"
                                        onclick="visiblePassword()"></span>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-end mt-2 mb-3">
                                    <a href="#" class="font-color">Forgot Password?</a>
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary-sm">Login</button>
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <span>Dont have an Account?<a href="{{ url('register') }}"
                                            class="ps-1 font-color">Create
                                            Account</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

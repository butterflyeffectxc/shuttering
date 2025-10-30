@extends('layout.main')
@section('content')
    <div class="login-bg">
        <div class="container page-content align-items-center">
            <div class="row">
                <div class="col-12 col-md-7">
                    <div class="align-items-center d-flex text-white mt-5">
                        <h1 class="font-super-large">Discover<br>Your<br>Moments.</h1>
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <div class="card card-glass px-3 py-4">
                        <div class="card-body text-white">
                            <div class="text-center">
                                <img src="{{ asset('assets/Shuttering.svg') }}" alt="" class="logo-medium">
                                <h3>Welcome Back</h3>
                                <p>Please enter your details</p>
                            </div>
                            <form method="GET" action="/login" class="text-white">
                                <div class="mb-3">
                                    <input type="text" class="form-control input-glass text-white py-3" id="username"
                                        placeholder="Username" name="username">
                                </div>
                                <div class="">
                                    <input type="password" class="form-control input-glass text-white py-3" id="password"
                                        placeholder="Password" name="password">
                                </div>
                                <div class="d-flex justify-content-end mb-3">
                                    <a href="#">Forgot Password?</a>
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-glass">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

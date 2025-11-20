@extends('layouts.main')
@section('content')
    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-dark navbar-transparent">
            <div class="container" id="home">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('assets/logo.png') }}" alt="Logo" width="30" height="30"
                        class="d-inline-block align-text-top">
                    Shuttering
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Centered nav links -->
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#project">Project</a>
                        </li>
                    </ul>

                    <!-- Search form on the right -->
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="hero-section d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <h1 class="text-white">
                            Capturing beautiful <br>
                            moment inside lens and <br>
                            shutterspeed
                        </h1>
                    </div>
                    <div class="row">
                        <div class="col-12 my-4 col-lg-8">
                            <button class="glass-button btn px-3 py-2">Landscape</button>
                            <button class="glass-button btn px-3 py-2">Scenery</button>
                            <button class="glass-button btn px-3 py-2">Seaside</button>
                            <button class="glass-button btn px-3 py-2">Travel</button>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="card card-small mb-3">
                                <div class="row">
                                    <div class="col-4 col-md-5">
                                        <img src="{{ asset('assets/card_dua.jpg') }}" class="img-fluid rounded-start"
                                            alt="foto satu">
                                    </div>
                                    <div class="col-8 col-md-7 ">
                                        <div class="card-body">
                                            <h5 class="card-title">Rural Life by Swanlake</h5>
                                            <p class="card-text text-small text-body-secondary mt-auto">Shoot by
                                                Sony1007
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="about container py-5" id="about">
                <div class=" row">
                    <div class="col-4 d-flex flex-column">
                        <p class="mb-auto text-secondary">(1) <br>About</p>
                        <p>We Ardently Strive To Encapsulate Life's Most Precious Moments, Weaving A Tapestry Of Artistry
                            And A
                            Hint Of Enchanting Magic With The Timeless Essence Of The Human Experience.
                        </p>
                    </div>
                    <div class="col-2">
                        <div class="px-3"></div>
                    </div>
                    <div class="col-6">
                        <h2><b>Photography</b> is driven by a deep passion for <b>capturing life's</b> most <b>precious
                                moments</b> with artistry and a touch of <span class="text-color">magic</span></h2>
                        <a href="" class="glass-button btn mt-3">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="container porto py-5 my-5" id="project">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <p class="mb-auto pb-3">(2) <br>Our Work</p>
                            <h2>When moments captured every dreams crafted into beautiful reality
                            </h2>
                        </div>
                        <div class="col-2">
                            <div class="px-3"></div>
                        </div>
                        <div class="col-4 list">
                            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Scenery</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Potrait</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">Architectural</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">Travel</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">Wildlife</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-2 mt-auto">
                            <h5>Chasing Field at Dolomite's Pinnacle</h5>
                            <small class="text-secondary">Dolomites, Italy</small>
                        </div>
                        <div class="col-10">
                            <div class="overflow-auto">
                                <div class="d-flex flex-row gap-3">
                                    <div class="rounded-image">
                                        <img src="{{ asset('assets/bg_empat.jpg') }}" alt="">
                                    </div>
                                    <div class="rounded-image">
                                        <img src="{{ asset('assets/bg_dua.jpg') }}" alt="">
                                    </div>
                                    <div class="rounded-image">
                                        <img src="{{ asset('assets/bg_tiga.jpg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button class="glass-button btn">See More</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mapping py-5" id="location">
                <div class="row">
                    <div class="col-8">
                        <p class="mb-auto pb-3">(3) <br>Our Location</p>
                    </div>
                    <div class="col-2">
                        <div class="mx-2"></div>
                    </div>
                    <div class="col-2">
                        <h2>Find us in this location</h2>
                    </div>
                </div>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.0223457763987!2d106.61586637337903!3d-6.260786661291728!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fc7ca656fdfd%3A0x782b035b695c85dc!2sPradita%20University!5e0!3m2!1sen!2sid!4v1758684280397!5m2!1sen!2sid"
                    class="map pt-3" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="footer py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <p class="mb-auto pb-3">(3) <br>Contact Us</p>
                            <span>
                                <h1>Let's <b>discuss</b> your <br> vision <span><a href=""
                                            class="glass-button btn">Let's
                                            Talk</a></span> <b>with us</b></h1>
                            </span>
                        </div>
                        <div class="col-2">
                            <div class="mx-3"></div>
                        </div>
                        <div class="col-2">
                            <p><b>Shuttering Ltd.</b></p>
                            <small>Scientia Business Park, Jl. Gading Serpong Boulevard No.1 Tower 1, Curug Sangereng, Kec.
                                Klp.
                                Dua, Kabupaten Tangerang, Banten 15810</small>
                        </div>
                    </div>
                    <hr>
                    <div class="footer-two">
                        <h5 class="mb-0 d-flex align-items-center">
                            <img src="{{ asset('assets/logo.png') }}" alt="Logo" width="30" height="30"
                                class="d-inline-block align-text-top me-2">
                            Shuttering
                        </h5>

                        <ul class="navbar-nav flex-row mb-0">
                            <li class="nav-item me-3">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link" href="#about">About</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link" href="#project">Project</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link" href="#location">Location</a>
                            </li>
                        </ul>

                        <p class="text-secondary mb-0">
                            &#169; Shuttering 2025. All Rights Reserved
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

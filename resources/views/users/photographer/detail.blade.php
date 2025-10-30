@extends('layout.main')
@section('content')
    <div class="">

        <div class="detail-photographer-bg"
            style="background: url('{{ asset('assets/Cecilia.jpg') }}') no-repeat center center/cover;">
            <div class="container page-content">
                @include('partial.navbar')
                <div class="mt-5 text-white">
                    <div class="row">
                        <div class="col-3">
                            <h3>Wedding & Lifestyle Photographer based in</h3>
                            <h3 class="font-instrument">Jakarta</h3>
                        </div>
                        <div class="col-6"></div>
                        <div class="col-3">
                            <p>Hey, I’m Cecilia Bright — I shoot love stories, candid smiles, and those in-between moments
                                that
                                make everything feel real.</p>
                            <a href="" class="btn btn-glass">Book a Session</a>
                        </div>
                    </div>
                    <h1 class="font-super-large">Cecilia Bright</h1>
                </div>
            </div>
        </div>
        <div class="home-color">
            <div class="d-flex align-items-center container ">
                <div class="card card-big">
                    <img src="{{ asset('assets/Cecilia.jpg') }}" class="card-img-big" alt="">
                    <div class="card-img-overlay d-flex flex-column">
                        <div class="d-flex justify-content-between">
                            <h4>the Career Street.</h4>
                            <p>Jan, 2024</p>
                        </div>
                        <p>“Where the crosswalk meets ambition — she walks not to arrive, but to evolve.”</p>
                        <small>Shot on: Fujifilm X-T5 </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

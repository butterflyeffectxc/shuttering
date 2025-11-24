@extends('layouts.admin')
@section('contentCms')
    <div class="page-heading">
        <h3>Profile Statistics</h3>
    </div>
    <div class="page-content">
        <div class="card px-3">
            <div class="card-header mb-2">
                <br>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <img src="{{ asset('assets/photographer.png') }}" alt="" width="200">
                        </div>
                        <div class="col-12 col-md-8">
                            <h4>{{ $photographer->name }}</h4>
                            <div class="table-responsive">
                                <table class="table table-hover p-0 m-0">
                                    <tbody>
                                        <tr>
                                            <th class="pl-0">phone</th>
                                            <td>{{ $photographer->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th class="pl-0">Email</th>
                                            <td>{{ $photographer->email }}</td>
                                        </tr>
                                        <tr>
                                            <th class="pl-0">Location</th>
                                            <td>{{ $photographer->location }}</td>
                                        </tr>
                                        <tr>
                                            <th class="pl-0">Start Rate</th>
                                            <td>{{ $photographer->start_rate }}</td>
                                        </tr>
                                        <tr>
                                            <th class="pl-0">Status</th>
                                            <td> {{ $photographer->status == 1 ? 'Available' : 'Unavailable' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-borderless p-0 m-0">
                                    <thead>
                                        <tr>
                                            <th class="pl-0">Synopsis:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="pl-0">
                                                <p>{{ $photographer->description ? $photographer->description : "This photographer doesn't have description" }}
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="/photographers" class="btn btn-warning back-button"><span>Back</span></a>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.admin')
@section('contentCms')
    <div class="page-heading">
        <h3>Photographer Data</h3>
    </div>
    <div class="page-content">
        <div class="card">
            <div class="card-header mb-2">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">
                        Photographer List
                    </h5>
                    <div class="ml-auto">
                        {{-- <a href="/photographers/create" class="btn btn-primary add-button"><span>Add Data</span></a> --}}
                        {{-- <a href="/photographers/index" class="btn btn-warning back-button"><span>Back</span></a> --}}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th>Location</th>
                                <th>Num of Book</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($photographers as $photographer)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $photographer->user->name }}</td>
                                    <td>{{ $photographer->user->email }}</td>
                                    <td>{{ $photographer->user->phone }}</td>
                                    <td>{{ $photographer->location }}</td>
                                    <td>{{ $photographer->bookings->count() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

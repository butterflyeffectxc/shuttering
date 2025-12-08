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
                        Unverified Photographer List
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
                                <th>Verify</th>
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
                                    <td>
                                        {{-- <div class="btn-group mr-2" role="group" aria-label="Action Button"> --}}
                                        {{-- <a href="/photographers/detail/{{ $photographer->id }}"
                                                class="btn btn-primary"><i class="bi bi-eye-fill"></i></a>
                                            <a href="/photographers/edit/{{ $photographer->id }}" class="btn btn-warning"><i
                                                    class="bi bi-pencil-square"></i></a> --}}
                                        <form action="/photographers/to-verify/{{ $photographer->id }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <form action="photographers/to-verify/{{ $photographer->id }}" method="POST">
                                                <input type="hidden" name="status" value="2">
                                                <button type="submit" class="btn btn-primary w-100"><i
                                                        class="bi bi-check-lg"></i></button>
                                            </form>
                                            {{-- </div> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

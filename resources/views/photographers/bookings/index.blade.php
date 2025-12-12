@extends('layouts.admin')
@section('contentCms')
    <div class="page-heading">
        <h3>Booking Data</h3>
    </div>
    <div class="page-content">
        <div class="card">
            <div class="card-header mb-2">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">
                        Booking List
                    </h5>
                    <div class="ml-auto">
                        {{-- <a href="/bookings/create" class="btn btn-primary add-button"><span>Add Data</span></a> --}}
                        {{-- <a href="/bookings/index" class="btn btn-warning back-button"><span>Back</span></a> --}}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Duration</th>
                                <th>Location</th>
                                <th>Photo Type</th>
                                <th>Status</th>
                                <th>Approval</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    {{-- <td>@foreach ($booking->customer as $customer)
                                        {{ $customer->name }}
                                    @endforeach</td> --}}
                                    <td>{{ $booking->user->name }}</td>
                                    <td>{{ $booking->session_date }}</td>
                                    <td>{{ $booking->session_duration }}</td>
                                    <td>{{ $booking->session_location }}</td>
                                    <td>{{ $booking->photoType->name }}</td>
                                    <td><span class="chip-status chip-pending">Pending</span></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <form action="/photographers/bookings/update-status/{{ $booking->id }}"
                                                method="POST" class="flex-fill">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="confirmed">
                                                <button type="submit" class="btn btn-success w-100">
                                                    <i class="bi bi-check-lg"></i>
                                                </button>
                                            </form>

                                            <form action="/photographers/bookings/update-status/{{ $booking->id }}"
                                                method="POST" class="flex-fill">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="cance led">
                                                <button type="submit" class="btn btn-danger w-100">
                                                    <i class="bi bi-x-circle"></i>
                                                </button>
                                            </form>
                                        </div>
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

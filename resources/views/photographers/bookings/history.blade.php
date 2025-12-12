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
                        History Booking List
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
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $booking->user->name }}</td>
                                    <td>{{ $booking->session_date }}</td>
                                    <td>{{ $booking->session_duration }}</td>
                                    <td>{{ $booking->session_location }}</td>
                                    <td>{{ $booking->photoType->name }}</td>
                                    <td>
                                        @if ($booking->status == 'pending')
                                            <span class="chip-status chip-pending">Pending</span>
                                        @elseif($booking->status == 'confirmed')
                                            <span class="chip-status chip-confirmed">Confirmed</span>
                                        @elseif($booking->status == 'complete')
                                            <span class="chip-status chip-complete">Complete</span>
                                        @elseif($booking->status == 'paid')
                                            <span class="chip-status chip-paid">Paid</span>
                                        @else
                                            <span class="chip-status chip-canceled">Canceled</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/bookings/detail/{{ $booking->id }}" class="btn btn-primary w-100"><i
                                                class="bi bi-info-circle-fill"></i></a>
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

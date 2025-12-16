@extends('layouts.admin')
@section('contentCms')
    <div class="page-heading">
        <h3>Detail Booking</h3>
    </div>
    <div class="page-content">
        <div class="card px-5 py-3">
            <div class="row">
                {{-- <div class="col-12 col-md-4">

                </div> --}}
                <div class="col-12 col-md-12">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Customer Name</td>
                                <td><b>{{ $booking->user->name }}</b></td>
                            </tr>
                            <tr>
                                <td>Photographer Name</td>
                                <td><b>{{ $booking->photographer->user->name }}</b></td>
                            </tr>
                            <tr>
                                <td>Session Date</td>
                                <td>{{ $booking->session_date }}</td>
                            </tr>
                            <tr>
                                <td>Session Duration</td>
                                <td>{{ $booking->session_duration }}</td>
                            </tr>
                            <tr>
                                <td>Session Location</td>
                                <td>{{ $booking->session_location }}</td>
                            </tr>
                            <tr>
                                <td>Photo Type</td>
                                <td>{{ $booking->photoType->name }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
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
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-borderless p-0 m-0">
                        <thead>
                            <tr>
                                <th colspan="2">Review Rating: {{ $booking->review->rating }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($booking->review)
                                <tr>
                                    <td>Notes:</td>
                                </tr>
                                <tr>
                                    <td>{{ $booking->review->note }}</td>
                                </tr>
                            @else
                                <p>There is no review yet.</p>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-start pt-3">
                <a href="{{ url('admins/bookings') }}" class="btn btn-primary me-2"><i class="bi bi-arrow-left"></i>
                    Kembali</a>
            </div>
        </div>
    </div>
@endsection

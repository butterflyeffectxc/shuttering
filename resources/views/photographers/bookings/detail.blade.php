@extends('layouts.admin')
@section('contentCms')
    <div class="page-heading">
        <h3>Booking Detail</h3>
    </div>
    <div class="page-content">
        <div class="card px-4 py-4">
            <div class="row">
                {{-- <div class="col-12 col-md-4">

                </div> --}}
                <div class="col-12 col-md-12">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Customer Name</td>
                                <td>{{ $booking->user->name }}</td>
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
                                <td><span class="chip-status chip-completed">Completed</span></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-borderless">
                        @if ($booking->review)
                            <thead>
                                <tr>
                                    <th colspan="2">Review Rating:
                                        {{ optional($booking->review)->rating ?? '' }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Notes:</td>
                                </tr>
                                <tr>
                                    <td>{{ $booking->review->note }}</td>
                                </tr>
                            @else
                                <p>There is no review yet.</p>
                            </tbody>
                        @endif
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-start pt-3">
                <a href="/photographers/bookings/completed" class="btn btn-success me-2"><i class="bi bi-arrow-left"></i>
                    Kembali</a>
            </div>
        </div>
    </div>
@endsection

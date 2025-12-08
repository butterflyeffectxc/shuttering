@extends('layouts.admin')
@section('contentCms')
    <div class="page-heading">
        <h3>Profile Statistics</h3>
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
                                <td><span class="chip-status chip-complete">Completed</span></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table p-0 m-0">
                        <thead>
                            <tr>
                                <th colspan="2">Review:</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($booking->review)
                                <tr>
                                    <td>Rating</td>
                                    <td>{{ $booking->review->rating }}</td>
                                </tr>
                                <tr>
                                    <td>Notes</td>
                                    <td>{{ $booking->review->note }}</td>
                                </tr>
                            @endif
                            {{-- @forelse ($booking->products as $product)
                                <tr>
                                    <td class="ps-0">{{ $loop->iteration }}</td>
                                    <td>{{ $product->images }}</td>
                                    <td class="ps-0">
                                        {{ $product->name }}
                                    </td>
                                @empty
                                    <td class="ps-0" colspan="2">Belum ada produk.</td>
                                </tr>
                            @endforelse --}}
                        </tbody>
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

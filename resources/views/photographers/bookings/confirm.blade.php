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
                        Confirmed Booking List
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
                                <th>Price</th>
                                <th>Status</th>
                                <th>Payment</th>
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
                                    <td>Rp{{ number_format($booking->total_price) }}</td>
                                    <td><span class="chip-status chip-confirmed">Confirmed</span></td>
                                    <td>
                                        <form action="/photographers/bookings/update-status/{{ $booking->id }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="paid">
                                            <button type="submit" class="btn btn-success w-100">
                                                <i class="bi bi-cash"></i>
                                            </button>
                                        </form>
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
@push('scripts')
    <script>
        document.querySelectorAll('form[action*="/photographers/bookings/update-status/"]').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Change Status to Paid?',
                    text: 'Are you sure payment is success?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Submit',
                    cancelButtonText: 'Cancel'
                }).then(result => {
                    if (result.isConfirmed) this.submit();
                });
            });
        });
    </script>
@endpush

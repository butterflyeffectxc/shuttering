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
                    {{-- <div class="ml-auto">
                    </div> --}}
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Filter Status</label>
                        <select id="statusFilter" class="form-select">
                            <option value="">All Status</option>
                            <option value="Pending">Pending</option>
                            <option value="Confirmed">Confirmed</option>
                            <option value="Paid">Paid</option>
                            <option value="Complete">Complete</option>
                            <option value="Canceled">Canceled</option>
                        </select>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>Photographer Name</th>
                                <th>Date</th>
                                <th>Duration</th>
                                <th>Location</th>
                                <th>Photo Type</th>
                                <th>Status</th>
                                <th>Aksi</th>
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
                                    <td>{{ $booking->photographer->user->name }}</td>
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
                                        <div class="btn-group mr-2" role="group" aria-label="Action Button">
                                            <a href="/admins/bookings/detail/{{ $booking->id }}" class="btn btn-primary"><i
                                                    class="bi bi-eye-fill"></i></a>
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
@push('scripts')
    <script>
        $(document).ready(function() {
            let table;

            if (!$.fn.DataTable.isDataTable('#table1')) {
                table = $('#table1').DataTable({
                    responsive: true
                });
            } else {
                table = $('#table1').DataTable();
            }

            $('#statusFilter').on('change', function() {
                table
                    .column(7) // kolom Status
                    .search(this.value)
                    .draw();
            });
        });
    </script>
@endpush

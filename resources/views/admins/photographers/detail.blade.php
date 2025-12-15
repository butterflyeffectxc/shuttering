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
                            <img src="{{ $photographer->profile_photo ? asset('profile_photos/' . $photographer->profile_photo) : asset('assets/default_profile.png') }}"
                                alt="" width="250">
                            <div class="mt-3">
                                <a href="{{ url('admins/photographers/catalogue/' . $photographer->id) }}"
                                    class="btn-primary btn w-100">See
                                    Portofolio</a>
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <h4>{{ $photographer->user->name }}</h4>
                            <div class="table-responsive">
                                <table class="table table-hover p-0 m-0">
                                    <tbody>
                                        <tr>
                                            <th class="pl-0">Phone</th>
                                            <td>{{ $photographer->user->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th class="pl-0">Email</th>
                                            <td>{{ $photographer->user->email }}</td>
                                        </tr>
                                        <tr>
                                            <th class="pl-0">Location</th>
                                            <td>{{ $photographer->location }}</td>
                                        </tr>
                                        <tr>
                                            <th class="pl-0">Start Rate</th>
                                            <td>{{ $photographer->start_rate . '/per hour' }}</td>
                                        </tr>
                                        <tr>
                                            <th class="pl-0">Number of Booked</th>
                                            <td>{{ $photographer->bookings->count() }}</td>
                                        </tr>
                                        <tr>
                                            <th class="pl-0">Status</th>
                                            <td>{{ $photographer->status == 1 ? 'Available' : 'Unavailable' }}</td>
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
                <div class="d-flex justify-content-end gap-2">
                    <form action="/admins/photographers/suspend/{{ $photographer->id }}" method="POST"
                        id="suspend-form-{{ $photographer->id }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="3">
                        <button type="submit" class="btn btn-danger suspend-btn w-100"
                            data-id="{{ $photographer->id }}"><i class="bi bi-x-mark"></i>Suspend</button>
                    </form>
                    <a href="/admins/photographers" class="btn btn-primary back-button"><span>Back</span></a>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.querySelectorAll('.suspend-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const id = this.dataset.id;
                const form = document.getElementById('suspend-form-' + id);

                Swal.fire({
                    title: 'Suspend this Photographer?',
                    text: 'Are you sure you want to suspend this photographer?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#fd7801',
                    cancelButtonColor: '#818181',
                    confirmButtonText: 'Yes, proceed'
                }).then(result => {
                    if (result.isConfirmed) form.submit();
                });
            });
        });
    </script>
@endpush

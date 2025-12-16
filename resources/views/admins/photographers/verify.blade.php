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
                        {{-- <a href="/admins/photographers/create" class="btn btn-primary add-button"><span>Add Data</span></a> --}}
                        {{-- <a href="/admins/photographers/index" class="btn btn-warning back-button"><span>Back</span></a> --}}
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
                                        <div class="d-flex gap-2">
                                            <form action="/admins/photographers/to-verify/{{ $photographer->id }}"
                                                method="POST" class="flex-fill" id="verify-form-{{ $photographer->id }}">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="verified_by_admin" value="2">
                                                <button type="submit" class="btn btn-success verify-btn w-100"
                                                    data-id="{{ $photographer->id }}"><i
                                                        class="bi bi-check-lg"></i></button>
                                            </form>

                                            <a href="/admins/photographers/detail/{{ $photographer->id }}"
                                                class="btn btn-primary flex-fill"><i class="bi bi-eye-fill"></i></a>
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
        document.querySelectorAll('.verify-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const id = this.dataset.id;
                const form = document.getElementById('verify-form-' + id);

                Swal.fire({
                    title: 'Verify this Photographer?',
                    text: 'Are you sure you want to make this photographer profesional?',
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

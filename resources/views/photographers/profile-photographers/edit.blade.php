@extends('layouts.admin')
@section('contentCms')
    <div class="page-heading">
        <h3>Photographer Profile</h3>
    </div>
    <div class="page-content">
        <div class="card">
            <div class="card-header mb-2">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">
                        Edit Profile
                    </h5>
                    <div class="ml-auto">
                        {{-- optional button --}}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('photographers/profile/' . $photographer->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        {{-- LEFT COLUMN --}}
                        <div class="col-md-6">
                            {{-- name --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Full Name</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $photographer->user->name) }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            {{-- phone --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Phone</label>
                                <input type="text" name="phone"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone', $photographer->user->phone) }}"
                                    oninput="this.value = this.value.replace(/[^0-9+]/g, '')">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            {{-- email --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Email</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $photographer->user->email) }}">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            {{-- location --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Location</label>
                                <input type="text" name="location"
                                    class="form-control @error('location') is-invalid @enderror"
                                    value="{{ old('location', $photographer->location) }}">
                                @error('location')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                @if ($photographer->verified_by_admin == '2')
                                    <img src="{{ asset('assets/icon_verified.svg') }}" alt=""
                                        style="width:24px; height:24px;"> <span>User Verified</span>
                                @elseif($photographer->verified_by_admin == '1')
                                    <img src="{{ asset('assets/icon_unverified.svg') }}" alt=""
                                        style="width:24px; height:24px;"> <span>User Unverified</span>
                                @else
                                    <img src="{{ asset('assets/icon_suspended.svg') }}" alt=""
                                        style="width:24px; height:24px;"> <span>User Suspended</span>
                                @endif
                            </div>
                        </div>
                        {{-- RIGHT COLUMN --}}
                        <div class="col-md-6">
                            {{-- start rate --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Rate per Hour</label>
                                <!-- INPUT TAMPILAN (RUPIAH) -->
                                <input type="text" id="start_rate_display"
                                    class="form-control input-glass @error('start_rate') is-invalid @enderror"
                                    placeholder="Rp 80.000" autocomplete="off">
                                <!-- INPUT ASLI (INTEGER) -->
                                <input type="hidden" id="start_rate" name="start_rate"
                                    value="{{ old('start_rate', $photographer->start_rate) }}" required>
                                {{-- <input type="text" name="start_rate"
                                    class="form-control @error('start_rate') is-invalid @enderror"
                                    value="{{ old('start_rate', $photographer->start_rate) }}"> --}}
                                @error('start_rate')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            {{-- profile photo --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Thumbnail</label>
                                <input type="file" name="profile_photo"
                                    class="form-control @error('profile_photo') is-invalid @enderror">
                                @if ($photographer->profile_photo)
                                    <div class="mt-2">
                                        <img src="{{ asset('profile_photos/' . $photographer->profile_photo) }}"
                                            width="120" class="rounded shadow-sm">
                                    </div>
                                @endif
                                @error('profile_photo')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            {{-- description --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Description</label>
                                <textarea name="description" class="form-control" rows="4">{{ old('description', $photographer->description) }}</textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- photo types --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Photo Types (max 2)</label>
                        <div class="d-flex flex-wrap gap-3">
                            @foreach ($photoTypes as $type)
                                <label class="d-flex align-items-center gap-2">
                                    <input type="checkbox" name="photo_type[]" value="{{ $type->id }}"
                                        @checked(in_array($type->id, old('photo_type', $photographer->photoTypes->pluck('id')->toArray())))>
                                    {{ $type->name }}
                                </label>
                            @endforeach
                        </div>
                        @error('photo_type')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    {{-- Edit Status --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Account Status</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="statusSwitch"
                                {{ $photographer->status == 1 ? 'checked' : '' }}>

                            <label class="form-check-label" id="statusLabel">
                                {{ $photographer->status == 1 ? 'Active' : 'Inactive' }}
                            </label>
                        </div>
                        {{-- hidden input for controller --}}
                        <input type="hidden" name="status" id="statusInput" value="{{ $photographer->status }}">
                    </div>
                    <button class="btn btn-primary mt-2 w-100" type="submit">
                        Update Profile
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const display = document.getElementById('start_rate_display');
            const raw = document.getElementById('start_rate');

            // 👉 tampilkan value dari DB / old() dalam format Rp
            if (raw.value) {
                display.value = 'Rp ' + parseInt(raw.value).toLocaleString('id-ID');
            }

            // 👉 format saat user ngetik
            display.addEventListener('input', function() {
                let value = this.value.replace(/\D/g, '');

                if (!value) {
                    raw.value = '';
                    this.value = '';
                    return;
                }

                raw.value = value;
                this.value = 'Rp ' + parseInt(value).toLocaleString('id-ID');
            });
        });

        const switchStatus = document.getElementById('statusSwitch');
        const statusInput = document.getElementById('statusInput');
        const statusLabel = document.getElementById('statusLabel');

        function updateStatusUI() {
            if (switchStatus.checked) {
                statusInput.value = 1;
                statusLabel.innerText = 'Active';
            } else {
                statusInput.value = 2;
                statusLabel.innerText = 'Inactive';
            }
        }
        // inisialisasi saat page load
        updateStatusUI();
        // saat switch di klik
        switchStatus.addEventListener('change', updateStatusUI);
        // sweetalert
        document.querySelectorAll('form[action*="/photographers/profile/"]').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Change Profile?',
                    text: 'Are you sure your profile is correct?',
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

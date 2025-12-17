@extends('layouts.admin')
@section('contentCms')
    <div class="page-heading">
        <h3>Admin Profile</h3>
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
                <form action="{{ url('admins/profile/edit/' . $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="">
                        <label for="name" class="form-label"><b>Name</b></label>
                        <input type="text" class="form-control input-glass text-white py-2" id="name"
                            placeholder="Nutty Matcha" name="name" value="{{ old('name', $user->name) }}" required
                            maxlength="50">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label"><b>Email</b></label>
                        <input type="email" class="form-control input-glass text-white py-2" id="email"
                            placeholder="nutmatch45@gmail.com" name="email" value="{{ old('email', $user->email) }}"
                            required>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label"><b>Phone Number</b></label>
                        <input type="text" class="form-control input-glass text-white py-2" id="phone"
                            placeholder="089789098765" name="phone" minlength="10" maxlength="15"
                            value="{{ old('phone', $user->phone) }}"
                            oninput="this.value = this.value.replace(/[^0-9+]/g, '')" required>
                        @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="current_password" class="form-label"><b>Current Password</b></label>
                        <input type="password" class="form-control input-glass text-white py-2" id="current_password"
                            name="current_password">

                        @error('current_password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    {{-- <div class="mb-3">
                        <label for="new_password" class="form-label"><b>New Password</b></label>
                        <input type="password" class="form-control input-glass text-white py-2" id="new_password"
                            name="new_password">

                        @error('new_password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="new_password_confirmation" class="form-label"><b>Confirm New
                                Password</b></label>
                        <input type="password" class="form-control input-glass text-white py-2"
                            id="new_password_confirmation" name="new_password_confirmation">
                    </div> --}}
                    <div class="mb-3 position-relative">
                        <label for="new_password" class="form-label"><b>Password</b></label>
                        <div class="position-relative">
                            <input type="password" class="form-control input-glass text-white py-2 pe-5" id="new_password"
                                placeholder="*****" name="new_password" minlength="8" value="{{ old('new_password') }}"
                                required>
                            <span
                                class="fa fa-fw fa-eye field-icon toggle-password position-absolute top-50 end-0 translate-middle-y me-3"
                                onclick="visiblePasswordAdmin()"></span>
                        </div>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 position-relative">
                        <label for="new_password_confirmation" class="form-label"><b>Confirm
                                Password</b></label>
                        <div class="position-relative">
                            <input type="password" class="form-control input-glass text-white py-2 pe-5"
                                id="new_password_confirmation" placeholder="*****" name="new_password_confirmation"
                                minlength="8" value="{{ old('new_password_confirmation') }}" required>
                            <span
                                class="fa fa-fw fa-eye field-icon toggle-password position-absolute top-50 end-0 translate-middle-y me-3"
                                onclick="visiblePasswordAdminConfirmation()"></span>
                        </div>
                        @error('new_password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Save Change</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
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

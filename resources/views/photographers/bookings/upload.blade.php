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
                                <th>Status</th>
                                <th>Images Upload</th>
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
                                    <td><span class="chip-status chip-paid">Paid</span></td>
                                    <td>
                                        <button type="button" class="btn btn-primary w-100" data-toggle="modal"
                                            data-target="#uploadPhotoModal_{{ $booking->id }}">
                                            <i class="bi bi-cloud-upload"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>




                    {{-- <div class="text-center">
                        <h1>Bootstrap Modal with File Upload & emoji-picker and Preview (example)
                        </h1>
                        <!-- Button trigger modal   -->
                        <button type="button" class="btn btn-primary modalTrigger" data-toggle="modal"
                            data-target="#exampleModal">
                            Launch modal
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="indicator"></div>
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="media mb-3">
                                            <img src="https://s3.amazonaws.com/creativetim_bucket/new_logo.png"
                                                class="mr-3 images" alt="...">
                                            <div class="media-body">
                                                <textarea class="autosize" placeholder="add..." rows="1" id="note" data-emoji="true"></textarea>
                                                <div class="position-relative">
                                                    <input type="file" class="d-none"
                                                        accept="audio/*|video/*|video/x-m4v|video/webm|video/x-ms-wmv|video/x-msvideo|video/3gpp|video/flv|video/x-flv|video/mp4|video/quicktime|video/mpeg|video/ogv|.ts|.mkv|image/*|image/heic|image/heif"
                                                        onchange="previewFiles()" id="inputUp" multiple>
                                                    <a class="mediaUp mr-4"><i class="material-icons mr-2"
                                                            data-tippy="add (Video, Audio, Photo)"
                                                            onclick="trgger('inputUp')">perm_media</i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-md-12 ml-auto mr-auto preview"></div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm"
                                            data-dismiss="modal">Close</button>
                                        <span class="btn btn-info btn-sm" disabled>Save changes</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
    </div>
    <!-- Upload Photo Modal -->
    @foreach ($bookings as $booking)
        <div class="modal fade" id="uploadPhotoModal_{{ $booking->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5 class="modal-title">Upload Photo Result</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form id="uploadForm" action="{{ url('photographers/photo-result/' . $booking->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                        <input type="hidden" name="photographer_id" value="{{ Auth::user('id') }}">
                        <input type="hidden" name="status" value="1">
                        <div class="modal-body">
                            <div class="mt-3">
                                <label for="photo_link" class="form-label">Photo Link <small><i>(must be drive
                                            link)</i></small></label>
                                <input type="text" name="photo_link" id="photo_link" class="form-control">
                            </div>
                            {{-- <div id="dropArea" class="border border-2 rounded p-5 text-center"
                                style="border-style: dashed;">
                                <h6>Drag & Drop your images here</h6>
                                <p class="text-muted">or click to browse</p>
                                <input type="file" name="photo[]" id="fileInput" class="d-none" multiple
                                    accept="image/*">
                                <button type="button" id="triggerBtn" class="btn btn-primary mt-3">
                                    Choose Files
                                </button>
                            </div>
                            <div id="preview" class="row mt-4 g-3"></div> --}}
                        </div>
                        <div class="modal-footer border-0">
                            <button class="btn btn-success" type="submit">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <!-- End Modal -->
@endsection
@push('scripts')
    <script>
        // submit review
        document.querySelectorAll('form[action*="/photographers/photo-result/"]').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Submit Upload Link?',
                    text: 'Are you sure your image link is correct?',
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

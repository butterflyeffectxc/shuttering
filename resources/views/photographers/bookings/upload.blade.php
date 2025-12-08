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
                                <th>Customer Name</th>
                                <th>Date</th>
                                <th>Duration</th>
                                <th>Location</th>
                                <th>Photo Type</th>
                                <th>Status</th>
                                <th>Upload Gambar</th>
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
                                    <td>{{ $booking->status }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary w-100" data-toggle="modal"
                                            data-target="#uploadModal">
                                            <i class="bi bi-cloud-upload"></i>
                                        </button>
                                        <!-- Upload Modal -->
                                        <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Add Content</h5>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            <span>&times;</span>
                                                        </button>
                                                    </div>

                                                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-body">

                                                            <div class="media mb-3">
                                                                <img src="https://s3.amazonaws.com/creativetim_bucket/new_logo.png"
                                                                    class="mr-3 images">

                                                                <div class="media-body">
                                                                    <textarea name="note" class="autosize" placeholder="add..." rows="1" id="note" data-emoji="true"></textarea>

                                                                    <div class="position-relative mt-2">
                                                                        <input type="file" name="inputUp[]"
                                                                            class="d-none inputUp"
                                                                            id="inputUp-{{ $booking->id }}" multiple
                                                                            accept="audio/*,video/*,image/*">
                                                                        <a class="mediaUp mr-4" role="button"
                                                                            onclick="document.getElementById('inputUp-{{ $booking->id }}').click()">
                                                                            <i class="bi bi-cloud-upload"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row col-md-12 preview"></div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-sm"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-info btn-sm">Save
                                                                changes</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal -->
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
@endsection

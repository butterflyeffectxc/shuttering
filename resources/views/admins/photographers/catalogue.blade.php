@extends('layouts.admin')
@section('contentCms')
    <div class="page-heading">
        <h3>Photographer Detail</h3>
    </div>
    <div class="page-content">
        <div class="card">
            <div class="card-header mb-2">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">
                        Catalogue
                    </h5>
                    <div class="ml-auto">
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{-- @forelse ($catalogues as $catalogue)
                    <img src="{{ asset('catalogue/' . $catalogue->photo) }}" alt="" width="250">
                @empty
                    <p>You have no image catalogue at the moment.</p>
                    @endforelse --}}
                <div class="row g-4">
                    @forelse ($catalogues as $catalogue)
                        <div class="col-md-4 col-lg-3 col-12">
                            <div class="catalogue-card position-relative">
                                {{-- IMAGE --}}
                                <img src="{{ asset('catalogue/' . $catalogue->photo) }}"
                                    class="img-fluid rounded catalogue-img">
                            </div>
                        </div>
                    @empty
                        <p>Photographer have no image catalogue at the moment.</p>
                    @endforelse
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ url('admins/photographers/detail/' . $photographer->id) }}"
                        class="btn btn-primary back-button"><span>Back</span></a>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        // drag and drop upload image start
        const dropArea = document.getElementById("dropArea");
        const fileInput = document.getElementById("fileInput");
        const preview = document.getElementById("preview");
        const triggerBtn = document.getElementById("triggerBtn");

        triggerBtn.onclick = () => fileInput.click();

        // Drag events
        dropArea.addEventListener("dragover", (e) => {
            e.preventDefault();
            dropArea.classList.add("bg-light");
        });

        dropArea.addEventListener("dragleave", () => {
            dropArea.classList.remove("bg-light");
        });

        dropArea.addEventListener("drop", (e) => {
            e.preventDefault();
            dropArea.classList.remove("bg-light");

            const files = e.dataTransfer.files;
            fileInput.files = files;

            showPreview(files);
        });

        fileInput.addEventListener("change", function() {
            showPreview(this.files);
        });

        function showPreview(files) {
            preview.innerHTML = "";

            Array.from(files).forEach((file) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML += `
                    <div class="col-3">
                        <img src="${e.target.result}" 
                             class="img-fluid rounded shadow-sm">
                    </div>`;
                };
                reader.readAsDataURL(file);
            });
        }
        // drag and drop upload image end
        // upload alert start
        document.querySelectorAll('form[action*="/photographers/catalogue/"]').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Submit Image?',
                    text: 'Are you sure your image is correct?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Submit',
                    cancelButtonText: 'Cancel'
                }).then(result => {
                    if (result.isConfirmed) this.submit();
                });
            });
        });
        // upload alert end
        // upload alert start
        document.querySelectorAll('form[action*="/photographers/catalogue/delete"]').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Delete Image?',
                    text: 'Are you sure you want to delete this image?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Submit',
                    cancelButtonText: 'Cancel'
                }).then(result => {
                    if (result.isConfirmed) this.submit();
                });
            });
        });
        // upload alert end
    </script>
@endpush

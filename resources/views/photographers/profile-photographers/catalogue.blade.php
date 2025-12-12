  <div class="modal fade" id="uploadPhotoModal_{{ $booking->id }}" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
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
                  <div class="modal-body">
                      {{-- Drag & Drop Area --}}
                      <div id="dropArea" class="border border-2 rounded p-5 text-center" style="border-style: dashed;">
                          <h6>Drag & Drop your images here</h6>
                          <p class="text-muted">or click to browse</p>
                          <input type="file" name="photo[]" id="fileInput" class="d-none" multiple accept="image/*">
                          <button type="button" id="triggerBtn" class="btn btn-primary mt-3">
                              Choose Files
                          </button>
                      </div>
                      {{-- Preview --}}
                      <div id="preview" class="row mt-4 g-3"></div>
                  </div>
                  <div class="modal-footer border-0">
                      <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <button class="btn btn-success" type="submit">Upload</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
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
      </script>
  @endpush

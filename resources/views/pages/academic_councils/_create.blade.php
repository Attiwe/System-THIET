@include('include.validation')
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <div class="modal-header text-white">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel">
          <i class="bi bi-folder-plus"></i> إضافة مجلس أكاديمي
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route('academic.councils.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="row g-3">
            <div class="col-md-8">
              <label for="pdf" class="form-label fw-bold">
                <i class="bi bi-paperclip text-info"></i> ملف PDF <span class="text-danger">*</span>
              </label>
              <input type="file" class="form-control form-control-lg" id="pdf" name="pdf" accept=".pdf" required>
              <small class="text-muted">الامتداد المسموح: PDF فقط — الحد الأقصى 10MB</small>
            </div>

            <div class="col-md-4 d-flex align-items-end">
              <div id="chosenFileName" class="text-muted small w-100 text-break"></div>
            </div>
          </div>

          <div class="modal-footer border-top-0 mt-3">
            <button type="submit" class="btn btn-success px-4">
              <i class="bi bi-save"></i> حفظ
            </button>
            <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
              <i class="bi bi-x-circle"></i> إغلاق
            </button>
          </div>
        </form>
      </div>

      <script>
        document.getElementById('pdf').addEventListener('change', function(e) {
          const file = e.target.files && e.target.files[0];
          const out = document.getElementById('chosenFileName');
          
          if (file) {
            // Validate file type
            if (file.type !== 'application/pdf') {
              alert('يرجى اختيار ملف PDF فقط');
              this.value = '';
              out.textContent = '';
              return;
            }
            
            // Validate file size (10MB = 10 * 1024 * 1024 bytes)
            if (file.size > 10485760) {
              alert('حجم الملف يجب أن يكون أقل من 10 ميجابايت');
              this.value = '';
              out.textContent = '';
              return;
            }
            
            out.textContent = 'الملف المختار: ' + file.name;
            out.className = 'text-success small w-100 text-break';
          } else {
            out.textContent = '';
            out.className = 'text-muted small w-100 text-break';
          }
        });
      </script>

    </div>
  </div>
</div>

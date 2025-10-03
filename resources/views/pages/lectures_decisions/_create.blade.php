@include('include.validation')
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <div class="modal-header text-white">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel">
          <i class="bi bi-file-earmark-plus"></i> إضافة قرار محاضرات
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route('lectures-decisions.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="row g-3">
            <div class="col-md-6">
              <label for="unit_id" class="form-label fw-bold">
                <i class="bi bi-diagram-3 text-primary"></i> الوحدة <span class="text-danger">*</span>
              </label>
              <select class="form-select form-select-lg" id="unit_id" name="unit_id" required>
                <option value="" selected>اختر الوحدة</option>
                @foreach($units as $unit)
                  <option value="{{ $unit->id }}" {{ old('unit_id') == $unit->id ? 'selected' : '' }}>{{ $unit->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-md-6">
              <label for="title" class="form-label fw-bold">
                <i class="bi bi-card-text text-success"></i> العنوان <span class="text-danger">*</span>
              </label>
              <input type="text" class="form-control form-control-lg" id="title" name="title" placeholder="مثال: قرارات الأسبوع الأول" value="{{ old('title') }}" required>
            </div>

            <div class="col-md-8">
              <label for="file_path" class="form-label fw-bold">
                <i class="bi bi-paperclip text-info"></i> الملف <span class="text-danger">*</span>
              </label>
              <input type="file" class="form-control form-control-lg" id="file_path" name="file_path" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg,.webp" required>
              <small class="text-muted">الامتدادات المسموحة: pdf, doc, docx, png, jpg, jpeg, webp — الحد الأقصى 5MB</small>
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
        (function(){
          const input = document.getElementById('file_path');
          const out = document.getElementById('chosenFileName');
          if (input && out) {
            input.addEventListener('change', function(e){
              const file = e.target.files && e.target.files[0];
              out.textContent = file ? ('الملف المختار: ' + file.name) : '';
            });
          }
        })();
      </script>

    </div>
  </div>
</div>



@include('include.validation')
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <div class="modal-header text-white">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel">
          <i class="bi bi-journal-plus"></i> إضافة دورة تدريبية
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route('training-courses.store') }}" method="POST" enctype="multipart/form-data">
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
              <label for="workshop_name" class="form-label fw-bold">
                <i class="bi bi-card-text text-success"></i> اسم الورشة <span class="text-danger">*</span>
              </label>
              <input type="text" class="form-control form-control-lg" id="workshop_name" name="workshop_name" placeholder="مثال: ورشة تدريب على البرمجة" value="{{ old('workshop_name') }}" required>
            </div>

            <div class="col-md-6">
              <label for="lecturer_name" class="form-label fw-bold">
                <i class="bi bi-person text-info"></i> اسم المحاضر <span class="text-danger">*</span>
              </label>
              <input type="text" class="form-control form-control-lg" id="lecturer_name" name="lecturer_name" placeholder="مثال: د. أحمد علي" value="{{ old('lecturer_name') }}" required>
            </div>

            <div class="col-md-6">
              <label for="image" class="form-label fw-bold">
                <i class="bi bi-image text-danger"></i> الصورة <span class="text-danger">*</span>
              </label>
              <input type="file" class="form-control form-control-lg" id="image" name="image" accept="image/*" required>
              <small class="text-muted">الامتدادات المسموحة: jpg, jpeg, png, webp — الحد الأقصى 5MB</small>
            </div>

            <div class="col-12">
              <label for="details" class="form-label fw-bold">
                <i class="bi bi-text-paragraph text-warning"></i> التفاصيل <span class="text-danger">*</span>
              </label>
              <textarea class="form-control" id="details" name="details" rows="4" placeholder="اكتب نبذة مختصرة عن محتوى الدورة" required>{{ old('details') }}</textarea>
            </div>

            <div class="col-12">
              <div class="d-flex align-items-center gap-3">
                <div class="border rounded p-2 bg-light" style="width: 120px; height: 120px; display:flex; align-items:center; justify-content:center;">
                  <img id="createImagePreview" src="" alt="preview" style="max-width:100%; max-height:100%; object-fit:cover; display:none; border-radius:6px;">
                </div>
                <div class="text-muted small">معاينة الصورة ستظهر هنا بعد اختيار ملف</div>
              </div>
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
          const input = document.getElementById('image');
          const preview = document.getElementById('createImagePreview');
          if (input) {
            input.addEventListener('change', function(e){
              const file = e.target.files && e.target.files[0];
              if (!file) { preview.style.display = 'none'; return; }
              const reader = new FileReader();
              reader.onload = function(evt){
                preview.src = evt.target.result;
                preview.style.display = 'block';
              };
              reader.readAsDataURL(file);
            });
          }
        })();
      </script>

    </div>
  </div>
</div>



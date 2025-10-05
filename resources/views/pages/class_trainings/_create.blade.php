 @include('include.validation')
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <!-- Header -->
      <div class="modal-header text-white" style="background: linear-gradient(135deg, #667eea 0%,rgb(93, 155, 173) 100%);">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel">
          <i class="bi bi-mortarboard"></i> إضافة تدريب صفي
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Body -->
      <div class="modal-body">
        <form action="{{ route('classTrainings.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <!-- القسم -->
          <div class="mb-3">
            <label for="department_id" class="form-label fw-bold">
              <i class="bi bi-building text-primary"></i> القسم
            </label>
            <select class="form-select form-select-lg" id="department_id" name="department_id" required>
              <option value="" selected>اختر القسم</option>
              @foreach ($departments as $department)
                <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                  {{ $department->name }}
                </option>
              @endforeach
            </select>
          </div>

          <!-- اسم التدريب الصفي -->
          <div class="mb-3">
            <label for="class_name" class="form-label fw-bold">
              <i class="bi bi-mortarboard text-success"></i> اسم التدريب الصفي
            </label>
            <input type="text" class="form-control form-control-lg" id="class_name" name="class_name" 
                   value="{{ old('class_name') }}" placeholder="أدخل اسم التدريب الصفي" required>
          </div>

          <!-- صورة التدريب الصفي -->
          <div class="mb-3">
            <label for="class_image" class="form-label fw-bold">
              <i class="bi bi-image text-info"></i> صورة التدريب الصفي
            </label>
            <input type="file" class="form-control form-control-lg" id="class_image" name="class_image" accept="image/*">
            <div class="form-text">صيغ مقبولة: JPG, PNG, GIF - الحد الأقصى 5 ميجابايت</div>
          </div>


          <!-- Footer -->
          <div class="modal-footer border-top-0">
            <button type="submit" class="btn btn-success px-4">
              <i class="bi bi-save"></i> حفظ
            </button>
            <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
              <i class="bi bi-x-circle"></i> إغلاق
            </button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

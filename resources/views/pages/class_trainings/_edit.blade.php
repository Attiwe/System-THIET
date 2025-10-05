<!-- Modal Edit -->
<div class="modal fade" id="editModal{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <!-- Header -->
        <div class="modal-header text-white" style="background: linear-gradient(135deg, #667eea 0%,rgb(93, 155, 173) 100%);">
        <h5 class="modal-title fw-bold" id="editModalLabel{{ $item->id }}">
          <i class="bi bi-pencil-square"></i> تعديل تدريب صفي
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Body -->
      <div class="modal-body">
        <form action="{{ route('classTrainings.update', $item->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <!-- القسم -->
          <div class="mb-3">
            <label for="department_id_{{ $item->id }}" class="form-label fw-bold">
              <i class="bi bi-building text-primary"></i> القسم
            </label>
            <select class="form-select form-select-lg" id="department_id_{{ $item->id }}" name="department_id" required>
              <option value="">اختر القسم</option>
              @foreach ($departments as $department)
                <option value="{{ $department->id }}" {{ $item->department_id == $department->id ? 'selected' : '' }}>
                  {{ $department->name }}
                </option>
              @endforeach
            </select>
          </div>

          <!-- اسم التدريب الصفي -->
          <div class="mb-3">
            <label for="class_name_{{ $item->id }}" class="form-label fw-bold">
              <i class="bi bi-mortarboard text-success"></i> اسم التدريب الصفي
            </label>
            <input type="text" class="form-control form-control-lg" id="class_name_{{ $item->id }}" name="class_name" 
                   value="{{ $item->class_name }}" placeholder="أدخل اسم التدريب الصفي" required>
          </div>

          <!-- صورة التدريب الصفي -->
          <div class="mb-3">
            <label for="class_image_{{ $item->id }}" class="form-label fw-bold">
              <i class="bi bi-image text-info"></i> صورة التدريب الصفي
            </label>
            <input type="file" class="form-control form-control-lg" id="class_image_{{ $item->id }}" name="class_image" accept="image/*">
            @if($item->class_image)
              <div class="form-text">
                الصورة الحالية: <a href="{{ route('classTrainings.showImage', $item->id) }}" target="_blank" class="text-primary">عرض الصورة</a>
              </div>
            @else
              <div class="form-text">لا توجد صورة مرفقة حالياً</div>
            @endif
            <div class="form-text">صيغ مقبولة: JPG, PNG, GIF - الحد الأقصى 5 ميجابايت</div>
          </div>


          <!-- Footer -->
          <div class="modal-footer border-top-0">
            <button type="submit" class="btn btn-success px-4">
              <i class="bi bi-save"></i> حفظ التعديلات
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

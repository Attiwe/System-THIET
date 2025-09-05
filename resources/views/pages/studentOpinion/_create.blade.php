@include('include.validation')
<!-- Modal -->
<div class="modal fade" id="createStudent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="createStudentLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content rounded-3 border-0 shadow">

      <div class="modal-header text-white py-3 px-4">
        <h3 class="modal-title text-dark font-weight-bold" id="createStudentLabel">
          <i class="bi bi-person-plus me-2"></i> إضافة اراء طالب
        </h3>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('studentOpinions.store') }}" method="POST" class="p-4" enctype="multipart/form-data">
        @csrf

       <div class="row">
          <div class="mb-3 col-md-6">
            <label for="name" class="form-label fw-bold">
              <i class="bi bi-calendar-date text-primary me-2"></i> الاسم
            </label>
            <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{ old('name') }} " required
              placeholder=" ادخل الاسم ">
          </div>
          
          <div class="mb-3 col-md-6">
            <label for="is_active" class="form-label fw-bold">
              <i class="bi bi-toggle-on text-success me-2"></i> الحالة
            </label>
          
            <select class="form-select form-select-lg" id="is_active" name="is_active" required>
              <option value="" selected>اختر الحالة</option>
              <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>مفعل</option>
              <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>غير مفعل</option>
            </select>
          </div>

       </div>

        <div class="mb-3">
          <label for="image" class="form-label fw-bold">
            <i class="bi bi-image text-primary me-2"></i> الصوره
          </label>
          <input type="file" class="form-control form-control-lg" id="image" name="image" required
            placeholder=" ادخل الصوره ">
        </div>

        
        <div class="mb-3">
          <label for="details" class="form-label fw-bold">
            <i class="bi bi-chat text-primary me-2"></i> التفاصيل
          </label>
          <textarea class="form-control form-control-lg" id="details" name="details" rows="3"
            placeholder=" ادخل التفاصيل ان وجدت ">{{ old('details') }}</textarea>
        </div>

        <div class="modal-footer  border-top-0">
          <button type="submit" class="btn btn-success text-white px-4">
            <i class="bi bi-save me-2"></i> حفظ
          </button>
          <button type="button" class="btn btn-danger text-white px-4" data-bs-dismiss="modal">
            <i class="bi bi-x-circle me-2"></i> إغلاق
          </button>
        </div>
      </form>

    </div>
  </div>
</div>
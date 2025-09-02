 @include('include.validation')
 <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <div class="modal-header text-white">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel">
          <i class="bi bi-calendar-week"></i> إضافة نموذج جوده
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route('quality_form.store') }}" method="POST">
          @csrf
         <div class="mb-3">
            <label for="name" class="form-label fw-bold">
              <i class="bi bi-calendar-date text-primary"></i> اسم النموذج
            </label>
            <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{ old('name') }} " required placeholder=" ادخل اسم النموذج ">
          </div>

           <div class="mb-3">
            <label for="is_active" class="form-label fw-bold">
              <i class="bi bi-toggle-on text-success"></i> الحالة 
            </label>

            <select class="form-select form-select-lg" id="is_active" name="is_active" required>
              <option value="" selected>اختر الحالة</option>
              <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>مفعل</option>
              <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>غير مفعل</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="description" class="form-label fw-bold">
              <i class="bi bi-chat text-primary"></i> الملاحظات
            </label>
            <textarea class="form-control form-control-lg" id="description" name="description" rows="2" placeholder=" ادخل الملاحظات ان وجدت " >{{ old('description') }}</textarea> 
          </div>

          <div class="modal-footer border-top-0">
            <button type="submit" class="btn btn-success px-4">
              <i class="bi bi-save"></i> حفظ
            </button>
            <button type="button" class="btn btn-danger px-4" data-bs-dismiss="modal">
              <i class="bi bi-x-circle"></i> إغلاق
            </button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
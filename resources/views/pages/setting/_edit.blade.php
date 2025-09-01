 @include('include.validation')
 <div class="modal fade" id="editModal{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <div class="modal-header text-white">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel">
          <i class="bi bi-calendar-week"></i> تعديل سنة دراسية
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route('academic_years.update', $item->id) }}" method="POST">
          @csrf
          @method('PUT')  
          <input type="hidden" name="id" value="{{ $item->id }}">

          <div class="mb-3">
            <label for="year" class="form-label fw-bold">
              <i class="bi bi-calendar-date text-primary"></i> السنة الدراسية
            </label>
            <input type="text" class="form-control form-control-lg text-danger" id="year" name="year" value="{{ $item->year }} "
              required>

          </div>

          <div class="mb-3">
            <label for="is_active" class="form-label fw-bold">
              <i class="bi bi-toggle-on text-success"></i> الحالة
            </label>
            <select class="form-select form-select-lg" id="is_active" name="is_active" required>
              <option value="" selected>اختر الحالة</option>
              <option value="1" {{ $item->is_active == '1' ? 'selected' : '' }}>مفعل</option>
              <option value="0" {{ $item->is_active == '0' ? 'selected' : '' }}>غير مفعل</option>
            </select>

          </div>

          <div class="modal-footer border-top-0">
            <button type="submit" class="btn btn-success px-4">
              <i class="bi bi-save"></i>  حفظ
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
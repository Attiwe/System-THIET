@include('include.validation')
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <div class="modal-header text-white">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel">
          <i class="bi bi-diagram-3"></i> إضافة ملف مجلس الإدارة
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route('management-boards.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="mb-3">
            <label for="unit_id" class="form-label fw-bold">
              <i class="bi bi-diagram-3 text-primary"></i> الوحدة
            </label>
            <select class="form-select form-select-lg" id="unit_id" name="unit_id" required>
              <option value="" selected>اختر الوحدة</option>
              @foreach($units as $unit)
                <option value="{{ $unit->id }}" {{ old('unit_id') == $unit->id ? 'selected' : '' }}>{{ $unit->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label for="file_path" class="form-label fw-bold">
              <i class="bi bi-paperclip text-success"></i> الملف
            </label>
            <input type="file" class="form-control form-control-lg" id="file_path" name="file_path" required>
          </div>

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



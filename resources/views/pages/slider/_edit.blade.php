<div class="modal fade" id="editModal{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <div class="modal-header text-white">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel">
          <i class="bi bi-calendar-week"></i> تعديل صوره سلايدر
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route('slider.update', $item->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="card-body">
            <div class="mb-3">
              <label for="title" class="form-label fw-bold">
                <i class="bi bi-card-text text-info"></i> العنوان
              </label>
              <input type="text" class="form-control form-control-lg" id="title" name="title" value="{{ $item->title }}"
                required>
            </div>
            <br>
            <div class="mb-3">
              <label for="image_slider" class="form-label fw-bold">
                <i class="bi bi-image text-warning"></i> صوره السلايدر
              </label>
              <input type="file" class="form-control form-control-lg" id="image_slider"
                value="{{ $item->image_slider }}" name="image_slider">
            </div>
            <br>
            <div class="mb-3">
              <label for="is_active" class="form-label fw-bold">
                <i class="bi bi-toggle-on text-success"></i> الحالة
              </label>
              <select class="form-select form-select-lg" id="is_active" name="is_active" required>
                <option value="" selected disabled>اختر الحالة</option>
                <option value="1" {{ $item->is_active == 1 ? 'selected' : '' }}>مفعل</option>
                <option value="0" {{ $item->is_active == 0 ? 'selected' : '' }}>غير مفعل</option>
              </select>

            </div>
            <br>

            <div class="modal-footer border-top-0">
              <button type="submit" class="btn btn-success px-4">
                <i class="bi bi-save"></i> حفظ
              </button>
              <button type="button" class="btn btn-outline-danger px-4" data-bs-dismiss="modal">
                <i class="bi bi-x-circle"></i> إغلاق
              </button>
            </div>
          </div>
        </form>

      </div>

    </div>
  </div>
</div>
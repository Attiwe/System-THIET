 <div class="modal fade" id="editModal{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <div class="modal-header text-white">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel">
          <i class="bi bi-calendar-week"></i> تعديل اراء طالب
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route('studentOpinions.update', $item->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <input type="hidden" name="id" value="{{ $item->id }}">
          <div class="card-body">
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="name" class="form-label fw-bold">
                  <i class="bi bi-calendar-date text-primary me-2"></i> الاسم
                </label>
                <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{ $item->name }} "
                  required placeholder=" ادخل الاسم ">
              </div>

              <div class="mb-3 col-md-6">
                <label for="is_active" class="form-label fw-bold">
                  <i class="bi bi-toggle-on text-success me-2"></i> الحالة
                </label>

                <select class="form-select form-select-lg" id="is_active" name="is_active" required>
                  <option value="" selected>اختر الحالة</option>
                  <option value="1" {{  $item->is_active == '1' ? 'selected' : '' }}>مفعل</option>
                  <option value="0" {{ $item->is_active == '0' ? 'selected' : '' }}>غير مفعل</option>
                </select>
              </div>

            </div>

            <div class="mb-3">
              <label for="image" class="form-label fw-bold">
                <i class="bi bi-image text-primary me-2"></i> الصوره
              </label>
              <input type="file" class="form-control form-control-lg" id="image" name="image"  value="{{ $item->image }}"  
                placeholder=" ادخل الصوره ">
                <img src="{{ asset('image/studentOpinions/' . $item->image) }}" alt="{{ $item->name }}" class="img-fluid rounded-circle" style="width: 60px; height: 60px; object-fit: cover;">
            </div>


            <div class="mb-3">
              <label for="details" class="form-label fw-bold">
                <i class="bi bi-chat text-primary me-2"></i> التفاصيل
              </label>
              <textarea class="form-control form-control-lg" id="details" name="details" rows="3"
                placeholder=" ادخل التفاصيل ان وجدت ">{{ $item->details }}</textarea>
            </div>

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
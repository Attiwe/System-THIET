@include('include.validation')
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <div class="modal-header  text-white">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel">
          <i class="bi bi-star-fill me-2"></i> إضافة عناصر جودة
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route('featured_work.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

           <div class="row">
            <div class="col-md-6 mb-3">
              <label for="name" class="form-label fw-bold">
                <i class="bi bi-person-circle text-primary"></i> اسم الطالب / الطالبة
              </label>
              <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{ old('name') }}"
                required placeholder="ادخل اسم الطالب / الطالبة">
            </div>

            <div class="col-md-6 mb-3">
              <label for="title" class="form-label fw-bold">
                <i class="bi bi-pencil-square text-success"></i> العنوان
              </label>
              <input type="text" class="form-control form-control-lg" id="title" name="title" value="{{ old('title') }}"
                required placeholder="ادخل عنوان النشاط">
            </div>
          </div>

           <div class="mb-3">
            <label for="image" class="form-label fw-bold">
              <i class="bi bi-image text-warning"></i> الصورة
            </label>
            <input type="file" class="form-control form-control-lg" id="image" name="image" value="{{ old('image') }}"
              required>
          </div>

           <div class="mb-3">
            <label for="details" class="form-label fw-bold">
              <i class="bi bi-card-text text-info"></i> التفاصيل
            </label>
            <textarea class="form-control form-control-lg" id="details" name="details" rows="3" required
              placeholder="ادخل التفاصيل">{{ old('details') }}</textarea>
          </div>

           <div class="mb-3">
            <label for="is_active" class="form-label fw-bold">
              <i class="bi bi-toggle-on text-danger"></i> الحالة
            </label>
            <select class="form-select form-select-lg" id="is_active" name="is_active" required>
              <option value="" selected disabled>اختر الحالة</option>
              <option value="1">مفعل</option>
              <option value="0">غير مفعل</option>
            </select>
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
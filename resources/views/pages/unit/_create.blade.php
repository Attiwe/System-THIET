@include('include.validation')
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <!-- Header -->
      <div class="modal-header text-white">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel">
          <i class="bi bi-calendar-week"></i> إضافة وحدة و مراكز
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Body -->
      <div class="modal-body">
        <form action="{{ route('unit.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="card-body">
            <div class="mb-3">
              <label for="name" class="form-label fw-bold">
                <i class="bi bi-calendar-date text-primary"></i> الاسم
              </label>
              <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{ old('name') }}"
                required placeholder="ادخل الاسم الوحدة" >
            </div>
            <br>
            <div class="mb-3">
              <label for="vision" class="form-label fw-bold">
                <i class="bi bi-eye-fill text-success"></i> رويه الوحدة
              </label>
              <textarea type="text" class="form-control form-control-lg" rows="3" id="vision" name="vision"
                value="{{ old('vision') }}" required placeholder="ادخل رويه الوحدة"></textarea>
            </div>
            <br>
            <div class="mb-3">
              <label for="message" class="form-label fw-bold">
                <i class="bi bi-chat-left-text-fill text-success"></i> رساله الوحدة
              </label>
              <textarea type="text" class="form-control form-control-lg" rows="3" id="message" name="message"
                value="{{ old('message') }}" required placeholder="ادخل رساله الوحدة"></textarea>
            </div>
            <br>
            <div class="mb-3">
              <label for="image" class="form-label fw-bold">
                <i class="bi bi-file-image text-success"></i> الصوره
              </label>
              <input type="file" class="form-control form-control-lg" id="image" name="image" required placeholder="اختر الصوره">
            </div>
            <!-- Footer -->
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
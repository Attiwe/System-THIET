@include('include.validation')
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <!-- Header -->
      <div class="modal-header text-white">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel">
          <i class="bi bi-calendar-week"></i> إضافة
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Body -->
      <div class="modal-body">
        <form action="{{ route('institute_mnagements.store') }}" method="POST">
          @csrf

          <!--  الاسم -->
          <div class="mb-3">
            <label for="name" class="form-label fw-bold">
              <i class="bi bi-calendar-date text-primary"></i> الاسم
            </label>
            <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{ old('name') }} "
              required>
          </div>
          <br>

          <div class="mb-3">
            <label for="type" class="form-label fw-bold">
              <i class="bi bi-toggle-on text-success"></i> الوظيفه
            </label>
            <select class="form-select form-select-lg" id="type" name="type" required>
              <option value="" selected disabled>اختر</option>
              @foreach(\App\Models\InstituteMnagement::$enumType as $enumValue)
                <option value="{{ $enumValue['value'] }}" {{ old('type') == $enumValue['value'] ? 'selected' : '' }}>
                  {{ $enumValue['label'] }}
                </option>
              @endforeach
            </select>
          </div>
          <br>

            <!-- الكلمه -->
            <div class="mb-3">
              <label for="description" class="form-label fw-bold">
                <i class="bi bi-calendar-date text-primary"></i> الكلمه
              </label>
              <textarea class="form-control form-control-lg" id="description" name="description"
                value="{{ old('description') }} " required></textarea>

            </div>
          </div>
          <br>

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
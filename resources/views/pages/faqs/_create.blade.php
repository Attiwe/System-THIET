 @include('include.validation')
 <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <!-- Header -->
      <div class="modal-header text-white">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel">
          <i class="bi bi-calendar-week"></i> إضافة سؤال
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Body -->
      <div class="modal-body">
        <form action="{{ route('faqs.store') }}" method="POST">
          @csrf

          <!-- القسم -->
          <div class="mb-3">
            <label for="department_id" class="form-label fw-bold">
              <i class="bi bi-calendar-date text-primary"></i> القسم
            </label>
            <select class="form-select form-select-lg" id="department_id" name="department_id" required>
              <option value="" selected>اختر القسم</option>
              @foreach($departments as $department)
                <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                  {{ $department->name }}
                </option>
              @endforeach
            </select>
          </div>
          <br>

          <!-- السؤال -->
          <div class="mb-3">
            <label for="question" class="form-label fw-bold">
              <i class="bi bi-calendar-date text-primary"></i> السؤال
            </label>
            <textarea type="text" class="form-control form-control-lg" id="question" name="question" value="{{ old('question') }} " required rows="3" placeholder="أدخل السؤال" ></textarea>
          </div>

          <!-- الإجابة -->
          <div class="mb-3">
            <label for="answer" class="form-label fw-bold">
              <i class="bi bi-calendar-date text-primary"></i> الإجابة
            </label>
            <textarea type="text" class="form-control form-control-lg" id="answer" name="answer" value="{{ old('answer') }} " required rows="3" placeholder="أدخل الإجابة"></textarea>
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
<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content" style="border-radius: 1rem; border: none;">
      <div class="modal-header" style="background: linear-gradient(135deg, #667eea 0%,rgb(143, 185, 162) 100%); color: white; border-radius: 1rem 1rem 0 0;">
        <h5 class="modal-title fw-bold" id="createModalLabel">
          <i class="bi bi-plus-square me-2"></i>  إضافة سريع - رسالة ماجستير/دكتوراه
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">
        @include('include.validation')
        <form action="{{ route('masterisDoctoralTheses.store') }}" method="POST" enctype="multipart/form-data" id="createForm">
          @csrf
          <div class="row g-3">
            <div class="col-md-6">
              <label for="doctor_name" class="form-label fw-bold text-primary">
                <i class="bi bi-person-fill me-1"></i>  اسم الدكتور
              </label>
              <input type="text" class="form-control" id="doctor_name" name="doctor_name" value="{{ old('doctor_name') }}"
                placeholder="أدخل اسم الدكتور" required>
            </div>

            <div class="col-md-6">
              <label for="type" class="form-label fw-bold text-primary">
                <i class="bi bi-tag me-1"></i>نوع الرسالة/الأطروحة
              </label>
              <select name="type" id="type" class="form-select" required>
                <option value="" selected>اختر النوع</option>
                <option value="master" {{ old('type') == 'master' ? 'selected' : '' }}>الماجستير</option>
                <option value="doctoral" {{ old('type') == 'doctoral' ? 'selected' : '' }}>الدكتوراه</option>
                <option value="other" {{ old('type') == 'other' ? 'selected' : '' }}>غير ذلك</option>
              </select>
            </div>
          </div>

          <br>

          <div class="row g-3">
            <div class="col-md-6">
              <label for="department_id" class="form-label fw-bold text-primary">
                <i class="bi bi-building me-1"></i>القسم
              </label>
              <select name="department_id" id="department_id" class="form-select" required>
                <option value="" selected>اختر القسم</option>
                @foreach ($departments as $department)
                  <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                    {{ $department->name }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="col-md-6">
              <label for="thesis_pdf" class="form-label fw-bold text-primary">
                <i class="bi bi-file-earmark-pdf me-1"></i>ملف الرسالة/الأطروحة
              </label>
              <input type="file" class="form-control" id="thesis_pdf" name="thesis_pdf" accept="application/pdf">
              <div class="form-text">ملف PDF فقط - الحد الأقصى 10 ميجابايت</div>
            </div>
          </div>
          <br>

          <div class="row g-3">
            <div class="col-12">
              <label for="title_thesis" class="form-label fw-bold text-primary">
                <i class="bi bi-journal-text me-1"></i>عنوان الرسالة/الأطروحة
              </label>
              <input type="text" class="form-control" id="title_thesis" name="title_thesis" value="{{ old('title_thesis') }}" 
                placeholder="أدخل عنوان الرسالة/الأطروحة" required>
            </div>
          </div>
          <br>

          <div class="row g-3">
            <div class="col-12">
              <label for="description" class="form-label fw-bold text-primary">
                <i class="bi bi-card-text me-1"></i>وصف الرسالة/الأطروحة
              </label>
              <textarea class="form-control" id="description" name="description" rows="4" 
                placeholder="أدخل وصف مفصل للرسالة/الأطروحة" required>{{ old('description') }}</textarea>
            </div>
          </div>

          <div class="d-flex justify-content-center gap-3 mt-4">
            <button type="submit" class="btn btn-success btn-lg px-4">
              <i class="bi bi-check-circle me-2"></i>إضافة رسالة
            </button>
            <button type="reset" class="btn btn-outline-secondary btn-lg px-4">
              <i class="bi bi-arrow-clockwise me-2"></i>إعادة تعيين
            </button>
          </div>
          <br>
        </form>
      </div>
      <div class="modal-footer">
        <a href="{{ route('masterisDoctoralTheses.create.page') }}" class="btn btn-outline-primary">
          <i class="bi bi-window me-2"></i>  فتح في صفحة منفصلة
        </a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          <i class="bi bi-x-circle me-2"></i>  إغلاق
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content" style="border-radius: 1rem; border: none;">
      <div class="modal-header" style="background: linear-gradient(135deg, #667eea 0%,rgb(143, 185, 162) 100%); color: white; border-radius: 1rem 1rem 0 0;">
        <h5 class="modal-title fw-bold" id="createModalLabel">
          <i class="bi bi-plus-square me-2"></i>  إضافة سريع - مشروع طلابي
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">
        @include('include.validation')
        <form action="{{ route('studentProjects.store') }}" method="POST" enctype="multipart/form-data" id="createForm">
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
          </div>

          <br>

          <div class="row g-3">
            <div class="col-12">
              <label for="project_name" class="form-label fw-bold text-primary">
                <i class="bi bi-lightbulb me-1"></i>اسم المشروع
              </label>
              <input type="text" class="form-control" id="project_name" name="project_name" value="{{ old('project_name') }}" 
                placeholder="أدخل اسم المشروع" required>
            </div>
          </div>
          <br>

          <div class="row g-3">
            <div class="col-12">
              <label for="description" class="form-label fw-bold text-primary">
                <i class="bi bi-card-text me-1"></i>وصف المشروع
              </label>
              <textarea class="form-control" id="description" name="description" rows="4" 
                placeholder="أدخل وصف مفصل للمشروع" required>{{ old('description') }}</textarea>
            </div>
          </div>
          <br>

          <div class="row g-3">
            <div class="col-md-6">
              <label for="image_work" class="form-label fw-bold text-primary">
                <i class="bi bi-image me-1"></i>صورة العمل
              </label>
              <input type="file" class="form-control" id="image_work" name="image_work" accept="image/*">
              <div class="form-text">صيغ مقبولة: JPG, PNG, GIF - الحد الأقصى 5 ميجابايت</div>
            </div>

            <div class="col-md-6">
              <label for="project_pdf" class="form-label fw-bold text-primary">
                <i class="bi bi-file-earmark-pdf me-1"></i>ملف المشروع
              </label>
              <input type="file" class="form-control" id="project_pdf" name="project_pdf" accept="application/pdf">
              <div class="form-text">ملف PDF فقط - الحد الأقصى 10 ميجابايت</div>
            </div>
          </div>

          <div class="d-flex justify-content-center gap-3 mt-4">
            <button type="submit" class="btn btn-success btn-lg px-4">
              <i class="bi bi-check-circle me-2"></i>إضافة مشروع
            </button>
            <button type="reset" class="btn btn-outline-secondary btn-lg px-4">
              <i class="bi bi-arrow-clockwise me-2"></i>إعادة تعيين
            </button>
          </div>
          <br>
        </form>
      </div>
      <div class="modal-footer">
        <a href="{{ route('studentProjects.create.page') }}" class="btn btn-outline-primary">
          <i class="bi bi-window me-2"></i>  فتح في صفحة منفصلة
        </a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          <i class="bi bi-x-circle me-2"></i>  إغلاق
        </button>
      </div>
    </div>
  </div>
</div>

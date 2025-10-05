@include('include.validation')
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <!-- Header -->
      <div class="modal-header text-white">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel">
          <i class="bi bi-plus-circle"></i> إضافة مشروع بحث جديد
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Body -->
      <div class="modal-body">
        <form action="{{ route('research_projects.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <!-- القسم -->
          <div class="mb-3">
            <label for="department_id" class="form-label fw-bold">
              <i class="bi bi-building text-primary"></i> القسم <span class="text-danger">*</span>
            </label>
            <select class="form-select form-select-lg" id="department_id" name="department_id" required>
              <option value="">اختر القسم</option>
              @foreach($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
              @endforeach
            </select>
          </div>

          <!-- اسم الدكتور -->
          <div class="mb-3">
            <label for="doctor_name" class="form-label fw-bold">
              <i class="bi bi-person-badge text-success"></i> اسم الدكتور <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control form-control-lg" id="doctor_name" name="doctor_name" 
                   value="{{ old('doctor_name') }}" required>
          </div>

          <!-- اسم البحث -->
          <div class="mb-3">
            <label for="research_name" class="form-label fw-bold">
              <i class="bi bi-journal-text text-info"></i> اسم البحث <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control form-control-lg" id="research_name" name="research_name" 
                   value="{{ old('research_name') }}" required>
          </div>

          <!-- عنوان البحث -->
          <div class="mb-3">
            <label for="research_title" class="form-label fw-bold">
              <i class="bi bi-card-heading text-warning"></i> عنوان البحث <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control form-control-lg" id="research_title" name="research_title" 
                   value="{{ old('research_title') }}" required>
          </div>

          <!-- ملخص البحث -->
          <div class="mb-3">
            <label for="research_summary" class="form-label fw-bold">
              <i class="bi bi-file-text text-secondary"></i> ملخص البحث
            </label>
            <textarea class="form-control form-control-lg" id="research_summary" name="research_summary" 
                      rows="3">{{ old('research_summary') }}</textarea>
          </div>

          <!-- ملف البحث -->
          <div class="mb-3">
            <label for="file_path" class="form-label fw-bold">
              <i class="bi bi-file-earmark text-danger"></i> ملف البحث
            </label>
            <input type="file" class="form-control form-control-lg" id="file_path" name="file_path" 
                   accept=".pdf,.doc,.docx">
            <div class="form-text">يُسمح بملفات PDF و Word فقط (حد أقصى 10 ميجابايت)</div>
          </div>

          <!-- صورة المشروع -->
          <div class="mb-3">
            <label for="image" class="form-label fw-bold">
              <i class="bi bi-image text-primary"></i> صورة المشروع
            </label>
            <input type="file" class="form-control form-control-lg" id="image" name="image" 
                   accept="image/*">
            <div class="form-text">يُسمح بالصور فقط (حد أقصى 2 ميجابايت)</div>
          </div>

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

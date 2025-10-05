@include('include.validation')
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <!-- Header -->
      <div class="modal-header text-white">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel">
          <i class="bi bi-file-earmark-plus"></i> إضافة خطة قسم
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- Body -->
      <div class="modal-body">
        <form action="{{ route('department_plans.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <!-- القسم -->
          <div class="mb-3">
            <label for="department_id" class="form-label fw-bold">
              <i class="bi bi-building text-primary"></i> القسم
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

        
         
          <!-- خطة البحث -->
          <div class="mb-3">
            <label for="research_plan" class="form-label fw-bold">
              <i class="bi bi-search text-warning"></i> خطة البحث
            </label>
            <input type="file" class="form-control form-control-lg" id="research_plan" name="research_plan" 
                   accept=".pdf,.doc,.docx">
            <small class="form-text text-muted">اختر ملف خطة البحث (PDF, DOC, DOCX)</small>
          </div>

          <!-- اللائحة الداخلية -->
          <div class="mb-3">
            <label for="law" class="form-label fw-bold">
              <i class="bi bi-book text-secondary"></i> اللائحة الداخلية
            </label>
            <input type="file" class="form-control form-control-lg" id="law" name="law" 
                   accept=".pdf,.doc,.docx">
            <small class="form-text text-muted">اختر ملف اللائحة الداخلية (PDF, DOC, DOCX)</small>
          </div>

          <!-- كتاب القسم -->
          <div class="mb-3">
            <label for="department_book" class="form-label fw-bold">
              <i class="bi bi-journal-text text-dark"></i> كتاب القسم
            </label>
            <input type="file" class="form-control form-control-lg" id="department_book" name="department_book" 
                   accept=".pdf,.doc,.docx">
            <small class="form-text text-muted">اختر ملف كتاب القسم (PDF, DOC, DOCX)</small>
          </div>

          <!-- المجلس -->
          <div class="mb-3">
            <label for="council" class="form-label fw-bold">
              <i class="bi bi-people text-success"></i> المجلس
            </label>
            <input type="file" class="form-control form-control-lg" id="council" name="council" 
                   accept=".pdf,.doc,.docx">
            <small class="form-text text-muted">اختر ملف المجلس (PDF, DOC, DOCX)</small>
          </div>

          <!-- المقررات الدراسية -->
          <div class="mb-3">
            <label for="courses" class="form-label fw-bold">
              <i class="bi bi-mortarboard text-primary"></i> المقررات الدراسية
            </label>
            <input type="file" class="form-control form-control-lg" id="courses" name="courses" 
                   accept=".pdf,.doc,.docx">
            <small class="form-text text-muted">اختر ملف المقررات الدراسية (PDF, DOC, DOCX)</small>
          </div>

          <!-- Footer -->
          <div class="modal-footer border-top-0">
            <button type="submit" class="btn btn-success px-4">
              <i class="bi bi-save"></i> حفظ
            </button>
            <button type="button" class="btn btn-secondary px-4" data-dismiss="modal">
              <i class="bi bi-x-circle"></i> إغلاق
            </button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

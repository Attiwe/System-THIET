@include('include.validation')
<div class="modal fade" id="editModal{{ $item->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <div class="modal-header text-white">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel">
          <i class="bi bi-file-earmark-plus"></i> تعديل خطة قسم
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="{{ route('department_plans.update', $item->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')  
          <input type="hidden" name="id" value="{{ $item->id }}">

          <!-- القسم -->
          <div class="mb-3">
            <label for="department_id" class="form-label fw-bold">
              <i class="bi bi-building text-primary"></i> القسم
            </label>
            <select class="form-select form-select-lg" id="department_id" name="department_id" required>
              <option value="" selected>اختر القسم</option>
              @foreach($departments as $department)
                <option value="{{ $department->id }}" {{ $item->department_id == $department->id ? 'selected' : '' }}>
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
            @if($item->research_plan)
              <div class="mb-2">
                <small class="text-muted">الملف الحالي:</small>
                <a href="{{ $item->research_plan_url }}" target="_blank" class="btn btn-outline-primary btn-sm ms-2">
                  <i class="bi bi-file-earmark-pdf-fill"></i> عرض الملف الحالي
                </a>
              </div>
            @endif
            <input type="file" class="form-control form-control-lg" id="research_plan" name="research_plan" 
                   accept=".pdf,.doc,.docx">
            <small class="form-text text-muted">اختر ملف جديد لاستبدال الملف الحالي (PDF, DOC, DOCX)</small>
          </div>

          <!-- اللائحة الداخلية -->
          <div class="mb-3">
            <label for="law" class="form-label fw-bold">
              <i class="bi bi-book text-secondary"></i> اللائحة الداخلية
            </label>
            @if($item->law)
              <div class="mb-2">
                <small class="text-muted">الملف الحالي:</small>
                <a href="{{ $item->law_url }}" target="_blank" class="btn btn-outline-success btn-sm ms-2">
                  <i class="bi bi-file-earmark-pdf-fill"></i> عرض الملف الحالي
                </a>
              </div>
            @endif
            <input type="file" class="form-control form-control-lg" id="law" name="law" 
                   accept=".pdf,.doc,.docx">
            <small class="form-text text-muted">اختر ملف جديد لاستبدال الملف الحالي (PDF, DOC, DOCX)</small>
          </div>

          <!-- كتاب القسم -->
          <div class="mb-3">
            <label for="department_book" class="form-label fw-bold">
              <i class="bi bi-journal-text text-dark"></i> كتاب القسم
            </label>
            @if($item->department_book)
              <div class="mb-2">
                <small class="text-muted">الملف الحالي:</small>
                <a href="{{ $item->department_book_url }}" target="_blank" class="btn btn-outline-info btn-sm ms-2">
                  <i class="bi bi-file-earmark-pdf-fill"></i> عرض الملف الحالي
                </a>
              </div>
            @endif
            <input type="file" class="form-control form-control-lg" id="department_book" name="department_book" 
                   accept=".pdf,.doc,.docx">
            <small class="form-text text-muted">اختر ملف جديد لاستبدال الملف الحالي (PDF, DOC, DOCX)</small>
          </div>

          <!-- المجلس -->
          <div class="mb-3">
            <label for="council" class="form-label fw-bold">
              <i class="bi bi-people text-success"></i> المجلس
            </label>
            @if($item->council)
              <div class="mb-2">
                <small class="text-muted">الملف الحالي:</small>
                <a href="{{ $item->council_url }}" target="_blank" class="btn btn-outline-warning btn-sm ms-2">
                  <i class="bi bi-file-earmark-pdf-fill"></i> عرض الملف الحالي
                </a>
              </div>
            @endif
            <input type="file" class="form-control form-control-lg" id="council" name="council" 
                   accept=".pdf,.doc,.docx">
            <small class="form-text text-muted">اختر ملف جديد لاستبدال الملف الحالي (PDF, DOC, DOCX)</small>
          </div>

          <!-- المقررات الدراسية -->
          <div class="mb-3">
            <label for="courses" class="form-label fw-bold">
              <i class="bi bi-mortarboard text-primary"></i> المقررات الدراسية
            </label>
            @if($item->courses)
              <div class="mb-2">
                <small class="text-muted">الملف الحالي:</small>
                <a href="{{ $item->courses_url }}" target="_blank" class="btn btn-outline-danger btn-sm ms-2">
                  <i class="bi bi-file-earmark-pdf-fill"></i> عرض الملف الحالي
                </a>
              </div>
            @endif
            <input type="file" class="form-control form-control-lg" id="courses" name="courses" 
                   accept=".pdf,.doc,.docx">
            <small class="form-text text-muted">اختر ملف جديد لاستبدال الملف الحالي (PDF, DOC, DOCX)</small>
          </div>

          <div class="modal-footer border-top-0">
            <button type="submit" class="btn btn-success px-4">
              <i class="bi bi-save"></i>  حفظ
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

<!-- Edit Modal -->
<div class="modal fade" id="editModal{{ $lab->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="editModalLabel{{ $lab->id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <!-- Header -->
      <div class="modal-header text-white">
        <h5 class="modal-title fw-bold" id="editModalLabel{{ $lab->id }}">
          <i class="bi bi-pencil-square"></i> تعديل المختبر
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Body -->
      <div class="modal-body">
        <form action="{{ route('labs.update', $lab->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <!-- القسم -->
          <div class="mb-3">
            <label for="department_id_edit{{ $lab->id }}" class="form-label fw-bold">
              <i class="bi bi-building text-primary"></i> القسم <span class="text-danger">*</span>
            </label>
            <select class="form-select form-select-lg" id="department_id_edit{{ $lab->id }}" name="department_id" required>
              <option value="">اختر القسم</option>
              @foreach($departments as $department)
                <option value="{{ $department->id }}" {{ $lab->department_id == $department->id ? 'selected' : '' }}>
                  {{ $department->name }}
                </option>
              @endforeach
            </select>
          </div>

          <!-- اسم المختبر -->
          <div class="mb-3">
            <label for="lab_name_edit{{ $lab->id }}" class="form-label fw-bold">
              <i class="bi bi-flask text-success"></i> اسم المختبر <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control form-control-lg" id="lab_name_edit{{ $lab->id }}" 
                   name="lab_name" value="{{ $lab->lab_name }}" required>
          </div>

          <!-- ملف المختبر الحالي -->
          @if($lab->lab_pdf)
            <div class="mb-3">
              <label class="form-label fw-bold">
                <i class="bi bi-file-earmark text-danger"></i> الملف الحالي
              </label>
              <div class="alert alert-info">
                <i class="bi bi-info-circle"></i>
                <strong>الملف الحالي:</strong> {{ $lab->lab_pdf }}
                <br>
                <button type="button" class="btn btn-sm btn-outline-primary mt-2" 
                        onclick="viewFile('{{ asset('storage/labs/' . $lab->lab_pdf) }}', '{{ $lab->lab_name }}')">
                  <i class="bi bi-eye"></i> عرض الملف الحالي
                </button>
              </div>
            </div>
          @endif

          <!-- ملف المختبر الجديد -->
          <div class="mb-3">
            <label for="lab_pdf_edit{{ $lab->id }}" class="form-label fw-bold">
              <i class="bi bi-file-earmark text-danger"></i> 
              {{ $lab->lab_pdf ? 'تحديث ملف المختبر' : 'ملف المختبر' }}
            </label>
            <input type="file" class="form-control form-control-lg" id="lab_pdf_edit{{ $lab->id }}" 
                   name="lab_pdf" accept=".pdf,.doc,.docx">
            <div class="form-text">يُسمح بملفات PDF و Word فقط (حد أقصى 10 ميجابايت)</div>
          </div>

          <!-- Footer -->
          <div class="modal-footer border-top-0">
            <button type="submit" class="btn btn-success px-4">
              <i class="bi bi-save"></i> حفظ التغييرات
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

<!-- Edit Modal -->
<div class="modal fade" id="editModal{{ $requirement->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="editModalLabel{{ $requirement->id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <!-- Header -->
      <div class="modal-header text-white">
        <h5 class="modal-title fw-bold" id="editModalLabel{{ $requirement->id }}">
          <i class="bi bi-pencil-square"></i> تعديل متطلبات البرنامج
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Body -->
      <div class="modal-body">
        <form action="{{ route('program_requirements.update', $requirement->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <!-- القسم -->
          <div class="mb-3">
            <label for="department_id_edit{{ $requirement->id }}" class="form-label fw-bold">
              <i class="bi bi-building text-primary"></i> القسم <span class="text-danger">*</span>
            </label>
            <select class="form-select form-select-lg" id="department_id_edit{{ $requirement->id }}" name="department_id" required>
              <option value="">اختر القسم</option>
              @foreach($departments as $department)
                <option value="{{ $department->id }}" {{ $requirement->department_id == $department->id ? 'selected' : '' }}>
                  {{ $department->name }}
                </option>
              @endforeach
            </select>
          </div>

          <!-- ملف متطلبات البرنامج الحالي -->
          @if($requirement->file_path)
            <div class="mb-3">
              <label class="form-label fw-bold">
                <i class="bi bi-file-earmark text-danger"></i> الملف الحالي
              </label>
              <div class="alert alert-info">
                <i class="bi bi-info-circle"></i>
                <strong>الملف الحالي:</strong> {{ $requirement->file_path }}
                <br>
                <button type="button" class="btn btn-sm btn-outline-primary mt-2" 
                        onclick="viewFile('{{ asset('storage/program_requirements/' . $requirement->file_path) }}', 'متطلبات البرنامج - {{ $requirement->department->name ?? 'غير محدد' }}')">
                  <i class="bi bi-eye"></i> عرض الملف الحالي
                </button>
              </div>
            </div>
          @endif

          <!-- ملف متطلبات البرنامج الجديد -->
          <div class="mb-3">
            <label for="file_path_edit{{ $requirement->id }}" class="form-label fw-bold">
              <i class="bi bi-file-earmark text-danger"></i> 
              {{ $requirement->file_path ? 'تحديث ملف متطلبات البرنامج' : 'ملف متطلبات البرنامج' }}
            </label>
            <input type="file" class="form-control form-control-lg" id="file_path_edit{{ $requirement->id }}" 
                   name="file_path" accept=".pdf,.doc,.docx">
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

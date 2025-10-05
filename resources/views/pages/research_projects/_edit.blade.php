<!-- Edit Modal -->
<div class="modal fade" id="editModal{{ $project->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="editModalLabel{{ $project->id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <!-- Header -->
      <div class="modal-header text-white">
        <h5 class="modal-title fw-bold" id="editModalLabel{{ $project->id }}">
          <i class="bi bi-pencil-square"></i> تعديل مشروع البحث
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Body -->
      <div class="modal-body">
        <form action="{{ route('research_projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <!-- القسم -->
          <div class="mb-3">
            <label for="department_id_edit{{ $project->id }}" class="form-label fw-bold">
              <i class="bi bi-building text-primary"></i> القسم <span class="text-danger">*</span>
            </label>
            <select class="form-select form-select-lg" id="department_id_edit{{ $project->id }}" name="department_id" required>
              <option value="">اختر القسم</option>
              @foreach($departments as $department)
                <option value="{{ $department->id }}" {{ $project->department_id == $department->id ? 'selected' : '' }}>
                  {{ $department->name }}
                </option>
              @endforeach
            </select>
          </div>

          <!-- اسم الدكتور -->
          <div class="mb-3">
            <label for="doctor_name_edit{{ $project->id }}" class="form-label fw-bold">
              <i class="bi bi-person-badge text-success"></i> اسم الدكتور <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control form-control-lg" id="doctor_name_edit{{ $project->id }}" 
                   name="doctor_name" value="{{ $project->doctor_name }}" required>
          </div>

          <!-- اسم البحث -->
          <div class="mb-3">
            <label for="research_name_edit{{ $project->id }}" class="form-label fw-bold">
              <i class="bi bi-journal-text text-info"></i> اسم البحث <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control form-control-lg" id="research_name_edit{{ $project->id }}" 
                   name="research_name" value="{{ $project->research_name }}" required>
          </div>

          <!-- عنوان البحث -->
          <div class="mb-3">
            <label for="research_title_edit{{ $project->id }}" class="form-label fw-bold">
              <i class="bi bi-card-heading text-warning"></i> عنوان البحث <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control form-control-lg" id="research_title_edit{{ $project->id }}" 
                   name="research_title" value="{{ $project->research_title }}" required>
          </div>

          <!-- ملخص البحث -->
          <div class="mb-3">
            <label for="research_summary_edit{{ $project->id }}" class="form-label fw-bold">
              <i class="bi bi-file-text text-secondary"></i> ملخص البحث
            </label>
            <textarea class="form-control form-control-lg" id="research_summary_edit{{ $project->id }}" 
                      name="research_summary" rows="3">{{ $project->research_summary }}</textarea>
          </div>

          <!-- ملف البحث الحالي -->
          @if($project->file_path)
            <div class="mb-3">
              <label class="form-label fw-bold">
                <i class="bi bi-file-earmark text-danger"></i> الملف الحالي
              </label>
              <div class="alert alert-info">
                <i class="bi bi-info-circle"></i>
                <strong>الملف الحالي:</strong> {{ $project->file_path }}
                <br>
                <button type="button" class="btn btn-sm btn-outline-primary mt-2" 
                        onclick="viewFile('{{ asset('storage/research_projects/' . $project->file_path) }}', '{{ $project->research_name }}')">
                  <i class="bi bi-eye"></i> عرض الملف الحالي
                </button>
              </div>
            </div>
          @endif

          <!-- ملف البحث الجديد -->
          <div class="mb-3">
            <label for="file_path_edit{{ $project->id }}" class="form-label fw-bold">
              <i class="bi bi-file-earmark text-danger"></i> 
              {{ $project->file_path ? 'تحديث ملف البحث' : 'ملف البحث' }}
            </label>
            <input type="file" class="form-control form-control-lg" id="file_path_edit{{ $project->id }}" 
                   name="file_path" accept=".pdf,.doc,.docx">
            <div class="form-text">يُسمح بملفات PDF و Word فقط (حد أقصى 10 ميجابايت)</div>
          </div>

          <!-- صورة المشروع الحالية -->
          @if($project->image)
            <div class="mb-3">
              <label class="form-label fw-bold">
                <i class="bi bi-image text-primary"></i> الصورة الحالية
              </label>
              <div class="text-center">
                <img src="{{ asset('storage/research_projects/images/' . $project->image) }}" 
                     alt="صورة المشروع" class="rounded" style="max-width: 200px; max-height: 150px; object-fit: cover;">
              </div>
            </div>
          @endif

          <!-- صورة المشروع الجديدة -->
          <div class="mb-3">
            <label for="image_edit{{ $project->id }}" class="form-label fw-bold">
              <i class="bi bi-image text-primary"></i> 
              {{ $project->image ? 'تحديث صورة المشروع' : 'صورة المشروع' }}
            </label>
            <input type="file" class="form-control form-control-lg" id="image_edit{{ $project->id }}" 
                   name="image" accept="image/*">
            <div class="form-text">يُسمح بالصور فقط (حد أقصى 2 ميجابايت)</div>
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

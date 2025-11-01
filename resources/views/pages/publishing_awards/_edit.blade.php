<!-- Modal Edit Publishing Award -->
<div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel{{ $item->id }}">
          <i class="bi bi-pencil text-primary"></i> تعديل جائزة النشر
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('publishing_awards.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="doctor_name_edit{{ $item->id }}" class="form-label">
                  <i class="bi bi-person text-primary"></i> اسم الدكتور <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control @error('doctor_name') is-invalid @enderror" 
                       id="doctor_name_edit{{ $item->id }}" name="doctor_name" value="{{ old('doctor_name', $item->doctor_name) }}" 
                       placeholder="أدخل اسم الدكتور" required>
                @error('doctor_name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="award_name_edit{{ $item->id }}" class="form-label">
                  <i class="bi bi-trophy text-primary"></i> اسم الجائزة <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control @error('award_name') is-invalid @enderror" 
                       id="award_name_edit{{ $item->id }}" name="award_name" value="{{ old('award_name', $item->award_name) }}" 
                       placeholder="أدخل اسم الجائزة" required>
                @error('award_name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          
          <div class="row mt-3">
            <div class="col-md-6">
              <div class="form-group">
                <label for="award_date_edit{{ $item->id }}" class="form-label">
                  <i class="bi bi-calendar text-primary"></i> تاريخ الجائزة <span class="text-danger">*</span>
                </label>
                <input type="date" class="form-control @error('award_date') is-invalid @enderror" 
                       id="award_date_edit{{ $item->id }}" name="award_date" value="{{ old('award_date', $item->award_date) }}" 
                       required>
                @error('award_date')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="project_file_edit{{ $item->id }}" class="form-label">
                  <i class="bi bi-file-earmark text-primary"></i> ملف المشروع
                </label>
                @if($item->project_file)
                  <div class="mb-2">
                    <small class="text-muted">الملف الحالي:</small>
                    <a href="{{ Storage::url('publishing_awards/' . $item->project_file) }}" target="_blank" class="btn btn-sm btn-outline-info">
                      <i class="bi bi-file-earmark-pdf"></i> عرض الملف الحالي
                    </a>
                  </div>
                @endif
                <input type="file" class="form-control @error('project_file') is-invalid @enderror" 
                       id="project_file_edit{{ $item->id }}" name="project_file" 
                       accept=".pdf,.doc,.docx">
                <small class="form-text text-muted">الصيغ المدعومة: PDF, DOC, DOCX (حتى 10 ميجابايت). اتركه فارغاً للاحتفاظ بالملف الحالي.</small>
                @error('project_file')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="bi bi-x-circle"></i> إلغاء
          </button>
          <button type="submit" class="btn btn-primary">
            <i class="bi bi-check-circle"></i> تحديث جائزة النشر
          </button>
        </div>
      </form>
    </div>
  </div>
</div>


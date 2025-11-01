<!-- Modal Create Publishing Award -->
<div class="modal fade" id="createPublishingAward" tabindex="-1" aria-labelledby="createPublishingAwardLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createPublishingAwardLabel">
          <i class="bi bi-plus-circle text-primary"></i> إضافة جائزة نشر جديدة
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('publishing_awards.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="doctor_name" class="form-label">
                  <i class="bi bi-person text-primary"></i> اسم الدكتور <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control @error('doctor_name') is-invalid @enderror" 
                       id="doctor_name" name="doctor_name" value="{{ old('doctor_name') }}" 
                       placeholder="أدخل اسم الدكتور" required>
                @error('doctor_name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="award_name" class="form-label">
                  <i class="bi bi-trophy text-primary"></i> اسم الجائزة <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control @error('award_name') is-invalid @enderror" 
                       id="award_name" name="award_name" value="{{ old('award_name') }}" 
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
                <label for="award_date" class="form-label">
                  <i class="bi bi-calendar text-primary"></i> تاريخ الجائزة <span class="text-danger">*</span>
                </label>
                <input type="date" class="form-control @error('award_date') is-invalid @enderror" 
                       id="award_date" name="award_date" value="{{ old('award_date') }}" 
                       required>
                @error('award_date')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="project_file" class="form-label">
                  <i class="bi bi-file-earmark text-primary"></i> ملف المشروع
                </label>
                <input type="file" class="form-control @error('project_file') is-invalid @enderror" 
                       id="project_file" name="project_file" 
                       accept=".pdf,.doc,.docx">
                <small class="form-text text-muted">الصيغ المدعومة: PDF, DOC, DOCX (حتى 10 ميجابايت)</small>
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
            <i class="bi bi-check-circle"></i> حفظ جائزة النشر
          </button>
        </div>
      </form>
    </div>
  </div>
</div>


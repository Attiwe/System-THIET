<div class="accordion" id="organizationAccordion">
  <div class="card">
    <!-- accordion header -->
    <div class="card-header bg-dark text-white h3" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link text-white text-2xl font-weight-bold" type="button" data-toggle="collapse"
          data-target="#collapseCreate" aria-expanded="true" aria-controls="collapseCreate">
          <i class="bi bi-building"></i> ✨ <strong class="h3">إضافة هيكل تنظيمي جديد</strong>
        </button>
      </h2>
    </div>
    <br>
    <!-- accordion content -->
    <div id="collapseCreate" class="collapse show" aria-labelledby="headingOne" data-parent="#organizationAccordion">
      <div class="card-body bg-white">
        <br>
        <div class="text-danger font-weight-bold">
          @include('include.validation')
        </div>
        <br>
        <form action="{{ route('organization-structure.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="form-group col-md-6">
              <label for="unit_id" class="font-weight-bold lead text-primary">
                <i class="bi bi-building"></i> الوحدة
              </label>
              <select class="form-control @error('unit_id') is-invalid @enderror" id="unit_id" name="unit_id" required>
                <option value="">اختر الوحدة</option>
                @foreach($units as $unit)
                  <option value="{{ $unit->id }}" {{ old('unit_id') == $unit->id ? 'selected' : '' }}>
                    {{ $unit->name }}
                  </option>
                @endforeach
              </select>
              @error('unit_id')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <label for="file_path" class="font-weight-bold lead text-primary">
                <i class="bi bi-file-earmark-text"></i> ملف الهيكل التنظيمي
              </label>
              <input type="file" class="form-control @error('file_path') is-invalid @enderror" id="file_path" name="file_path" 
                     accept=".pdf,.jpg,.jpeg,.png" required>
              <small class="form-text text-muted">
                <i class="bi bi-info-circle"></i> 
                أنواع الملفات المسموحة: PDF, JPG, JPEG, PNG (حجم أقصى: 10 ميجابايت)
              </small>
              @error('file_path')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <!-- File Preview -->
          <div class="form-group mt-3">
            <div id="filePreview" class="d-none">
              <div class="alert alert-info">
                <h6><i class="bi bi-file-earmark"></i> معاينة الملف:</h6>
                <div id="fileInfo"></div>
              </div>
            </div>
          </div>

          <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn btn-outline-primary lead font-weight-bold me-3  ">
              <i class="bi bi-check-circle"></i> ✔ إضافة الهيكل التنظيمي
            </button>
            <button type="reset" class="btn btn-outline-danger lead font-weight-bold ml-4 ">
              <i class="bi bi-x-circle  "></i> ❌ إلغاء البيانات
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('file_path');
    const filePreview = document.getElementById('filePreview');
    const fileInfo = document.getElementById('fileInfo');

    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        
        if (file) {
            const fileSize = (file.size / 1024 / 1024).toFixed(2); // Convert to MB
            const fileType = file.type;
            const fileName = file.name;
            
            fileInfo.innerHTML = `
                <div class="row">
                    <div class="col-md-4">
                        <strong>اسم الملف:</strong><br>
                        <span class="text-primary">${fileName}</span>
                    </div>
                    <div class="col-md-4">
                        <strong>نوع الملف:</strong><br>
                        <span class="text-info">${fileType}</span>
                    </div>
                    <div class="col-md-4">
                        <strong>حجم الملف:</strong><br>
                        <span class="text-success">${fileSize} ميجابايت</span>
                    </div>
                </div>
            `;
            
            filePreview.classList.remove('d-none');
            
            // Clear validation errors when file is selected
            if (this.classList.contains('is-invalid')) {
                this.classList.remove('is-invalid');
                const feedback = this.parentNode.querySelector('.invalid-feedback');
                if (feedback) {
                    feedback.style.display = 'none';
                }
            }
        } else {
            filePreview.classList.add('d-none');
        }
    });
    
    // Clear validation errors for unit select
    const unitSelect = document.getElementById('unit_id');
    unitSelect.addEventListener('change', function() {
        if (this.classList.contains('is-invalid')) {
            this.classList.remove('is-invalid');
            const feedback = this.parentNode.querySelector('.invalid-feedback');
            if (feedback) {
                feedback.style.display = 'none';
            }
        }
    });
});
</script>

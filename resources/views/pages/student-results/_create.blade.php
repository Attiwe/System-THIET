<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg border-0 rounded-4 overflow-hidden">

      <!-- Enhanced Header with Gradient -->
      <div class="modal-header bg-gradient text-white position-relative">
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); opacity: 0.9;"></div>
        <div class="position-relative z-1 d-flex align-items-center w-100">
          <div class="flex-grow-1">
            <h4 class="modal-title fw-bold mb-1" id="staticBackdropLabel">
              <i class="bi bi-plus-circle me-2"></i> إضافة نتيجة طالب جديدة
            </h4>
            <p class="mb-0 opacity-75 small">قم بإضافة نتيجة طالب جديدة مع الملف المرفق</p>
          </div>
          <button type="button" class="btn-close btn-close-white opacity-75" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      </div>

      <div class="modal-body p-4">
        @include('include.validation')
        
        <form action="{{ route('student-results.store') }}" method="POST" enctype="multipart/form-data" id="createForm" class="needs-validation" novalidate>
          @csrf

          <!-- Form Fields -->
          <div class="row g-4">
            <!-- Department Select -->
            <div class="col-md-6">
              <label class="form-label fw-bold text-dark">
                <i class="bi bi-building me-1 text-primary"></i>القسم
              </label>
              <div class="input-group input-group-lg">
                <span class="input-group-text bg-white border-end-0">
                  <i class="bi bi-diagram-3 text-muted"></i>
                </span>
                <select class="form-select border-start-0 shadow-sm" name="department_id" required
                  style="border-radius: 0 0.5rem 0.5rem 0;">
                  <option value="">اختر القسم</option>
                  @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="invalid-feedback">يرجى اختيار القسم</div>
            </div>

            <!-- Level Select -->
            <div class="col-md-6">
              <label class="form-label fw-bold text-dark">
                <i class="bi bi-mortarboard me-1 text-primary"></i>الفرقة الدراسية
              </label>
              <div class="input-group input-group-lg">
                <span class="input-group-text bg-white border-end-0">
                  <i class="bi bi-graduation-cap text-muted"></i>
                </span>
                <select class="form-select border-start-0 shadow-sm" name="level_id" required
                  style="border-radius: 0 0.5rem 0.5rem 0;">
                  <option value="">اختر الفرقة</option>
                  @foreach($levels as $level)
                    <option value="{{ $level->id }}">{{ $level->level_name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="invalid-feedback">يرجى اختيار الفرقة الدراسية</div>
            </div>

            <!-- Type Select -->
            <div class="col-md-6">
              <label class="form-label fw-bold text-dark">
                <i class="bi bi-calendar-check me-1 text-primary"></i>نوع النتيجة
              </label>
              <div class="input-group input-group-lg">
                <span class="input-group-text bg-white border-end-0">
                  <i class="bi bi-list-check text-muted"></i>
                </span>
                <select class="form-select border-start-0 shadow-sm" name="type" required
                  style="border-radius: 0 0.5rem 0.5rem 0;">
                  <option value="">اختر نوع النتيجة</option>
                  <option value="سمر">سمر</option>
                  <option value="الترم الاول">الترم الأول</option>
                  <option value="الترم الثاني">الترم الثاني</option>
                </select>
              </div>
              <div class="invalid-feedback">يرجى اختيار نوع النتيجة</div>
            </div>

            <!-- Academic Year -->
            <div class="col-md-6">
              <label class="form-label fw-bold text-dark">
                <i class="bi bi-calendar-date me-1 text-primary"></i>السنة الأكاديمية
              </label>
              <div class="input-group input-group-lg">
                <span class="input-group-text bg-white border-end-0">
                  <i class="bi bi-calendar text-muted"></i>
                </span>
                <input type="date" class="form-control border-start-0 shadow-sm" name="academic_year" required
                  style="border-radius: 0 0.5rem 0.5rem 0;">
              </div>
              <div class="invalid-feedback">يرجى إدخال السنة الأكاديمية</div>
            </div>

            <!-- File Upload -->
            <div class="col-12">
              <label class="form-label fw-bold text-dark">
                <i class="bi bi-file-earmark-arrow-up me-1 text-primary"></i>ملف الامتحانات
              </label>
              <div class="input-group input-group-lg">
                <span class="input-group-text bg-white border-end-0">
                  <i class="bi bi-file-earmark text-muted"></i>
                </span>
                <input type="file" class="form-control border-start-0 shadow-sm" name="example_file" required
                  accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png"
                  style="border-radius: 0 0.5rem 0.5rem 0;">
              </div>
              <div class="form-text">
                <i class="bi bi-info-circle me-1"></i>
                الأنواع المدعومة: PDF, DOC, DOCX, XLS, XLSX, JPG, JPEG, PNG (أقصى حجم: 10 ميجابايت)
              </div>
              <div class="invalid-feedback">يرجى رفع ملف النتيجة</div>
            </div>
          </div>
        </form>
      </div>

      <!-- Enhanced Footer -->
      <div class="modal-footer border-0 d-flex justify-content-between bg-light px-4 py-3">
        <button type="submit" form="createForm" class="btn btn-success btn-lg px-4 py-3 rounded-pill shadow-sm position-relative" 
          style="transition: all 0.3s ease; min-width: 140px;" id="submitBtn">
          <i class="bi bi-save me-2"></i> 
          <span class="btn-text">حفظ البيانات</span>
          <div class="spinner-border spinner-border-sm d-none" role="status" style="width: 1rem; height: 1rem;">
            <span class="visually-hidden">Loading...</span>
          </div>
        </button>
        <button type="button" class="btn btn-outline-danger btn-lg px-4 py-3 rounded-pill shadow-sm" 
          data-bs-dismiss="modal" style="transition: all 0.3s ease; min-width: 120px;">
          <i class="bi bi-x-circle me-2"></i> إغلاق
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Enhanced Script for Create Form -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Add hover effects to buttons
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(btn => {
      btn.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-2px)';
        this.style.boxShadow = '0 8px 25px rgba(0,0,0,0.15)';
      });
      
      btn.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0)';
        this.style.boxShadow = '';
      });
    });

    // Form validation
    const form = document.getElementById('createForm');
    form.addEventListener('submit', function(event) {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
        
        // Show validation messages
        const invalidFields = form.querySelectorAll(':invalid');
        invalidFields.forEach(field => {
          field.classList.add('is-invalid');
        });
        
        // Scroll to first invalid field
        if (invalidFields.length > 0) {
          invalidFields[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
      } else {
        // Show loading state
        showLoadingState();
      }
      form.classList.add('was-validated');
    });

    // Remove validation classes on input
    const inputs = form.querySelectorAll('input, select');
    inputs.forEach(input => {
      input.addEventListener('input', function() {
        this.classList.remove('is-invalid');
      });
    });

    // File upload preview
    const fileInput = document.querySelector('input[type="file"]');
    fileInput.addEventListener('change', function() {
      const file = this.files[0];
      if (file) {
        const fileSize = (file.size / 1024 / 1024).toFixed(2);
        console.log(`File selected: ${file.name} (${fileSize} MB)`);
      }
    });
  });

  function showLoadingState() {
    const submitBtn = document.getElementById('submitBtn');
    const btnText = submitBtn.querySelector('.btn-text');
    const spinner = submitBtn.querySelector('.spinner-border');
    
    submitBtn.disabled = true;
    btnText.style.display = 'none';
    spinner.classList.remove('d-none');
  }
</script>

<!-- Enhanced CSS for Create Form -->
<style>
  .input-group:focus-within {
    transform: scale(1.02);
    transition: transform 0.2s ease;
  }
  
  .form-control:focus, .form-select:focus {
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25) !important;
    border-color: #667eea !important;
  }
  
  .btn {
    transition: all 0.3s ease;
  }
  
  .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
  }
  
  .modal-content {
    animation: slideIn 0.3s ease-out;
  }
  
  @keyframes slideIn {
    from {
      opacity: 0;
      transform: translateY(-50px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  
  .form-label {
    transition: color 0.3s ease;
  }
  
  .form-label:hover {
    color: #667eea !important;
  }
  
  .input-group-text {
    transition: background-color 0.3s ease;
  }
  
  .input-group:focus-within .input-group-text {
    background-color: #f8f9fa !important;
  }
  
  @media (max-width: 768px) {
    .modal-dialog {
      margin: 1rem;
    }
    
    .input-group-lg {
      flex-direction: column;
    }
    
    .input-group-lg .input-group-text {
      border-radius: 0.5rem 0.5rem 0 0 !important;
      border-bottom: none !important;
    }
    
    .input-group-lg .form-control,
    .input-group-lg .form-select {
      border-radius: 0 0 0.5rem 0.5rem !important;
    }
  }
</style>

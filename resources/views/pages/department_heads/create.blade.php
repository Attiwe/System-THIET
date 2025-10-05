@extends('layouts.master')

@section('title', 'إضافة رئيس قسم جديد')
@section('css')
  <link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">
  <style>
    .form-container {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border-radius: 20px;
      padding: 30px;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    }
    
    .form-header {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border-radius: 15px;
      padding: 20px;
      margin-bottom: 30px;
      border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .form-group {
      margin-bottom: 25px;
    }
    
    .form-control, .form-select {
      border-radius: 10px;
      border: 2px solid #e9ecef;
      padding: 12px 15px;
      transition: all 0.3s ease;
    }
    
    .form-control:focus, .form-select:focus {
      border-color: #667eea;
      box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    }
    
    .btn-primary {
      background: linear-gradient(45deg, #667eea 0%, #764ba2 100%);
      border: none;
      border-radius: 10px;
      padding: 12px 30px;
      font-weight: 600;
      transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
    }
    
    .btn-secondary {
      border-radius: 10px;
      padding: 12px 30px;
      font-weight: 600;
    }
    
    .preview-card {
      background: rgba(255, 255, 255, 0.9);
      border-radius: 15px;
      padding: 20px;
      margin-top: 20px;
      border: 1px solid rgba(255, 255, 255, 0.3);
      display: none;
    }
    
    .icon-circle {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      background: rgba(255, 255, 255, 0.2);
      margin-bottom: 15px;
    }
  </style>
@endsection

@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div>
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">إدارة رؤساء الأقسام</h2>
        <p class="mg-b-0">إضافة رئيس قسم جديد للنظام</p>
      </div>
    </div>
    <div class="main-dashboard-header-right">
      <div>
        <label class="tx-13">التاريخ</label>
        <div class="main-star text-primary">
          <span class="text-dark">{{ now()->format('H:i A | d-m-Y') }}</span>
        </div>
      </div>
      <div>
        <label class="tx-13">الصفحة الرئيسية</label>
        <h5><a class="text-danger" href="{{ route('dashboard') }}"><i class="bi bi-house-fill"></i> الرئيسية</a></h5>
      </div>
    </div>
  </div>

  @include('include.error')
  @include('include.validation')

  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h2 class="main-content-title tx-24 font-weight-bold text-dark">
            <i class="bi bi-person-plus-fill text-primary"></i> إضافة رئيس قسم جديد
          </h2>
          <a href="{{ route('department-heads.index') }}" class="btn btn-primary">
            <i class="bi bi-arrow-left"></i> رجوع للقائمة
          </a>
        </div>

        <div class="card-body">
          <div class="form-container">
            <!-- Form Header -->
            <div class="form-header text-center text-white">
              <div class="icon-circle mx-auto">
                <i class="bi bi-person-badge-fill fa-2x"></i>
              </div>
              <h4 class="mb-2">إضافة رئيس قسم جديد</h4>
              <p class="mb-0 opacity-75">قم بملء البيانات المطلوبة لإضافة رئيس قسم جديد</p>
            </div>

            <form action="{{ route('department-heads.store') }}" method="POST" id="createForm">
              @csrf
              
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="department_id" class="form-label fw-bold text-white">
                      <i class="bi bi-building text-warning"></i> القسم <span class="text-danger">*</span>
                    </label>
                    <select class="form-select @error('department_id') is-invalid @enderror" id="department_id" name="department_id" required>
                      <option value="">اختر القسم</option>
                      @foreach($departments as $department)
                        @php
                          $hasHead = $departmentHeads->where('department_id', $department->id)->first();
                        @endphp
                        <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }} {{ $hasHead ? 'disabled' : '' }}>
                          {{ $department->name }}{{ $hasHead ? ' (لديه رئيس قسم)' : '' }}
                        </option>
                      @endforeach
                    </select>
                    @error('department_id')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text text-white-50">
                      <i class="bi bi-info-circle"></i> اختر القسم الذي سيتم تعيين رئيس له
                    </div>
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="faculty_members_id" class="form-label fw-bold text-white">
                      <i class="bi bi-person-check text-success"></i> رئيس القسم <span class="text-danger">*</span>
                    </label>
                    <select class="form-select @error('faculty_members_id') is-invalid @enderror" id="faculty_members_id" name="faculty_members_id" required>
                      <option value="">اختر عضو هيئة التدريس</option>
                      @foreach($facultyMembers as $facultyMember)
                        @php
                          $isAssigned = $departmentHeads->where('faculty_members_id', $facultyMember->id)->first();
                        @endphp
                        <option value="{{ $facultyMember->id }}" {{ old('faculty_members_id') == $facultyMember->id ? 'selected' : '' }} {{ $isAssigned ? 'disabled' : '' }}>
                          {{ $facultyMember->name }}{{ $isAssigned ? ' (رئيس قسم آخر)' : '' }}
                        </option>
                      @endforeach
                    </select>
                    @error('faculty_members_id')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text text-white-50">
                      <i class="bi bi-info-circle"></i> اختر عضو هيئة التدريس ليكون رئيساً للقسم
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Preview Section -->
              <div class="preview-card" id="previewSection">
                <h5 class="text-primary mb-3">
                  <i class="bi bi-eye"></i> معاينة التعيين
                </h5>
                <div class="row">
                  <div class="col-md-6">
                    <strong>القسم:</strong>
                    <span id="previewDepartment" class="text-primary ms-2"></span>
                  </div>
                  <div class="col-md-6">
                    <strong>رئيس القسم:</strong>
                    <span id="previewFaculty" class="text-success ms-2"></span>
                  </div>
                </div>
              </div>
              
              <!-- Form Actions -->
              <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary btn-lg me-3">
                  <i class="bi bi-check-circle"></i> حفظ التعيين
                </button>
                <button type="reset" class="btn btn-secondary btn-lg">
                  <i class="bi bi-arrow-clockwise"></i> إعادة تعيين
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const createForm = document.getElementById('createForm');
      const departmentSelect = document.getElementById('department_id');
      const facultySelect = document.getElementById('faculty_members_id');
      const previewSection = document.getElementById('previewSection');
      const previewDepartment = document.getElementById('previewDepartment');
      const previewFaculty = document.getElementById('previewFaculty');
      
      // Live preview functionality
      function updatePreview() {
        const departmentText = departmentSelect.options[departmentSelect.selectedIndex].text;
        const facultyText = facultySelect.options[facultySelect.selectedIndex].text;
        
        if (departmentSelect.value && facultySelect.value) {
          previewDepartment.textContent = departmentText;
          previewFaculty.textContent = facultyText;
          previewSection.style.display = 'block';
        } else {
          previewSection.style.display = 'none';
        }
      }
      
      departmentSelect.addEventListener('change', updatePreview);
      facultySelect.addEventListener('change', updatePreview);
      
      // Form submission with confirmation
      createForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validate form
        if (!validateForm()) {
          return;
        }
        
        // Show confirmation dialog
        Swal.fire({
          title: 'تأكيد الإضافة',
          html: `
            <div class="text-center">
              <i class="bi bi-question-circle fa-3x text-primary mb-3"></i>
              <p class="mb-3">هل أنت متأكد من إضافة رئيس القسم الجديد؟</p>
              <p class="text-muted small">سيتم حفظ البيانات الجديدة</p>
            </div>
          `,
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#28a745',
          cancelButtonColor: '#6c757d',
          confirmButtonText: '<i class="bi bi-plus"></i> نعم، أضف',
          cancelButtonText: '<i class="bi bi-x"></i> إلغاء',
          buttonsStyling: true
        }).then((result) => {
          if (result.isConfirmed) {
            submitForm();
          }
        });
      });
      
      function validateForm() {
        let isValid = true;
        
        if (!departmentSelect.value) {
          departmentSelect.classList.add('is-invalid');
          isValid = false;
        } else {
          departmentSelect.classList.remove('is-invalid');
        }
        
        if (!facultySelect.value) {
          facultySelect.classList.add('is-invalid');
          isValid = false;
        } else {
          facultySelect.classList.remove('is-invalid');
        }
        
        if (!isValid) {
          Swal.fire({
            title: 'بيانات ناقصة',
            text: 'يرجى ملء جميع الحقول المطلوبة',
            icon: 'warning',
            confirmButtonText: 'موافق'
          });
        }
        
        return isValid;
      }
      
      function submitForm() {
        const submitBtn = createForm.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        
        // Show loading state
        submitBtn.innerHTML = '<i class="bi bi-hourglass-split"></i> جاري الحفظ...';
        submitBtn.disabled = true;
        
        const formData = new FormData(createForm);
        
        fetch(createForm.action, {
          method: 'POST',
          body: formData,
          headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          }
        })
        .then(response => {
          if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
          }
          return response.json();
        })
        .then(data => {
          if (data.success) {
            Swal.fire({
              title: 'تم بنجاح!',
              html: `
                <div class="text-center">
                  <i class="bi bi-check-circle fa-3x text-success mb-3"></i>
                  <p class="mb-3">${data.message}</p>
                  <p class="text-muted small">تم إضافة رئيس القسم بنجاح</p>
                </div>
              `,
              icon: 'success',
              confirmButtonText: '<i class="bi bi-check"></i> موافق',
              confirmButtonColor: '#28a745',
              allowOutsideClick: false
            }).then(() => {
              window.location.href = '{{ route("department-heads.index") }}';
            });
          } else {
            Swal.fire({
              title: 'خطأ في الحفظ',
              html: `
                <div class="text-center">
                  <i class="bi bi-exclamation-triangle fa-3x text-warning mb-3"></i>
                  <p class="mb-3">${data.message || 'حدث خطأ غير متوقع'}</p>
                </div>
              `,
              icon: 'error',
              confirmButtonText: '<i class="bi bi-x"></i> موافق',
              confirmButtonColor: '#dc3545'
            });
          }
        })
        .catch(error => {
          console.error('Error:', error);
          Swal.fire({
            title: 'خطأ في الاتصال',
            html: `
              <div class="text-center">
                <i class="bi bi-wifi fa-3x text-danger mb-3"></i>
                <p class="mb-3">حدث خطأ في الاتصال بالخادم</p>
                <p class="text-muted small">يرجى المحاولة مرة أخرى</p>
              </div>
            `,
            icon: 'error',
            confirmButtonText: '<i class="bi bi-arrow-clockwise"></i> إعادة المحاولة',
            confirmButtonColor: '#dc3545'
          });
        })
        .finally(() => {
          // Reset button state
          submitBtn.innerHTML = originalText;
          submitBtn.disabled = false;
        });
      }
      
      // Real-time validation feedback
      createForm.addEventListener('input', function(e) {
        if (e.target.tagName === 'SELECT') {
          e.target.classList.remove('is-invalid');
        }
      });
    });
  </script>
@endsection

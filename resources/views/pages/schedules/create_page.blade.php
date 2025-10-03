@extends('layouts.master')
@section('title', 'إضافة جدول دراسي')

@section('css')
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts - Tajawal -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  
  <style>
    .create-form-container {
      background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      border-radius: 1.5rem;
      padding: 2rem;
      margin: 2rem 0;
      box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    }
    
    .form-control, .form-select {
      border-radius: 0.75rem;
      border: 2px solid #e9ecef;
      padding: 0.75rem 1rem;
      font-family: 'Tajawal', sans-serif;
      transition: all 0.3s ease;
    }
    
    .form-control:focus, .form-select:focus {
      border-color: #667eea;
      box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    }
    
    .form-label {
      font-weight: 600;
      color: #2c3e50;
      margin-bottom: 0.5rem;
      font-size: 1rem;
    }
    
    .btn-custom {
      padding: 0.75rem 2rem;
      border-radius: 0.75rem;
      font-weight: 500;
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
    }
    
    .btn-custom:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }
    
    .header-card {
      background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
      color: white;
      border-radius: 1rem;
      padding: 2rem;
      margin-bottom: 2rem;
      box-shadow: 0 10px 30px rgba(40, 167, 69, 0.3);
    }
    
    .icon-container {
      width: 60px;
      height: 60px;
      background: rgba(255,255,255,0.2);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
      backdrop-filter: blur(10px);
    }
    
    .form-section {
      background: white;
      border-radius: 1rem;
      padding: 1.5rem;
      margin-bottom: 1.5rem;
      box-shadow: 0 5px 15px rgba(0,0,0,0.08);
      border-left: 4px solid #28a745;
    }
    
    .section-title {
      font-size: 1.25rem;
      font-weight: 700;
      color: #2c3e50;
      margin-bottom: 1rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }
    
    .section-icon {
      width: 40px;
      height: 40px;
      background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
      color: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.1rem;
    }
    
    .file-upload-area {
      border: 2px dashed #dee2e6;
      border-radius: 1rem;
      padding: 2rem;
      text-align: center;
      transition: all 0.3s ease;
      background: #f8f9fa;
    }
    
    .file-upload-area:hover {
      border-color: #28a745;
      background: rgba(40, 167, 69, 0.05);
    }
    
    .file-upload-area.dragover {
      border-color: #28a745;
      background: rgba(40, 167, 69, 0.1);
    }
    
    .form-text {
      font-size: 0.875rem;
      color: #6c757d;
      margin-top: 0.25rem;
    }
    
    .required-field::after {
      content: " *";
      color: #dc3545;
    }
    
    @media (max-width: 768px) {
      .create-form-container {
        padding: 1rem;
        margin: 1rem 0;
      }
      
      .header-card {
        padding: 1.5rem;
        text-align: center;
      }
      
      .form-section {
        padding: 1rem;
      }
    }
  </style>
@endsection

@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div>
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> ➕ إضافة جدول دراسي </h2>
        <p class="mg-b-0"> إضافة جدول دراسي جديد </p>
      </div>
    </div>
    <div class="main-dashboard-header-right">
      <div>
        <label class="tx-13 font-weight-bold"> التاريخ </label>
        <div class="main-star text-primary">
          <span class="text-dark"> {{ now()->format('H:i A | d-m-Y') }} </span>
        </div>
      </div>
      <div>
        <label class="tx-13 font-weight-bold"> الصفحه الرئيسيه </label>
        <h5> <a class="text-danger" href="{{ route('dashboard') }}"> <i class="bi bi-house-fill"></i> الرئيسيه</a></h5>
      </div>
    </div>
  </div>
  <br>
  @include('include.success')
@endsection

@section('content')
  <div class="container-fluid">
    <!-- Header Card -->
    <div class="header-card">
      <div class="row align-items-center">
        <div class="col-md-8">
          <div class="d-flex align-items-center">
            <div class="icon-container me-3">
              <i class="bi bi-plus-circle"></i>
            </div>
            <div>
              <h1 class="mb-2 fw-bold">إضافة جدول دراسي جديد</h1>
              <p class="mb-0 opacity-75">قم بملء البيانات التالية لإضافة جدول دراسي جديد</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="d-flex justify-content-end">
            <a href="{{ route('schedules.index') }}" class="btn btn-light btn-custom">
              <i class="bi bi-arrow-right"></i>
              العودة للقائمة
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Create Form -->
    <div class="create-form-container">
      @include('include.validation')
      
      <form action="{{ route('schedules.store') }}" method="POST" enctype="multipart/form-data" id="createForm" class="needs-validation" novalidate>
        @csrf

        <!-- Basic Information Section -->
        <div class="form-section">
          <h4 class="section-title">
            <div class="section-icon">
              <i class="bi bi-info-circle"></i>
            </div>
            المعلومات الأساسية
          </h4>
          
          <div class="row g-3">
            <div class="col-md-4">
              <label for="type" class="form-label required-field">
                <i class="bi bi-calendar-week me-1 text-primary"></i>نوع الجدول
              </label>
              <select name="type" id="type" class="form-select" required>
                <option value="" selected>اختر نوع الجدول</option>
                <option value="جداول الامتحانات" {{ old('type') == 'جداول الامتحانات' ? 'selected' : '' }}>جداول الامتحانات</option>
                <option value="جداول الدرسه" {{ old('type') == 'جداول الدرسه' ? 'selected' : '' }}>جداول الدرسه</option>
                <option value="غير ذالك" {{ old('type') == 'غير ذالك' ? 'selected' : '' }}>غير ذالك</option>
              </select>
              <div class="invalid-feedback">يرجى اختيار نوع الجدول</div>
            </div>

            <div class="col-md-4">
              <label for="class" class="form-label required-field">
                <i class="bi bi-mortarboard me-1 text-primary"></i>الترم الدراسي
              </label>
              <select name="class" id="class" class="form-select" required>
                <option value="" selected>اختر الترم</option>
                <option value="الترم الاول" {{ old('class') == 'الترم الاول' ? 'selected' : '' }}>الترم الاول</option>
                <option value="الترم الثاني" {{ old('class') == 'الترم الثاني' ? 'selected' : '' }}>الترم الثاني</option>
              </select>
              <div class="invalid-feedback">يرجى اختيار الترم الدراسي</div>
            </div>

            <div class="col-md-4">
              <label for="academic_year" class="form-label">
                <i class="bi bi-calendar-range me-1 text-primary"></i>السنة الأكاديمية
              </label>
              <input type="date" class="form-control" id="academic_year" name="academic_year" value="{{ old('academic_year') }}"
                required>
              <div class="invalid-feedback">يرجى اختيار السنة الأكاديمية</div>
            </div>
          </div>
        </div>

        <!-- Department & Level Section -->
        <div class="form-section">
          <h4 class="section-title">
            <div class="section-icon">
              <i class="bi bi-building"></i>
            </div>
            القسم والمستوى
          </h4>
          
          <div class="row g-3">
            <div class="col-md-6">
              <label for="department_id" class="form-label required-field">
                <i class="bi bi-building me-1 text-primary"></i>القسم
              </label>
              <select name="department_id" id="department_id" class="form-select" required>
                <option value="" selected>اختر القسم</option>
                @foreach ($departments as $department)
                  <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                    {{ $department->name }}
                  </option>
                @endforeach
              </select>
              <div class="invalid-feedback">يرجى اختيار القسم</div>
            </div>

            <div class="col-md-6">
              <label for="level_id" class="form-label required-field">
                <i class="bi bi-graduation-cap me-1 text-primary"></i>المستوى
              </label>
              <select name="level_id" id="level_id" class="form-select" required>
                <option value="" selected>اختر المستوى</option>
                @foreach ($levelAcademics as $level)
                  <option value="{{ $level->id }}" {{ old('level_id') == $level->id ? 'selected' : '' }}>
                    {{ $level->level_name }}
                  </option>
                @endforeach
              </select>
              <div class="invalid-feedback">يرجى اختيار المستوى</div>
            </div>
          </div>
        </div>

        <!-- File Section -->
        <div class="form-section">
          <h4 class="section-title">
            <div class="section-icon">
              <i class="bi bi-file-earmark-text"></i>
            </div>
            ملف الجدول الدراسي
          </h4>
          
          <div class="file-upload-area" id="file-upload-area">
            <i class="bi bi-cloud-upload fs-1 text-muted mb-3"></i>
            <p class="mb-2">اسحب الملف هنا أو اضغط للاختيار</p>
            <input type="file" class="form-control" id="file_path" name="file_path" accept=".pdf,.jpg,.jpeg,.png" style="display: none;" required>
            <div class="form-text">صيغ مقبولة: PDF, JPG, PNG</div>
          </div>
          <div id="file-preview" class="text-center mt-3"></div>
        </div>

        <!-- Action Buttons -->
        <div class="row">
          <div class="col-12">
            <div class="d-flex justify-content-center gap-3 mt-4">
              <button type="submit" class="btn btn-success btn-custom btn-lg px-5" id="submitBtn">
                <i class="bi bi-check-circle me-2"></i>
                <span class="btn-text">إضافة جدول</span>
                <div class="spinner-border spinner-border-sm d-none ms-2" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
              </button>
              <button type="reset" class="btn btn-outline-secondary btn-custom btn-lg px-5">
                <i class="bi bi-arrow-clockwise me-2"></i>إعادة تعيين
              </button>
              <a href="{{ route('schedules.index') }}" class="btn btn-outline-danger btn-custom btn-lg px-5">
                <i class="bi bi-x-circle me-2"></i>إلغاء
              </a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection

@section('js')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const form = document.getElementById('createForm');
      const submitBtn = document.getElementById('submitBtn');
      const btnText = submitBtn.querySelector('.btn-text');
      const loadingSpinner = submitBtn.querySelector('.spinner-border');
      const fileUploadArea = document.getElementById('file-upload-area');
      const fileInput = document.getElementById('file_path');
      
      // File upload area
      fileUploadArea.addEventListener('click', () => fileInput.click());
      
      // Drag and drop
      fileUploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        fileUploadArea.classList.add('dragover');
      });
      
      fileUploadArea.addEventListener('dragleave', () => {
        fileUploadArea.classList.remove('dragover');
      });
      
      fileUploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        fileUploadArea.classList.remove('dragover');
        const files = e.dataTransfer.files;
        if (files.length > 0) {
          fileInput.files = files;
          handleFilePreview(files[0]);
        }
      });
      
      // File input change
      fileInput.addEventListener('change', (e) => {
        if (e.target.files.length > 0) {
          handleFilePreview(e.target.files[0]);
        }
      });
      
      function handleFilePreview(file) {
        const preview = document.getElementById('file-preview');
        
        if (file.type === 'application/pdf') {
          preview.innerHTML = `
            <div class="text-center p-3 bg-light rounded">
              <i class="bi bi-file-earmark-pdf fs-1 text-danger"></i>
              <p class="text-success mt-2"><i class="bi bi-check-circle me-1"></i>تم اختيار ملف PDF</p>
              <small class="text-muted">${file.name}</small>
            </div>
          `;
        } else if (file.type.startsWith('image/')) {
          const reader = new FileReader();
          reader.onload = (e) => {
            preview.innerHTML = `
              <img src="${e.target.result}" style="max-width: 200px; max-height: 200px; border-radius: 0.5rem;" alt="Preview">
              <p class="text-success mt-2"><i class="bi bi-check-circle me-1"></i>تم اختيار صورة</p>
            `;
          };
          reader.readAsDataURL(file);
        }
      }
      
      // Form submission
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
          showLoadingState();
        }
        form.classList.add('was-validated');
      });
      
      // Remove validation classes on input
      const inputs = form.querySelectorAll('input, select, textarea');
      inputs.forEach(input => {
        input.addEventListener('input', function() {
          this.classList.remove('is-invalid');
        });
      });
      
      function showLoadingState() {
        submitBtn.disabled = true;
        btnText.style.display = 'none';
        loadingSpinner.classList.remove('d-none');
      }
    });
  </script>
@endsection

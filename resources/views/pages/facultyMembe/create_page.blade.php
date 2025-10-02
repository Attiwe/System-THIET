@extends('layouts.master')
@section('title', 'إضافة عضو هيئة تدريس')

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
    
    .preview-image {
      max-width: 150px;
      max-height: 150px;
      border-radius: 0.5rem;
      margin-top: 1rem;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
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
    
    .progress-container {
      display: none;
      margin-top: 1rem;
    }
    
    .loading-spinner {
      display: none;
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
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> ➕ إضافة عضو هيئة تدريس </h2>
        <p class="mg-b-0"> إضافة عضو جديد لهيئة التدريس </p>
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
              <i class="bi bi-person-plus-fill"></i>
            </div>
            <div>
              <h1 class="mb-2 fw-bold">إضافة عضو هيئة تدريس جديد</h1>
              <p class="mb-0 opacity-75">قم بملء البيانات التالية لإضافة عضو جديد</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="d-flex justify-content-end">
            <a href="{{ route('facultyMembers.index') }}" class="btn btn-light btn-custom">
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
      
      <form action="{{ route('facultyMembers.store') }}" method="POST" enctype="multipart/form-data" id="createForm" class="needs-validation" novalidate>
        @csrf

        <!-- Basic Information Section -->
        <div class="form-section">
          <h4 class="section-title">
            <div class="section-icon">
              <i class="bi bi-person-fill"></i>
            </div>
            المعلومات الأساسية
          </h4>
          
          <div class="row g-3">
            <div class="col-md-4">
              <label for="name" class="form-label required-field">
                <i class="bi bi-person-fill me-1 text-primary"></i>اسم عضو هيئة التدريس
              </label>
              <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                placeholder="أدخل اسم العضو" required>
              <div class="invalid-feedback">يرجى إدخال اسم العضو</div>
            </div>

            <div class="col-md-4">
              <label for="type" class="form-label required-field">
                <i class="bi bi-person-badge me-1 text-primary"></i>النوع
              </label>
              <select name="type" id="type" class="form-select" required>
                <option value="" selected>اختر النوع</option>
                <option value="دكتور" {{ old('type') == 'دكتور' ? 'selected' : '' }}>دكتور</option>
                <option value="معيد" {{ old('type') == 'معيد' ? 'selected' : '' }}>معيد</option>
              </select>
              <div class="invalid-feedback">يرجى اختيار نوع العضو</div>
            </div>

            <div class="col-md-4">
              <label for="appointment_date" class="form-label">
                <i class="bi bi-calendar me-1 text-primary"></i>تاريخ التعيين
              </label>
              <input type="date" class="form-control" id="appointment_date" name="appointment_date"
                value="{{ old('appointment_date') }}">
            </div>
          </div>
        </div>

        <!-- Department & Code Section -->
        <div class="form-section">
          <h4 class="section-title">
            <div class="section-icon">
              <i class="bi bi-building"></i>
            </div>
            القسم والكود
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
              <label for="faculty_code" class="form-label">
                <i class="bi bi-barcode me-1 text-primary"></i>كود العضو
              </label>
              <input type="number" class="form-control" id="faculty_code" name="faculty_code"
                value="{{ $facultyCode }}" readonly style="background-color: #f8f9fa;">
              <div class="form-text">يتم إنشاء الكود تلقائياً</div>
            </div>
          </div>
        </div>

        <!-- Contact Information Section -->
        <div class="form-section">
          <h4 class="section-title">
            <div class="section-icon">
              <i class="bi bi-telephone-fill"></i>
            </div>
            معلومات الاتصال
          </h4>
          
          <div class="row g-3">
            <div class="col-md-4">
              <label for="username" class="form-label required-field">
                <i class="bi bi-person-circle me-1 text-primary"></i>اسم المستخدم
              </label>
              <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" 
                placeholder="أدخل اسم المستخدم" required>
              <div class="invalid-feedback">يرجى إدخال اسم المستخدم</div>
            </div>

            <div class="col-md-4">
              <label for="email" class="form-label required-field">
                <i class="bi bi-envelope me-1 text-primary"></i>البريد الإلكتروني
              </label>
              <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" 
                placeholder="أدخل البريد الإلكتروني" required>
              <div class="invalid-feedback">يرجى إدخال بريد إلكتروني صحيح</div>
            </div>

            <div class="col-md-4">
              <label for="password" class="form-label required-field">
                <i class="bi bi-lock me-1 text-primary"></i>كلمة المرور
              </label>
              <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" 
                placeholder="أدخل كلمة المرور" required>
              <div class="invalid-feedback">يرجى إدخال كلمة المرور</div>
            </div>
          </div>

          <div class="row g-3 mt-2">
            <div class="col-md-6">
              <label for="phone" class="form-label">
                <i class="bi bi-phone me-1 text-primary"></i>رقم الهاتف
              </label>
              <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}"
                placeholder="أدخل رقم الهاتف">
            </div>

            <div class="col-md-6">
              <label for="facebook" class="form-label">
                <i class="bi bi-facebook me-1 text-primary"></i>فيسبوك
              </label>
              <input type="url" class="form-control" id="facebook" name="facebook" value="{{ old('facebook') }}"
                placeholder="https://facebook.com/username">
            </div>
          </div>
        </div>

        <!-- Appointment Information Section -->
        <div class="form-section">
          <h4 class="section-title">
            <div class="section-icon">
              <i class="bi bi-briefcase"></i>
            </div>
            معلومات التعيين
          </h4>
          
          <div class="row g-3">
            <div class="col-md-6">
              <label for="appointment_type" class="form-label">
                <i class="bi bi-briefcase me-1 text-primary"></i>نوع التعيين
              </label>
              <select name="appointment_type" id="appointment_type" class="form-select">
                <option value="" selected>اختر نوع التعيين</option>
                <option value="معين" {{ old('appointment_type') == 'معين' ? 'selected' : '' }}>معين</option>
                <option value="منتدب" {{ old('appointment_type') == 'منتدب' ? 'selected' : '' }}>منتدب جزئي</option>
                <option value="غير ذلك" {{ old('appointment_type') == 'غير ذلك' ? 'selected' : '' }}>غير ذلك</option>
              </select>
            </div>
          </div>
        </div>

        <!-- Files Section -->
        <div class="form-section">
          <h4 class="section-title">
            <div class="section-icon">
              <i class="bi bi-file-earmark-text"></i>
            </div>
            الملفات والمستندات
          </h4>
          
          <div class="row g-3">
            <div class="col-md-4">
              <label for="personal_image" class="form-label">
                <i class="bi bi-person-bounding-box me-1 text-primary"></i>الصورة الشخصية
              </label>
              <div class="file-upload-area" id="image-upload-area">
                <i class="bi bi-cloud-upload fs-1 text-muted mb-3"></i>
                <p class="mb-2">اسحب الصورة هنا أو اضغط للاختيار</p>
                <input type="file" class="form-control" id="personal_image" name="personal_image" accept="image/*" style="display: none;">
                <div class="form-text">صيغ مقبولة: JPG, PNG, GIF</div>
              </div>
              <div id="image-preview" class="text-center"></div>
            </div>

            <div class="col-md-4">
              <label for="resume" class="form-label">
                <i class="bi bi-file-earmark-pdf me-1 text-primary"></i>السيرة الذاتية
              </label>
              <div class="file-upload-area" id="resume-upload-area">
                <i class="bi bi-file-earmark-pdf fs-1 text-muted mb-3"></i>
                <p class="mb-2">اسحب ملف PDF هنا أو اضغط للاختيار</p>
                <input type="file" class="form-control" id="resume" name="resume" accept="application/pdf" style="display: none;">
                <div class="form-text">ملف PDF فقط</div>
              </div>
              <div id="resume-preview" class="text-center"></div>
            </div>

            <div class="col-md-4">
              <label for="researches" class="form-label">
                <i class="bi bi-journal-text me-1 text-primary"></i>الأبحاث
              </label>
              <div class="file-upload-area" id="researches-upload-area">
                <i class="bi bi-file-earmark-pdf fs-1 text-muted mb-3"></i>
                <p class="mb-2">اسحب ملف PDF هنا أو اضغط للاختيار</p>
                <input type="file" class="form-control" id="researches" name="researches" accept="application/pdf" style="display: none;">
                <div class="form-text">ملف PDF فقط</div>
              </div>
              <div id="researches-preview" class="text-center"></div>
            </div>
          </div>
        </div>

        <!-- Progress Bar -->
        <div class="progress-container">
          <div class="progress mb-3">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%"></div>
          </div>
          <p class="text-center text-muted">جاري رفع الملفات...</p>
        </div>

        <!-- Action Buttons -->
        <div class="row">
          <div class="col-12">
            <div class="d-flex justify-content-center gap-3 mt-4">
              <button type="submit" class="btn btn-success btn-custom btn-lg px-5" id="submitBtn">
                <i class="bi bi-check-circle me-2"></i>
                <span class="btn-text">إضافة عضو</span>
                <div class="loading-spinner spinner-border spinner-border-sm ms-2" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
              </button>
              <button type="reset" class="btn btn-outline-secondary btn-custom btn-lg px-5">
                <i class="bi bi-arrow-clockwise me-2"></i>إعادة تعيين
              </button>
              <a href="{{ route('facultyMembers.index') }}" class="btn btn-outline-danger btn-custom btn-lg px-5">
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
      const loadingSpinner = submitBtn.querySelector('.loading-spinner');
      const progressContainer = document.querySelector('.progress-container');
      const progressBar = document.querySelector('.progress-bar');
      
      // File upload areas
      const imageUploadArea = document.getElementById('image-upload-area');
      const resumeUploadArea = document.getElementById('resume-upload-area');
      const researchesUploadArea = document.getElementById('researches-upload-area');
      
      // File inputs
      const imageInput = document.getElementById('personal_image');
      const resumeInput = document.getElementById('resume');
      const researchesInput = document.getElementById('researches');
      
      // Setup file upload areas
      setupFileUpload(imageUploadArea, imageInput, 'image-preview', 'image');
      setupFileUpload(resumeUploadArea, resumeInput, 'resume-preview', 'pdf');
      setupFileUpload(researchesUploadArea, researchesInput, 'researches-preview', 'pdf');
      
      function setupFileUpload(uploadArea, input, previewId, fileType) {
        // Click to upload
        uploadArea.addEventListener('click', () => input.click());
        
        // Drag and drop
        uploadArea.addEventListener('dragover', (e) => {
          e.preventDefault();
          uploadArea.classList.add('dragover');
        });
        
        uploadArea.addEventListener('dragleave', () => {
          uploadArea.classList.remove('dragover');
        });
        
        uploadArea.addEventListener('drop', (e) => {
          e.preventDefault();
          uploadArea.classList.remove('dragover');
          const files = e.dataTransfer.files;
          if (files.length > 0) {
            input.files = files;
            handleFilePreview(files[0], previewId, fileType);
          }
        });
        
        // File input change
        input.addEventListener('change', (e) => {
          if (e.target.files.length > 0) {
            handleFilePreview(e.target.files[0], previewId, fileType);
          }
        });
      }
      
      function handleFilePreview(file, previewId, fileType) {
        const preview = document.getElementById(previewId);
        
        if (fileType === 'image' && file.type.startsWith('image/')) {
          const reader = new FileReader();
          reader.onload = (e) => {
            preview.innerHTML = `
              <img src="${e.target.result}" class="preview-image" alt="Preview">
              <p class="text-success mt-2"><i class="bi bi-check-circle me-1"></i>تم اختيار الصورة</p>
            `;
          };
          reader.readAsDataURL(file);
        } else if (fileType === 'pdf' && file.type === 'application/pdf') {
          preview.innerHTML = `
            <div class="text-center p-3 bg-light rounded">
              <i class="bi bi-file-earmark-pdf fs-1 text-danger"></i>
              <p class="text-success mt-2"><i class="bi bi-check-circle me-1"></i>تم اختيار ملف PDF</p>
              <small class="text-muted">${file.name}</small>
            </div>
          `;
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
        loadingSpinner.style.display = 'inline-block';
        progressContainer.style.display = 'block';
        
        // Simulate progress
        let progress = 0;
        const interval = setInterval(() => {
          progress += Math.random() * 15;
          if (progress >= 100) {
            progress = 100;
            clearInterval(interval);
          }
          progressBar.style.width = progress + '%';
        }, 200);
      }
    });
  </script>
@endsection

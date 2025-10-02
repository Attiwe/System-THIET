@extends('layouts.master')
@section('title', 'إضافة تربية عسكرية')

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
      border-radius: 1rem;
      padding: 2rem;
      margin: 2rem 0;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
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
    
    .char-counter {
      font-size: 0.875rem;
      margin-top: 0.5rem;
    }
    
    .char-counter.warning {
      color: #ffc107;
    }
    
    .char-counter.danger {
      color: #dc3545;
    }
    
    textarea {
      font-family: 'Tajawal', sans-serif;
      line-height: 1.6;
      resize: vertical;
      min-height: 200px;
    }
    
    @media (max-width: 768px) {
      .create-form-container {
        padding: 1rem;
        margin: 1rem 0;
      }
      
      .header-card {
        padding: 1.5rem;
      }
    }
  </style>
@endsection

@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div>
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> ➕ إضافة تربية عسكرية </h2>
        <p class="mg-b-0"> إضافة محتوى جديد للتربية العسكرية </p>
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
              <h1 class="mb-2 fw-bold">إضافة تربية عسكرية جديدة</h1>
              <p class="mb-0 opacity-75">قم بإضافة محتوى جديد للتربية العسكرية</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="d-flex justify-content-end">
            <a href="{{ route('military-education.index') }}" 
               class="btn btn-light btn-custom">
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
      
      <form action="{{ route('military-education.store') }}" method="POST" id="createForm" class="needs-validation" novalidate>
        @csrf

        <div class="row">
          <div class="col-12">
            <div class="mb-4">
              <label class="form-label">
                <i class="bi bi-file-text me-2 text-primary"></i>
                وصف التربية العسكرية
              </label>
              <textarea class="form-control" name="description" required 
                placeholder="اكتب وصف التربية العسكرية هنا..." rows="10">{{ old('description') }}</textarea>
              <div class="invalid-feedback">يرجى إدخال وصف التربية العسكرية</div>
              <div class="char-counter text-muted" id="charCount">
                {{ strlen(old('description', '')) }} / 5000 حرف
              </div>
              <div class="form-text">
                <i class="bi bi-info-circle me-1"></i>
                الحد الأدنى: 10 أحرف | الحد الأقصى: 5000 حرف
              </div>
            </div>
          </div>
        </div>

        <!-- Action Buttons -->
        <div class="row">
          <div class="col-12">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
              <div class="d-flex gap-3 flex-wrap">
                <button type="submit" class="btn btn-success btn-custom" id="submitBtn">
                  <i class="bi bi-save"></i>
                  <span class="btn-text">حفظ البيانات</span>
                  <div class="spinner-border spinner-border-sm d-none" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                </button>
                <a href="{{ route('military-education.index') }}" class="btn btn-outline-secondary btn-custom">
                  <i class="bi bi-arrow-right"></i>
                  إلغاء
                </a>
              </div>
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
      // Form validation
      const form = document.getElementById('createForm');
      const textarea = form.querySelector('textarea[name="description"]');
      const charCount = document.getElementById('charCount');
      const submitBtn = document.getElementById('submitBtn');
      
      // Character counter
      function updateCharCount() {
        const length = textarea.value.length;
        charCount.textContent = `${length} / 5000 حرف`;
        
        if (length > 4500) {
          charCount.className = 'char-counter text-warning';
        } else if (length > 4900) {
          charCount.className = 'char-counter text-danger';
        } else {
          charCount.className = 'char-counter text-muted';
        }
      }
      
      textarea.addEventListener('input', updateCharCount);
      
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
          // Show loading state
          showLoadingState();
        }
        form.classList.add('was-validated');
      });
      
      // Remove validation classes on input
      const inputs = form.querySelectorAll('input, textarea');
      inputs.forEach(input => {
        input.addEventListener('input', function() {
          this.classList.remove('is-invalid');
        });
      });
      
      function showLoadingState() {
        const btnText = submitBtn.querySelector('.btn-text');
        const spinner = submitBtn.querySelector('.spinner-border');
        
        submitBtn.disabled = true;
        btnText.style.display = 'none';
        spinner.classList.remove('d-none');
      }
    });
  </script>
@endsection

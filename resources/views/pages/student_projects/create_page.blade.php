@extends('layouts.master')
@section('title', 'إضافة مشروع طلابي')

@section('css')
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts - Tajawal -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  
  <style>
    .create-card {
      background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
      border-radius: 1.5rem;
      padding: 2.5rem;
      box-shadow: 0 15px 40px rgba(0,0,0,0.08);
      border: 1px solid rgba(102, 126, 234, 0.1);
      position: relative;
      overflow: hidden;
    }
    
    .create-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .form-control {
      border-radius: 0.75rem;
      border: 2px solid #e9ecef;
      padding: 0.75rem 1rem;
      font-size: 1rem;
      transition: all 0.3s ease;
      background: #ffffff;
    }
    
    .form-control:focus {
      border-color: #667eea;
      box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
      background: #ffffff;
    }
    
    .form-select {
      border-radius: 0.75rem;
      border: 2px solid #e9ecef;
      padding: 0.75rem 1rem;
      font-size: 1rem;
      transition: all 0.3s ease;
      background: #ffffff;
    }
    
    .form-select:focus {
      border-color: #667eea;
      box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
      background: #ffffff;
    }
    
    .form-label {
      font-weight: 600;
      color: #495057;
      margin-bottom: 0.5rem;
      font-size: 1rem;
    }
    
    .form-text {
      font-size: 0.875rem;
      color: #6c757d;
      margin-top: 0.25rem;
    }
    
    .btn-lg {
      padding: 0.75rem 2rem;
      font-size: 1.1rem;
      font-weight: 600;
      border-radius: 0.75rem;
      transition: all 0.3s ease;
    }
    
    .btn-success {
      background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
      border: none;
      box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
    }
    
    .btn-success:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(40, 167, 69, 0.4);
      background: linear-gradient(135deg, #218838 0%, #1ea085 100%);
    }
    
    .btn-outline-secondary {
      border: 2px solid #6c757d;
      color: #6c757d;
      background: transparent;
    }
    
    .btn-outline-secondary:hover {
      background: #6c757d;
      border-color: #6c757d;
      transform: translateY(-2px);
      box-shadow: 0 4px 15px rgba(108, 117, 125, 0.3);
    }
    
    .btn-outline-danger {
      border: 2px solid #dc3545;
      color: #dc3545;
      background: transparent;
    }
    
    .btn-outline-danger:hover {
      background: #dc3545;
      border-color: #dc3545;
      transform: translateY(-2px);
      box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
    }
    
    .section-divider {
      height: 2px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border-radius: 1px;
      margin: 2rem 0;
      opacity: 0.3;
    }
    
    @media (max-width: 768px) {
      .create-card {
        padding: 1.5rem;
        margin: 0 0.5rem;
      }
      
      .btn-lg {
        padding: 0.6rem 1.5rem;
        font-size: 1rem;
      }
    }
  </style>
@endsection

@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div>
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> ➕💡 إضافة مشروع طلابي </h2>
        <p class="mg-b-0"> إضافة مشروع طلابي جديد </p>
      </div>
    </div>
    <div class="main-dashboard-header-right">
      <div>
        <label class="tx-13 font-weight-bold"> التاريخ </label>
        <div class="main-star">
          <span class="text-dark"> {{ now()->format('H:i A | d-m-Y') }} </span>
        </div>
      </div>
      <div>
        <label class="tx-13 font-weight-bold"> الصفحه الرئيسيه</label>
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
    <div class="card mb-4" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border-radius: 1rem; box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col-md-8">
            <div class="d-flex align-items-center">
              <div class="me-3" style="width: 60px; height: 60px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; backdrop-filter: blur(10px);">
                <i class="bi bi-plus-circle"></i>
              </div>
              <div>
                <h1 class="mb-2 fw-bold">إضافة مشروع طلابي</h1>
                <p class="mb-0 opacity-75">إضافة مشروع طلابي جديد</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="d-flex justify-content-end gap-2">
              <a href="{{ route('studentProjects.index') }}" class="btn btn-light btn-lg">
                <i class="bi bi-arrow-left me-2"></i>العودة للقائمة
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Create Form -->
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="create-card">
          @include('include.validation')
          <form action="{{ route('studentProjects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row g-3">
              <div class="col-md-6">
                <label for="doctor_name" class="form-label fw-bold text-primary">
                  <i class="bi bi-person-fill me-1"></i> اسم الدكتور
                </label>
                <input type="text" class="form-control" id="doctor_name" name="doctor_name" 
                  value="{{ old('doctor_name') }}" placeholder="أدخل اسم الدكتور" required>
              </div>

              <div class="col-md-6">
                <label for="department_id" class="form-label fw-bold text-primary">
                  <i class="bi bi-building me-1"></i>القسم
                </label>
                <select name="department_id" id="department_id" class="form-select" required>
                  <option value="" {{ old('department_id') == '' ? 'selected' : '' }}>اختر القسم</option>
                  @foreach ($departments as $department)
                    <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                      {{ $department->name }}
                    </option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="section-divider"></div>

            <div class="row g-3">
              <div class="col-12">
                <label for="project_name" class="form-label fw-bold text-primary">
                  <i class="bi bi-lightbulb me-1"></i>اسم المشروع
                </label>
                <input type="text" class="form-control" id="project_name" name="project_name" 
                  value="{{ old('project_name') }}" placeholder="أدخل اسم المشروع" required>
              </div>
            </div>

            <div class="row g-3">
              <div class="col-12">
                <label for="description" class="form-label fw-bold text-primary">
                  <i class="bi bi-card-text me-1"></i>وصف المشروع
                </label>
                <textarea class="form-control" id="description" name="description" rows="6" 
                  placeholder="أدخل وصف مفصل للمشروع" required>{{ old('description') }}</textarea>
              </div>
            </div>

            <div class="section-divider"></div>

            <div class="row g-3">
              <div class="col-md-6">
                <label for="image_work" class="form-label fw-bold text-primary">
                  <i class="bi bi-image me-1"></i>صورة العمل
                </label>
                <input type="file" class="form-control" id="image_work" name="image_work" accept="image/*">
                <div class="form-text">صيغ مقبولة: JPG, PNG, GIF - الحد الأقصى 5 ميجابايت</div>
              </div>

              <div class="col-md-6">
                <label for="project_pdf" class="form-label fw-bold text-primary">
                  <i class="bi bi-file-earmark-pdf me-1"></i>ملف المشروع
                </label>
                <input type="file" class="form-control" id="project_pdf" name="project_pdf" accept="application/pdf">
                <div class="form-text">ملف PDF فقط - الحد الأقصى 10 ميجابايت</div>
              </div>
            </div>

            <div class="d-flex justify-content-center gap-3 mt-4">
              <button type="submit" class="btn btn-success btn-lg px-5">
                <i class="bi bi-check-circle me-2"></i>إضافة مشروع
              </button>
              <button type="reset" class="btn btn-outline-secondary btn-lg px-5">
                <i class="bi bi-arrow-clockwise me-2"></i>إعادة تعيين
              </button>
              <a href="{{ route('studentProjects.index') }}" class="btn btn-outline-danger btn-lg px-5">
                <i class="bi bi-x-circle me-2"></i>إلغاء
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection

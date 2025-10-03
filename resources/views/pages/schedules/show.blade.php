@extends('layouts.master')
@section('title', 'عرض الجدول الدراسي')

@section('css')
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts - Tajawal -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  
  <style>
    .schedule-container {
      background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      border-radius: 1.5rem;
      padding: 2rem;
      margin: 2rem 0;
      box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    }
    
    .header-card {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      border-radius: 1rem;
      padding: 2rem;
      margin-bottom: 2rem;
      box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
    }
    
    .info-card {
      background: white;
      border-radius: 1rem;
      padding: 1.5rem;
      margin-bottom: 1.5rem;
      box-shadow: 0 5px 15px rgba(0,0,0,0.08);
      border-left: 4px solid #667eea;
      transition: all 0.3s ease;
    }
    
    .info-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }
    
    .info-icon {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.2rem;
      margin-bottom: 1rem;
    }
    
    .info-label {
      font-weight: 600;
      color: #2c3e50;
      margin-bottom: 0.5rem;
      font-size: 1rem;
    }
    
    .info-value {
      color: #6c757d;
      font-size: 1.1rem;
      word-break: break-word;
    }
    
    .file-section {
      background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%);
      color: white;
      border-radius: 1rem;
      padding: 1.5rem;
      margin-bottom: 1.5rem;
    }
    
    .file-item {
      background: rgba(255,255,255,0.1);
      border-radius: 0.5rem;
      padding: 1rem;
      backdrop-filter: blur(10px);
      transition: all 0.3s ease;
    }
    
    .file-item:hover {
      background: rgba(255,255,255,0.2);
      transform: translateX(5px);
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
    
    .badge-custom {
      padding: 0.5rem 1rem;
      border-radius: 1rem;
      font-weight: 500;
      font-size: 0.9rem;
    }
    
    @media (max-width: 768px) {
      .schedule-container {
        padding: 1rem;
        margin: 1rem 0;
      }
      
      .header-card {
        padding: 1.5rem;
        text-align: center;
      }
    }
  </style>
@endsection

@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div>
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> 📅 عرض الجدول الدراسي </h2>
        <p class="mg-b-0"> تفاصيل ومعلومات الجدول الدراسي </p>
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
              <i class="bi bi-calendar-week"></i>
            </div>
            <div>
              <h1 class="mb-2 fw-bold">الجدول الدراسي</h1>
              <p class="mb-0 opacity-75">عرض تفاصيل الجدول الدراسي</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-light btn-custom">
              <i class="bi bi-pencil-square"></i>تعديل
            </a>
            <a href="{{ route('schedules.index') }}" class="btn btn-outline-light btn-custom">
              <i class="bi bi-arrow-right"></i>العودة للقائمة
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Schedule Content -->
    <div class="schedule-container">
      <div class="row">
        <!-- Basic Information -->
        <div class="col-lg-6 mb-4">
          <div class="info-card">
            <div class="info-icon">
              <i class="bi bi-info-circle"></i>
            </div>
            <h4 class="info-label">المعلومات الأساسية</h4>
            <div class="info-value">
              <p><strong>نوع الجدول:</strong> 
                <span class="badge-custom bg-primary text-white">{{ $schedule->type ?? 'غير محدد' }}</span>
              </p>
              <p><strong>الفصل الدراسي:</strong> {{ $schedule->class ?? 'غير محدد' }}</p>
              <p><strong>السنة الأكاديمية:</strong> {{ $schedule->academic_year ?? 'غير محدد' }}</p>
            </div>
          </div>
        </div>

        <!-- Department & Level -->
        <div class="col-lg-6 mb-4">
          <div class="info-card">
            <div class="info-icon">
              <i class="bi bi-building"></i>
            </div>
            <h4 class="info-label">القسم والمستوى</h4>
            <div class="info-value">
              <p><strong>القسم:</strong> 
                @if($schedule->department)
                  <span class="badge-custom bg-info text-white">{{ $schedule->department->name }}</span>
                @else
                  <span class="text-muted">غير محدد</span>
                @endif
              </p>
              <p><strong>المستوى:</strong> 
                @if($schedule->levelAcademic)
                  <span class="badge-custom bg-success text-white">{{ $schedule->levelAcademic->level_name }}</span>
                @else
                  <span class="text-muted">غير محدد</span>
                @endif
              </p>
            </div>
          </div>
        </div>

        <!-- File Section -->
        <div class="col-12 mb-4">
          <div class="file-section">
            <h4 class="mb-3">
              <i class="bi bi-file-earmark-text me-2"></i>ملف الجدول الدراسي
            </h4>
            <div class="row">
              <div class="col-md-8">
                <div class="file-item">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <h6 class="mb-1">
                        <i class="bi bi-file-earmark-pdf me-2"></i>جدول دراسي
                      </h6>
                      <small class="opacity-75">ملف PDF للجدول الدراسي</small>
                    </div>
                    <div>
                      @if($schedule->file_path)
                        <a href="{{ asset('image/schedule/' . $schedule->file_path) }}" target="_blank" class="btn btn-light btn-sm">
                          <i class="bi bi-eye me-1"></i>عرض
                        </a>
                        <a href="{{ asset('image/schedule/' . $schedule->file_path) }}" download class="btn btn-outline-light btn-sm">
                          <i class="bi bi-download me-1"></i>تحميل
                        </a>
                      @else
                        <span class="text-white-50">لا يوجد ملف</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                @if($schedule->file_path)
                  <div class="text-center">
                    <div class="bg-white p-3 rounded">
                      <i class="bi bi-file-earmark-pdf fs-1 text-danger"></i>
                      <p class="mt-2 mb-0 text-dark">ملف PDF</p>
                      <small class="text-muted">جدول دراسي</small>
                    </div>
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>

        <!-- Additional Information -->
        <div class="col-12 mb-4">
          <div class="info-card">
            <div class="info-icon">
              <i class="bi bi-calendar-check"></i>
            </div>
            <h4 class="info-label">معلومات إضافية</h4>
            <div class="info-value">
              <p><strong>تاريخ الإنشاء:</strong> {{ $schedule->created_at->format('Y-m-d H:i') }}</p>
              <p><strong>آخر تحديث:</strong> {{ $schedule->updated_at->format('Y-m-d H:i') }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Action Buttons -->
    <div class="text-center mb-4">
      <div class="d-flex justify-content-center flex-wrap gap-3">
        <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-warning btn-custom">
          <i class="bi bi-pencil-square"></i>تعديل الجدول
        </a>
        <a href="{{ route('schedules.index') }}" class="btn btn-secondary btn-custom">
          <i class="bi bi-arrow-right"></i>العودة للقائمة
        </a>
        @if($schedule->file_path)
          <a href="{{ asset('image/schedule/' . $schedule->file_path) }}" download class="btn btn-info btn-custom">
            <i class="bi bi-download"></i>تحميل الجدول
          </a>
        @endif
        <button onclick="window.print()" class="btn btn-dark btn-custom">
          <i class="bi bi-printer"></i>طباعة
        </button>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Add smooth animations to info cards
      const infoCards = document.querySelectorAll('.info-card');
      infoCards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
        card.classList.add('animate__animated', 'animate__fadeInUp');
      });
    });
  </script>
  
  <style>
    @media print {
      .btn-custom, .header-card .col-md-4:last-child {
        display: none !important;
      }
      
      .schedule-container {
        box-shadow: none;
        border: 1px solid #ddd;
      }
    }
  </style>
@endsection

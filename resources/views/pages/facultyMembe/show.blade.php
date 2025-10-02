@extends('layouts.master')
@section('title', 'عرض عضو هيئة التدريس')

@section('css')
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts - Tajawal -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  
  <style>
    .profile-container {
      background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      border-radius: 1.5rem;
      padding: 2rem;
      margin: 2rem 0;
      box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    }
    
    .profile-header {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      border-radius: 1rem;
      padding: 2rem;
      margin-bottom: 2rem;
      box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
    }
    
    .profile-image {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
      border: 6px solid rgba(255,255,255,0.3);
      box-shadow: 0 10px 30px rgba(0,0,0,0.2);
      transition: all 0.3s ease;
    }
    
    .profile-image:hover {
      transform: scale(1.05);
      box-shadow: 0 15px 40px rgba(0,0,0,0.3);
    }
    
    .profile-name {
      font-size: 2.5rem;
      font-weight: 700;
      margin-bottom: 0.5rem;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }
    
    .profile-title {
      font-size: 1.2rem;
      opacity: 0.9;
      margin-bottom: 1rem;
    }
    
    .info-card {
      background: white;
      border-radius: 1rem;
      padding: 1.5rem;
      margin-bottom: 1.5rem;
      box-shadow: 0 5px 15px rgba(0,0,0,0.08);
      transition: all 0.3s ease;
      border-left: 4px solid #667eea;
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
    
    .btn-custom {
      padding: 0.75rem 2rem;
      border-radius: 0.75rem;
      font-weight: 500;
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      margin: 0.25rem;
    }
    
    .btn-custom:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(0,0,0,0.15);
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
      margin-bottom: 1rem;
      backdrop-filter: blur(10px);
      transition: all 0.3s ease;
    }
    
    .file-item:hover {
      background: rgba(255,255,255,0.2);
      transform: translateX(5px);
    }
    
    .contact-info {
      background: linear-gradient(135deg, #4ecdc4 0%, #44a08d 100%);
      color: white;
      border-radius: 1rem;
      padding: 1.5rem;
      margin-bottom: 1.5rem;
    }
    
    .contact-item {
      display: flex;
      align-items: center;
      gap: 1rem;
      margin-bottom: 1rem;
      padding: 0.75rem;
      background: rgba(255,255,255,0.1);
      border-radius: 0.5rem;
      transition: all 0.3s ease;
    }
    
    .contact-item:hover {
      background: rgba(255,255,255,0.2);
      transform: translateX(5px);
    }
    
    .contact-item:last-child {
      margin-bottom: 0;
    }
    
    @media (max-width: 768px) {
      .profile-container {
        padding: 1rem;
        margin: 1rem 0;
      }
      
      .profile-header {
        padding: 1.5rem;
        text-align: center;
      }
      
      .profile-name {
        font-size: 2rem;
      }
      
      .profile-image {
        width: 120px;
        height: 120px;
      }
    }
  </style>
@endsection

@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div>
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> 👤 عرض عضو هيئة التدريس </h2>
        <p class="mg-b-0"> تفاصيل ومعلومات عضو هيئة التدريس </p>
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
    <!-- Profile Header -->
    <div class="profile-header">
      <div class="row align-items-center">
        <div class="col-md-3 text-center">
          @if($facultyMember->personal_image)
            <img src="{{ asset('image/images_doctor/' . $facultyMember->personal_image) }}" 
                 class="profile-image" alt="{{ $facultyMember->name }}">
          @else
            <div class="profile-image d-flex align-items-center justify-content-center mx-auto" 
                 style="background: rgba(255,255,255,0.2); font-size: 3rem;">
              <i class="bi bi-person-fill"></i>
            </div>
          @endif
        </div>
        <div class="col-md-6">
          <h1 class="profile-name">{{ $facultyMember->name }}</h1>
          @if($facultyMember->type)
            <p class="profile-title">{{ $facultyMember->type }}</p>
          @endif
          <div class="d-flex flex-wrap gap-2">
            <span class="badge bg-light text-dark px-3 py-2">
              <i class="bi bi-barcode me-2"></i>كود: {{ $facultyMember->faculty_code }}
            </span>
            @if($facultyMember->department)
              <span class="badge bg-light text-dark px-3 py-2">
                <i class="bi bi-building me-2"></i>{{ $facultyMember->department->name }}
              </span>
            @endif
          </div>
        </div>
        <div class="col-md-3">
          <div class="d-flex flex-column gap-2">
            <a href="{{ route('facultyMembers.edit', $facultyMember->id) }}" class="btn btn-light btn-custom">
              <i class="bi bi-pencil-square"></i>تعديل
            </a>
            <a href="{{ route('facultyMembers.index') }}" class="btn btn-outline-light btn-custom">
              <i class="bi bi-arrow-right"></i>العودة للقائمة
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Profile Content -->
    <div class="profile-container">
      <div class="row">
        <!-- Basic Information -->
        <div class="col-lg-6 mb-4">
          <div class="info-card">
            <div class="info-icon">
              <i class="bi bi-person-fill"></i>
            </div>
            <h4 class="info-label">المعلومات الأساسية</h4>
            <div class="info-value">
              <p><strong>الاسم:</strong> {{ $facultyMember->name }}</p>
              <p><strong>اسم المستخدم:</strong> {{ $facultyMember->username }}</p>
              <p><strong>كود العضو:</strong> {{ $facultyMember->faculty_code }}</p>
              @if($facultyMember->type)
                <p><strong>نوع التعيين:</strong> {{ $facultyMember->type }}</p>
              @endif
              @if($facultyMember->department)
                <p><strong>القسم:</strong> {{ $facultyMember->department->name }}</p>
              @endif
            </div>
          </div>
        </div>

        <!-- Contact Information -->
        <div class="col-lg-6 mb-4">
          <div class="contact-info">
            <h4 class="mb-3">
              <i class="bi bi-telephone-fill me-2"></i>معلومات الاتصال
            </h4>
            @if($facultyMember->email)
              <div class="contact-item">
                <i class="bi bi-envelope-fill"></i>
                <div>
                  <strong>البريد الإلكتروني:</strong><br>
                  <a href="mailto:{{ $facultyMember->email }}" class="text-white text-decoration-none">
                    {{ $facultyMember->email }}
                  </a>
                </div>
              </div>
            @endif
            @if($facultyMember->phone)
              <div class="contact-item">
                <i class="bi bi-telephone-fill"></i>
                <div>
                  <strong>رقم الهاتف:</strong><br>
                  <a href="tel:{{ $facultyMember->phone }}" class="text-white text-decoration-none">
                    {{ $facultyMember->phone }}
                  </a>
                </div>
              </div>
            @endif
            @if($facultyMember->facebook)
              <div class="contact-item">
                <i class="bi bi-facebook"></i>
                <div>
                  <strong>فيسبوك:</strong><br>
                  <a href="{{ $facultyMember->facebook }}" target="_blank" class="text-white text-decoration-none">
                    {{ $facultyMember->facebook }}
                  </a>
                </div>
              </div>
            @endif
          </div>
        </div>

        <!-- Files Section -->
        <div class="col-12 mb-4">
          <div class="file-section">
            <h4 class="mb-3">
              <i class="bi bi-file-earmark-text me-2"></i>الملفات والمستندات
            </h4>
            <div class="row">
              <div class="col-md-6">
                <div class="file-item">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <h6 class="mb-1">
                        <i class="bi bi-file-earmark-text me-2"></i>السيرة الذاتية
                      </h6>
                      <small class="opacity-75">ملف PDF للسيرة الذاتية</small>
                    </div>
                    <div>
                      @if($facultyMember->resume)
                        <a href="{{ route('resume.show', $facultyMember->id) }}" target="_blank" class="btn btn-light btn-sm">
                          <i class="bi bi-eye me-1"></i>عرض
                        </a>
                      @else
                        <span class="text-white-50">لا يوجد ملف</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="file-item">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <h6 class="mb-1">
                        <i class="bi bi-file-earmark-pdf me-2"></i>الأبحاث
                      </h6>
                      <small class="opacity-75">ملف PDF للأبحاث</small>
                    </div>
                    <div>
                      @if($facultyMember->researches)
                        <a href="{{ route('researches.show', $facultyMember->id) }}" target="_blank" class="btn btn-light btn-sm">
                          <i class="bi bi-eye me-1"></i>عرض
                        </a>
                      @else
                        <span class="text-white-50">لا يوجد ملف</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Additional Information -->
        @if($facultyMember->appointment_type || $facultyMember->appointment_date)
          <div class="col-12 mb-4">
            <div class="info-card">
              <div class="info-icon">
                <i class="bi bi-calendar-check"></i>
              </div>
              <h4 class="info-label">معلومات التعيين</h4>
              <div class="info-value">
                @if($facultyMember->appointment_type)
                  <p><strong>نوع التعيين:</strong> {{ $facultyMember->appointment_type }}</p>
                @endif
                @if($facultyMember->appointment_date)
                  <p><strong>تاريخ التعيين:</strong> {{ \Carbon\Carbon::parse($facultyMember->appointment_date)->format('Y-m-d') }}</p>
                @endif
              </div>
            </div>
          </div>
        @endif
      </div>
    </div>

    <!-- Action Buttons -->
    <div class="text-center mb-4">
      <div class="d-flex justify-content-center flex-wrap gap-3">
        <a href="{{ route('facultyMembers.edit', $facultyMember->id) }}" class="btn btn-warning btn-custom">
          <i class="bi bi-pencil-square"></i>تعديل البيانات
        </a>
        <a href="{{ route('facultyMembers.index') }}" class="btn btn-secondary btn-custom">
          <i class="bi bi-arrow-right"></i>العودة للقائمة
        </a>
        <button onclick="window.print()" class="btn btn-info btn-custom">
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
      
      // Add hover effects to profile image
      const profileImage = document.querySelector('.profile-image');
      if (profileImage) {
        profileImage.addEventListener('mouseenter', function() {
          this.style.transform = 'scale(1.1) rotate(5deg)';
        });
        
        profileImage.addEventListener('mouseleave', function() {
          this.style.transform = 'scale(1) rotate(0deg)';
        });
      }
    });
  </script>
  
  <style>
    @media print {
      .btn-custom, .profile-header .col-md-3:last-child {
        display: none !important;
      }
      
      .profile-container {
        box-shadow: none;
        border: 1px solid #ddd;
      }
    }
  </style>
@endsection

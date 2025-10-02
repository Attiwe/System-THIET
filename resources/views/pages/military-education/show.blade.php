@extends('layouts.master')
@section('title', 'عرض التربية العسكرية')

@section('css')
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts - Tajawal -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  
  <style>
    .military-content {
      background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      border-radius: 1rem;
      padding: 2rem;
      margin: 2rem 0;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      opacity: 0;
      transform: translateY(20px);
      transition: all 0.6s ease;
    }
    
    .description-text {
      font-size: 1.1rem;
      line-height: 1.8;
      color: #2c3e50;
      text-align: justify;
      white-space: pre-wrap;
      word-wrap: break-word;
      background: white;
      padding: 2rem;
      border-radius: 0.75rem;
      border-left: 5px solid #667eea;
      box-shadow: 0 5px 15px rgba(0,0,0,0.08);
      font-family: 'Tajawal', sans-serif;
    }
    
    .header-card {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      border-radius: 1rem;
      padding: 2rem;
      margin-bottom: 2rem;
      box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
    }
    
    .info-badge {
      background: rgba(255,255,255,0.2);
      color: white;
      padding: 0.5rem 1rem;
      border-radius: 2rem;
      font-weight: 500;
      backdrop-filter: blur(10px);
    }
    
    .action-buttons {
      background: white;
      border-radius: 1rem;
      padding: 1.5rem;
      box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    }
    
    .btn-custom {
      padding: 0.75rem 1.5rem;
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
    
    @media (max-width: 768px) {
      .military-content {
        padding: 1rem;
        margin: 1rem 0;
      }
      
      .header-card {
        padding: 1.5rem;
      }
      
      .description-text {
        padding: 1.5rem;
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
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> 🎖️ عرض التربية العسكرية </h2>
        <p class="mg-b-0"> عرض تفصيلي لمحتوى التربية العسكرية </p>
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
@endsection

@section('content')
  <div class="container-fluid">
    <!-- Header Card -->
    <div class="header-card">
      <div class="row align-items-center">
        <div class="col-md-8">
          <div class="d-flex align-items-center">
            <div class="icon-container me-3">
              <i class="bi bi-shield-check"></i>
            </div>
            <div>
              <h1 class="mb-2 fw-bold">التربية العسكرية</h1>
              <p class="mb-0 opacity-75">محتوى تعليمي شامل للتربية العسكرية</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="d-flex flex-column gap-2">
            <div class="info-badge">
              <i class="bi bi-calendar me-2"></i>
              {{ $militaryEducation->created_at->format('Y-m-d') }}
            </div>
            <div class="info-badge">
              <i class="bi bi-clock me-2"></i>
              {{ $militaryEducation->created_at->format('H:i') }}
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Content Card -->
    <div class="military-content">
      <div class="row">
        <div class="col-12">
          <div class="d-flex align-items-center mb-3">
            <i class="bi bi-file-text-fill text-primary me-2 fs-4"></i>
            <h3 class="mb-0 fw-bold text-dark">المحتوى</h3>
          </div>
          
          <div class="description-text">
            {{ $militaryEducation->description }}
          </div>
        </div>
      </div>
    </div>

    <!-- Action Buttons -->
    <div class="action-buttons">
      <div class="row">
        <div class="col-12">
          <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div class="d-flex gap-3 flex-wrap">
              <a href="{{ route('military-education.index') }}" class="btn-custom btn btn-outline-primary">
                <i class="bi bi-arrow-right"></i>
                العودة للقائمة
              </a>
              <a href="{{ route('military-education.edit', $militaryEducation->id) }}" class="btn-custom btn btn-primary">
                <i class="bi bi-pencil-square"></i>
                تعديل المحتوى
              </a>
            </div>
            
            <div class="d-flex gap-2">
              <button type="button" class="btn btn-outline-success btn-custom" onclick="window.print()">
                <i class="bi bi-printer"></i>
                طباعة
              </button>
              <button type="button" class="btn btn-outline-info btn-custom" onclick="copyToClipboard()">
                <i class="bi bi-clipboard"></i>
                نسخ النص
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <script>
    function copyToClipboard() {
      const text = `{{ $militaryEducation->description }}`;
      
      if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(text).then(() => {
          Swal.fire({
            icon: 'success',
            title: 'تم النسخ!',
            text: 'تم نسخ النص إلى الحافظة بنجاح',
            timer: 2000,
            showConfirmButton: false
          });
        });
      } else {
        // Fallback for older browsers
        const textArea = document.createElement('textarea');
        textArea.value = text;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand('copy');
        document.body.removeChild(textArea);
        
        Swal.fire({
          icon: 'success',
          title: 'تم النسخ!',
          text: 'تم نسخ النص إلى الحافظة بنجاح',
          timer: 2000,
          showConfirmButton: false
        });
      }
    }

    // Print styles
    window.addEventListener('beforeprint', function() {
      document.body.style.background = 'white';
    });

    window.addEventListener('afterprint', function() {
      document.body.style.background = '';
    });

    // Add smooth scrolling
    document.addEventListener('DOMContentLoaded', function() {
      // Add animation to content
      const contentCard = document.querySelector('.military-content');
      const headerCard = document.querySelector('.header-card');
      
      setTimeout(() => {
        headerCard.style.opacity = '1';
        headerCard.style.transform = 'translateY(0)';
      }, 100);
      
      setTimeout(() => {
        contentCard.style.opacity = '1';
        contentCard.style.transform = 'translateY(0)';
      }, 300);
    });
  </script>

  <!-- Print Styles -->
  <style media="print">
    .header-card {
      background: #667eea !important;
      -webkit-print-color-adjust: exact;
      print-color-adjust: exact;
    }
    
    .action-buttons {
      display: none !important;
    }
    
    .breadcrumb-header {
      display: none !important;
    }
    
    .description-text {
      border: 1px solid #ddd !important;
      box-shadow: none !important;
    }
    
    body {
      background: white !important;
    }
  </style>
@endsection

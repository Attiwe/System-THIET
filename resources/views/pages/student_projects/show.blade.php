@extends('layouts.master')
@section('title', 'عرض مشروع طلابي')

@section('css')
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts - Tajawal -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  
  <style>
    .show-card {
      background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      border-radius: 1rem;
      padding: 2rem;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    
    .info-item {
      background: white;
      border-radius: 0.5rem;
      padding: 1rem;
      margin-bottom: 1rem;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      border-right: 4px solid #667eea;
    }
    
    .info-label {
      font-weight: 600;
      color: #667eea;
      margin-bottom: 0.5rem;
    }
    
    .info-value {
      color: #2c3e50;
      font-size: 1.1rem;
    }
    
    .project-icon {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 3rem;
      box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
    }
    
    .project-image {
      width: 200px;
      height: 200px;
      border-radius: 1rem;
      object-fit: cover;
      box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }
  </style>
@endsection

@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div>
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> 👁️💡 عرض مشروع طلابي </h2>
        <p class="mg-b-0"> عرض تفاصيل المشروع الطلابي </p>
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
                <i class="bi bi-eye"></i>
              </div>
              <div>
                <h1 class="mb-2 fw-bold">عرض مشروع طلابي</h1>
                <p class="mb-0 opacity-75">تفاصيل المشروع الطلابي</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="d-flex justify-content-end gap-2">
              <a href="{{ route('studentProjects.edit', $studentProject->id) }}" class="btn btn-warning btn-lg">
                <i class="bi bi-pencil me-2"></i>تعديل
              </a>
              <a href="{{ route('studentProjects.index') }}" class="btn btn-light btn-lg">
                <i class="bi bi-arrow-left me-2"></i>العودة للقائمة
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Show Content -->
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="show-card">
          <div class="row">
            <!-- Icon and Basic Info -->
            <div class="col-md-4 text-center mb-4">
              @if($studentProject->image_work)
                <img src="{{ route('studentProjects.showImage', $studentProject->id) }}" 
                     class="project-image mx-auto mb-3" alt="{{ $studentProject->project_name }}">
              @else
                <div class="project-icon mx-auto mb-3">
                  <i class="bi bi-lightbulb"></i>
                </div>
              @endif
              <h3 class="fw-bold text-primary">{{ $studentProject->project_name }}</h3>
              <p class="text-muted">مشروع طلابي</p>
            </div>

            <!-- Details -->
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-6">
                  <div class="info-item">
                    <div class="info-label">
                      <i class="bi bi-person-fill me-2"></i>اسم الدكتور
                    </div>
                    <div class="info-value">{{ $studentProject->doctor_name }}</div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="info-item">
                    <div class="info-label">
                      <i class="bi bi-building me-2"></i>القسم
                    </div>
                    <div class="info-value">
                      @if($studentProject->department)
                        {{ $studentProject->department->name }}
                      @else
                        غير محدد
                      @endif
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="info-item">
                    <div class="info-label">
                      <i class="bi bi-calendar me-2"></i>تاريخ الإضافة
                    </div>
                    <div class="info-value">{{ $studentProject->created_at->format('Y-m-d H:i') }}</div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="info-item">
                    <div class="info-label">
                      <i class="bi bi-tag me-2"></i>النوع
                    </div>
                    <div class="info-value">
                      <span class="badge bg-success fs-6">مشروع طلابي</span>
                    </div>
                  </div>
                </div>

                <div class="col-12">
                  <div class="info-item">
                    <div class="info-label">
                      <i class="bi bi-card-text me-2"></i>وصف المشروع
                    </div>
                    <div class="info-value">{{ $studentProject->description }}</div>
                  </div>
                </div>

                @if($studentProject->image_work)
                  <div class="col-md-6">
                    <div class="info-item">
                      <div class="info-label">
                        <i class="bi bi-image me-2"></i>صورة العمل
                      </div>
                      <div class="info-value">
                        <a href="{{ route('studentProjects.showImage', $studentProject->id) }}" 
                           target="_blank" class="btn btn-primary btn-lg">
                          <i class="bi bi-image me-2"></i>عرض الصورة
                        </a>
                      </div>
                    </div>
                  </div>
                @endif

                @if($studentProject->project_pdf)
                  <div class="col-md-6">
                    <div class="info-item">
                      <div class="info-label">
                        <i class="bi bi-file-earmark-pdf me-2"></i>ملف المشروع
                      </div>
                      <div class="info-value">
                        <a href="{{ route('studentProjects.showPdf', $studentProject->id) }}" 
                           target="_blank" class="btn btn-danger btn-lg">
                          <i class="bi bi-file-pdf me-2"></i>عرض ملف PDF
                        </a>
                      </div>
                    </div>
                  </div>
                @endif
              </div>
            </div>
          </div>

          <!-- Action Buttons -->
          <div class="row mt-4">
            <div class="col-12 text-center">
              <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('studentProjects.edit', $studentProject->id) }}" class="btn btn-warning btn-lg px-4">
                  <i class="bi bi-pencil me-2"></i>تعديل
                </a>
                <form action="{{ route('studentProjects.destroy', $studentProject->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-danger btn-lg px-4 delete_confirm">
                    <i class="bi bi-trash me-2"></i>حذف
                  </button>
                </form>
                <a href="{{ route('studentProjects.index') }}" class="btn btn-secondary btn-lg px-4">
                  <i class="bi bi-arrow-left me-2"></i>العودة للقائمة
                </a>
              </div>
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
    $(document).ready(function() {
      $('.delete_confirm').on('click', function(e) {
        e.preventDefault();
        
        Swal.fire({
          title: 'هل أنت متأكد؟',
          text: "لن تتمكن من التراجع عن هذا الإجراء!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'نعم، احذف!',
          cancelButtonText: 'إلغاء',
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
            // Submit the form
            $(this).closest('form').submit();
          }
        });
      });
    });
  </script>
@endsection

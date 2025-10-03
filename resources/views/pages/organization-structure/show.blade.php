@extends('layouts.master')
@section('title', 'عرض الهيكل التنظيمي')

@section('css')
  <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
  <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endsection

@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div>
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> 🏢👁️ عرض الهيكل التنظيمي </h2>
        <p class="mg-b-0"> عرض تفاصيل الهيكل التنظيمي </p>
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
  <div class="row">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header bg-info text-white">
          <h4 class="mb-0">
            <i class="bi bi-building"></i> تفاصيل الهيكل التنظيمي
          </h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="font-weight-bold text-primary">
                  <i class="bi bi-building"></i> الوحدة:
                </label>
                <p class="form-control-plaintext border-bottom pb-2">
                  {{ $organizationStructure->unit->name }}
                </p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="font-weight-bold text-primary">
                  <i class="bi bi-calendar"></i> تاريخ الإضافة:
                </label>
                <p class="form-control-plaintext border-bottom pb-2">
                  {{ $organizationStructure->formatted_created_at }}
                </p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="font-weight-bold text-primary">
                  <i class="bi bi-clock"></i> آخر تحديث:
                </label>
                <p class="form-control-plaintext border-bottom pb-2">
                  {{ $organizationStructure->updated_at->format('d/m/Y - H:i A') }}
                </p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="font-weight-bold text-primary">
                  <i class="bi bi-file-earmark"></i> حالة الملف:
                </label>
                <p class="form-control-plaintext border-bottom pb-2">
                  @if($organizationStructure->file_exists)
                    <span class="badge bg-success">
                      <i class="bi bi-check-circle"></i> متوفر
                    </span>
                  @else
                    <span class="badge bg-danger">
                      <i class="bi bi-x-circle"></i> غير متوفر
                    </span>
                  @endif
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card">
        <div class="card-header bg-success text-white">
          <h5 class="mb-0">
            <i class="bi bi-gear"></i> الإجراءات
          </h5>
        </div>
        <div class="card-body">
          <div class="d-grid gap-2">
            <a href="{{ route('organization-structure.edit', $organizationStructure->id) }}" 
               class="btn btn-warning">
              <i class="bi bi-pencil"></i> تعديل
            </a>
            
            @if($organizationStructure->file_exists)
              <a href="{{ $organizationStructure->file_url }}" target="_blank" 
                 class="btn btn-info">
                <i class="bi bi-eye"></i> عرض الملف
              </a>
              
              <a href="{{ $organizationStructure->file_url }}" download 
                 class="btn btn-success">
                <i class="bi bi-download"></i> تحميل الملف
              </a>
            @endif
            
            <a href="{{ route('organization-structure.index') }}" 
               class="btn btn-secondary">
              <i class="bi bi-arrow-right"></i> العودة للقائمة
            </a>
            
            <button type="button" class="btn btn-danger" onclick="printPage()">
              <i class="bi bi-printer"></i> طباعة
            </button>
          </div>
        </div>
      </div>

      @if($organizationStructure->file_exists)
        <div class="card mt-3">
          <div class="card-header bg-primary text-white">
            <h6 class="mb-0">
              <i class="bi bi-info-circle"></i> معلومات الملف
            </h6>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <small class="text-muted">
                  <strong>اسم الملف:</strong><br>
                  <span class="text-primary">{{ $organizationStructure->file_name }}</span>
                </small>
              </div>
              <div class="col-12 mt-2">
                <small class="text-muted">
                  <strong>حجم الملف:</strong><br>
                  <span class="text-success">{{ $organizationStructure->file_size ?? 'غير محدد' }}</span>
                </small>
              </div>
            </div>
          </div>
        </div>
      @endif
    </div>
  </div>
@endsection

@section('js')
  <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
  function printPage() {
      window.print();
  }
  
  // Hide action buttons when printing
  window.addEventListener('beforeprint', function() {
      document.querySelectorAll('.btn').forEach(btn => {
          btn.style.display = 'none';
      });
  });
  
  // Show action buttons after printing
  window.addEventListener('afterprint', function() {
      document.querySelectorAll('.btn').forEach(btn => {
          btn.style.display = 'inline-block';
      });
  });
  </script>
@endsection

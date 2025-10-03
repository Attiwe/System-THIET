@extends('layouts.master')
@section('title', 'تعديل الهيكل التنظيمي')

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
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> 🏢✏️ تعديل الهيكل التنظيمي </h2>
        <p class="mg-b-0"> تعديل بيانات الهيكل التنظيمي </p>
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
  <div class="accordion" id="organizationAccordion">
    <div class="card">
      <!-- accordion header -->
      <div class="card-header bg-warning text-dark h3" id="headingOne">
        <h2 class="mb-0">
          <button class="btn btn-link text-dark text-2xl font-weight-bold" type="button" data-toggle="collapse"
            data-target="#collapseEdit" aria-expanded="true" aria-controls="collapseEdit">
            <i class="bi bi-pencil-square"></i> ✨ <strong class="h3">تعديل الهيكل التنظيمي</strong>
          </button>
        </h2>
      </div>
      <br>
      <!-- accordion content -->
      <div id="collapseEdit" class="collapse show" aria-labelledby="headingOne" data-parent="#organizationAccordion">
        <div class="card-body bg-white">
          <br>
          <div class="text-danger font-weight-bold">
            @include('include.validation')
          </div>
          <br>
          
          <!-- Current File Display -->
          @if($organizationStructure->file_exists)
            <div class="alert alert-info">
              <h6><i class="bi bi-file-earmark"></i> الملف الحالي:</h6>
              <div class="d-flex align-items-center gap-3">
                <a href="{{ $organizationStructure->file_url }}" target="_blank" class="btn btn-outline-primary btn-sm">
                  <i class="bi bi-eye"></i> عرض الملف الحالي
                </a>
                <a href="{{ $organizationStructure->file_url }}" download class="btn btn-outline-success btn-sm">
                  <i class="bi bi-download"></i> تحميل الملف الحالي
                </a>
                <span class="badge bg-info text-white">
                  <i class="bi bi-file-earmark"></i> {{ $organizationStructure->file_size ?? 'غير محدد' }}
                </span>
              </div>
            </div>
          @endif

          <form action="{{ route('organization-structure.update', $organizationStructure->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="form-group col-md-6">
                <label for="unit_id" class="font-weight-bold lead text-primary">
                  <i class="bi bi-building"></i> الوحدة
                </label>
                <select class="form-control @error('unit_id') is-invalid @enderror" id="unit_id" name="unit_id" required>
                  <option value="">اختر الوحدة</option>
                  @foreach($units as $unit)
                    <option value="{{ $unit->id }}" 
                            {{ old('unit_id', $organizationStructure->unit_id) == $unit->id ? 'selected' : '' }}>
                      {{ $unit->name }}
                    </option>
                  @endforeach
                </select>
                @error('unit_id')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group col-md-6">
                <label for="file_path" class="font-weight-bold lead text-primary">
                  <i class="bi bi-file-earmark-text"></i> ملف الهيكل التنظيمي الجديد
                </label>
                <input type="file" class="form-control @error('file_path') is-invalid @enderror" id="file_path" name="file_path" 
                       accept=".pdf,.jpg,.jpeg,.png">
                <small class="form-text text-muted">
                  <i class="bi bi-info-circle"></i> 
                  اتركه فارغاً للاحتفاظ بالملف الحالي. أنواع الملفات المسموحة: PDF, JPG, JPEG, PNG (حجم أقصى: 10 ميجابايت)
                </small>
                @error('file_path')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <!-- New File Preview -->
            <div class="form-group mt-3">
              <div id="filePreview" class="d-none">
                <div class="alert alert-success">
                  <h6><i class="bi bi-file-earmark-plus"></i> معاينة الملف الجديد:</h6>
                  <div id="fileInfo"></div>
                </div>
              </div>
            </div>

            <div class="d-flex justify-content-center mt-4">
              <button type="submit" class="btn btn-outline-success lead font-weight-bold me-3">
                <i class="bi bi-check-circle"></i> ✔ حفظ التعديلات
              </button>
              <a href="{{ route('organization-structure.index') }}" class="btn btn-outline-secondary lead font-weight-bold me-3">
                <i class="bi bi-arrow-right"></i> العودة للقائمة
              </a>
              <button type="reset" class="btn btn-outline-danger lead font-weight-bold">
                <i class="bi bi-x-circle"></i> ❌ إلغاء التعديلات
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
  document.addEventListener('DOMContentLoaded', function() {
      const fileInput = document.getElementById('file_path');
      const filePreview = document.getElementById('filePreview');
      const fileInfo = document.getElementById('fileInfo');

      fileInput.addEventListener('change', function(e) {
          const file = e.target.files[0];
          
          if (file) {
              const fileSize = (file.size / 1024 / 1024).toFixed(2); // Convert to MB
              const fileType = file.type;
              const fileName = file.name;
              
              fileInfo.innerHTML = `
                  <div class="row">
                      <div class="col-md-4">
                          <strong>اسم الملف:</strong><br>
                          <span class="text-primary">${fileName}</span>
                      </div>
                      <div class="col-md-4">
                          <strong>نوع الملف:</strong><br>
                          <span class="text-info">${fileType}</span>
                      </div>
                      <div class="col-md-4">
                          <strong>حجم الملف:</strong><br>
                          <span class="text-success">${fileSize} ميجابايت</span>
                      </div>
                  </div>
              `;
              
              filePreview.classList.remove('d-none');
              
              // Clear validation errors when file is selected
              if (this.classList.contains('is-invalid')) {
                  this.classList.remove('is-invalid');
                  const feedback = this.parentNode.querySelector('.invalid-feedback');
                  if (feedback) {
                      feedback.style.display = 'none';
                  }
              }
          } else {
              filePreview.classList.add('d-none');
          }
      });
      
      // Clear validation errors for unit select
      const unitSelect = document.getElementById('unit_id');
      unitSelect.addEventListener('change', function() {
          if (this.classList.contains('is-invalid')) {
              this.classList.remove('is-invalid');
              const feedback = this.parentNode.querySelector('.invalid-feedback');
              if (feedback) {
                  feedback.style.display = 'none';
              }
          }
      });
  });
  </script>
@endsection

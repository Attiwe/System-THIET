@extends('layouts.master')
@section('title', 'إضافة رسالة ماجستير/دكتوراه')

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
      background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      border-radius: 1rem;
      padding: 2rem;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    
    .form-control:focus {
      border-color: #667eea;
      box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    }
    
    .form-select:focus {
      border-color: #667eea;
      box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    }
  </style>
@endsection

@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div>
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> ➕📚 إضافة رسالة ماجستير/دكتوراه </h2>
        <p class="mg-b-0"> إضافة رسالة ماجستير أو دكتوراه جديدة </p>
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
                <h1 class="mb-2 fw-bold">إضافة رسالة ماجستير/دكتوراه</h1>
                <p class="mb-0 opacity-75">إضافة رسالة ماجستير أو دكتوراه جديدة</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="d-flex justify-content-end gap-2">
              <a href="{{ route('masterisDoctoralTheses.index') }}" class="btn btn-light btn-lg">
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
          <form action="{{ route('masterisDoctoralTheses.store') }}" method="POST" enctype="multipart/form-data">
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
                <label for="type" class="form-label fw-bold text-primary">
                  <i class="bi bi-tag me-1"></i>نوع الرسالة/الأطروحة
                </label>
                <select name="type" id="type" class="form-select" required>
                  <option value="" {{ old('type') == '' ? 'selected' : '' }}>اختر النوع</option>
                  <option value="master" {{ old('type') == 'master' ? 'selected' : '' }}>الماجستير</option>
                  <option value="doctoral" {{ old('type') == 'doctoral' ? 'selected' : '' }}>الدكتوراه</option>
                  <option value="other" {{ old('type') == 'other' ? 'selected' : '' }}>غير ذلك</option>
                </select>
              </div>
            </div>

            <br>

            <div class="row g-3">
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

              <div class="col-md-6">
                <label for="thesis_pdf" class="form-label fw-bold text-primary">
                  <i class="bi bi-file-earmark-pdf me-1"></i>ملف الرسالة/الأطروحة
                </label>
                <input type="file" class="form-control" id="thesis_pdf" name="thesis_pdf" accept="application/pdf">
                <div class="form-text">ملف PDF فقط - الحد الأقصى 10 ميجابايت</div>
              </div>
            </div>
            <br>

            <div class="row g-3">
              <div class="col-12">
                <label for="title_thesis" class="form-label fw-bold text-primary">
                  <i class="bi bi-journal-text me-1"></i>عنوان الرسالة/الأطروحة
                </label>
                <input type="text" class="form-control" id="title_thesis" name="title_thesis" 
                  value="{{ old('title_thesis') }}" placeholder="أدخل عنوان الرسالة/الأطروحة" required>
              </div>
            </div>
            <br>

            <div class="row g-3">
              <div class="col-12">
                <label for="description" class="form-label fw-bold text-primary">
                  <i class="bi bi-card-text me-1"></i>وصف الرسالة/الأطروحة
                </label>
                <textarea class="form-control" id="description" name="description" rows="6" 
                  placeholder="أدخل وصف مفصل للرسالة/الأطروحة" required>{{ old('description') }}</textarea>
              </div>
            </div>

            <div class="d-flex justify-content-center gap-3 mt-4">
              <button type="submit" class="btn btn-success btn-lg px-5">
                <i class="bi bi-check-circle me-2"></i>إضافة رسالة
              </button>
              <button type="reset" class="btn btn-outline-secondary btn-lg px-5">
                <i class="bi bi-arrow-clockwise me-2"></i>إعادة تعيين
              </button>
              <a href="{{ route('masterisDoctoralTheses.index') }}" class="btn btn-outline-danger btn-lg px-5">
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

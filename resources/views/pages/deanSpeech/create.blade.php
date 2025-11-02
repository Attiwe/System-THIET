@extends('layouts.master')
@section('title', 'إضافة كلمة العميد')

@section('css')
  <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />

  <style>
    body {
      background-color: #f8f9fc;
    }

    .form-card {
      border: none;
      border-radius: 20px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
      background: #fff;
      transition: all 0.3s ease;
    }

    .form-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 35px rgba(102, 126, 234, 0.15);
    }

    .form-header {
      background: linear-gradient(135deg, #667eea, #764ba2);
      color: #fff;
      padding: 25px 30px;
      border-radius: 20px 20px 0 0;
    }

    .form-header h4 {
      font-weight: bold;
      margin-bottom: 5px;
    }

    .form-label {
      font-weight: 600;
      color: #374151;
    }

    .form-control {
      border-radius: 12px;
      padding: 0.75rem 1rem;
      border: 1.8px solid #e2e8f0;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      border-color: #667eea;
      box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    }

    .file-upload {
      border: 2px dashed #cbd5e0;
      border-radius: 16px;
      padding: 40px 20px;
      text-align: center;
      transition: all 0.3s ease;
      background: #f9fafb;
    }

    .file-upload:hover {
      background: #f1f5ff;
      border-color: #667eea;
    }

    .file-upload i {
      font-size: 2.5rem;
      color: #667eea;
    }

    .btn-submit {
      background: linear-gradient(135deg, #667eea, #764ba2);
      border: none;
      border-radius: 12px;
      padding: 12px 30px;
      color: #fff;
      font-weight: 600;
      transition: 0.3s;
    }

    .btn-submit:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 18px rgba(102, 126, 234, 0.3);
    }

    .breadcrumb-header {
      margin-bottom: 25px;
    }

    @media (max-width: 768px) {
      .form-card {
        border-radius: 15px;
      }

      .file-upload {
        padding: 25px 10px;
      }
    }
  </style>
@endsection

@section('page-header')
  <div class="breadcrumb-header d-flex justify-content-between align-items-center">
    <div>
      <h2 class="main-content-title text-primary">
        <i class="bi bi-person-badge"></i> إضافة كلمة العميد
      </h2>
      <p class="text-muted mb-0">يرجى ملء البيانات المطلوبة أدناه</p>
    </div>
    <div>
      <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-house-door"></i> الرئيسية
      </a>
      <a href="{{ route('dean_speech.index') }}" class="btn btn-outline-primary btn-sm">
        <i class="bi bi-list-ul"></i> عرض جميع الكلمات
      </a>
    </div>
  </div>
@endsection

@section('content')
  <div class="row justify-content-center">
    <div class="col-xl-10">
      <div class="card form-card">
        <div class="form-header text-center">
          <h4><i class="bi bi-plus-circle me-2"></i> نموذج إضافة كلمة العميد</h4>
          <p class="mb-0 opacity-75">قم بإدخال كافة التفاصيل بشكل صحيح</p>
        </div>
        <div class="card-body p-4">
          @include('include.validation')

          <form action="{{ route('dean_speech.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-4">
              <div class="col-md-6">
                <label for="management_name" class="form-label">
                  <i class="bi bi-person-fill text-primary"></i> اسم العميد
                </label>
                <input type="text" class="form-control @error('management_name') is-invalid @enderror"
                  id="management_name" name="management_name" placeholder="أدخل اسم العميد الكامل"
                  value="{{ old('management_name') }}" required>
                @error('management_name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-md-6">
                <label for="title" class="form-label">
                  <i class="bi bi-chat-quote-fill text-primary"></i> كلمة العميد
                </label>
                <textarea class="form-control @error('title') is-invalid @enderror" id="title" name="title" rows="4"
                  placeholder="أدخل كلمة العميد..." required>{{ old('title') }}</textarea>
                @error('title')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-md-6">
                <label for="resume" class="form-label">
                  <i class="bi bi-file-earmark-text text-primary"></i> السيرة الذاتية (اختياري)
                </label>
                <div class="file-upload">
                  <i class="bi bi-cloud-arrow-up"></i>
                  <p class="mt-3 mb-1 fw-semibold">اسحب أو اختر ملف السيرة الذاتية</p>
                  <small class="text-muted">PDF, DOC, DOCX, TXT | حد أقصى 10MB</small>
                  <input type="file" name="resume" id="resume" class="form-control mt-3" accept=".pdf,.doc,.docx,.txt">
                </div>
              </div>

              <div class="col-md-6">
                <label for="image" class="form-label">
                  <i class="bi bi-image text-primary"></i> صورة العميد
                </label>
                <div class="file-upload">
                  <i class="bi bi-image"></i>
                  <p class="mt-3 mb-1 fw-semibold">اسحب أو اختر صورة العميد</p>
                  <small class="text-muted">PNG, JPG, JPEG | حد أقصى 5MB</small>
                  <input type="file" name="image" id="image" class="form-control mt-3" accept="image/*">
                </div>
              </div>
            </div>

            <div class="text-center mt-4">
              <button type="submit" class="btn btn-submit">
                <i class="bi bi-check-circle me-1"></i> حفظ الكلمة
              </button>
              <a href="{{ route('dean_speech.index') }}" class="btn btn-outline-secondary ms-2">
                <i class="bi bi-x-circle"></i> إلغاء
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@extends('layouts.master')
@section('title', 'إضافة فيديو قسم')
@section('css')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <style>
    .file-input-wrapper {
      position: relative;
      display: inline-block;
      width: 100%;
    }
    .file-input {
      position: absolute;
      opacity: 0;
      width: 100%;
      height: 100%;
      cursor: pointer;
    }
    .file-input-label {
      display: block;
      padding: 2rem;
      border: 2px dashed #dee2e6;
      border-radius: 8px;
      text-align: center;
      background: #f8f9fa;
      transition: all 0.3s ease;
      cursor: pointer;
    }
    .file-input-label:hover {
      border-color: #007bff;
      background: #e3f2fd;
    }
    .file-input-label.has-file {
      border-color: #28a745;
      background: #d4edda;
    }
    .video-preview {
      max-width: 100%;
      max-height: 200px;
      border-radius: 8px;
      margin-top: 1rem;
    }
    .file-info {
      margin-top: 0.5rem;
      font-size: 0.875rem;
      color: #6c757d;
    }
  </style>
@endsection
@section('page-header')
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div class="breadcrumb-title">
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">إضافة فيديو قسم</h2>
        <p class="mg-b-0">إضافة فيديو جديد لأحد الأقسام</p>
      </div>
    </div>
    <div class="main-dashboard-header-right">
      <div class="d-flex align-items-center">
        <div class="mr-5">
          <label class="tx-13 font-weight-bold">التاريخ</label>
          <div class="main-star text-primary">
            <span class="text-dark">{{ now()->format('H:i A | d-m-Y') }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('content')
  <!-- Row -->
  <div class="row row-sm">
    <div class="col-lg-8">
      <div class="card custom-card">
        <div class="card-body">
          <form action="{{ route('videos_departments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="department_id" class="form-label">القسم <span class="text-danger">*</span></label>
                  <select name="department_id" id="department_id" class="form-control @error('department_id') is-invalid @enderror" required>
                    <option value="">اختر القسم</option>
                    @foreach($departments as $department)
                      <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                      </option>
                    @endforeach
                  </select>
                  @error('department_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label for="video" class="form-label">الفيديو <span class="text-danger">*</span></label>
                  <div class="file-input-wrapper">
                    <input type="file" name="video" id="video" class="file-input @error('video') is-invalid @enderror" 
                           accept="video/*" required>
                    <label for="video" class="file-input-label" id="fileLabel">
                      <i class="bi bi-cloud-upload" style="font-size: 2rem; color: #6c757d;"></i>
                      <div class="mt-2">
                        <strong>اضغط لرفع الفيديو</strong>
                        <div class="file-info">الصيغ المدعومة: MP4, AVI, MOV, WMV, FLV, WEBM</div>
                        <div class="file-info">الحد الأقصى للحجم: 119.63 ميجابايت</div>
                      </div>
                    </label>
                  </div>
                  @error('video')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                  @enderror
                  <div id="filePreview" class="mt-3" style="display: none;">
                    <video id="videoPreview" class="video-preview" controls>
                      <source src="" type="video/mp4">
                      متصفحك لا يدعم تشغيل الفيديو.
                    </video>
                    <div class="file-info" id="fileDetails"></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group mt-4">
              <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle"></i> حفظ
              </button>
              <a href="{{ route('videos_departments.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-right"></i> إلغاء
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card custom-card">
        <div class="card-body">
          <h6 class="main-content-label mb-3">معلومات مهمة</h6>
          <div class="alert alert-info">
            <h6><i class="bi bi-info-circle"></i> تعليمات رفع الفيديو:</h6>
            <ul class="mb-0">
              <li>تأكد من اختيار القسم المناسب</li>
              <li>الصيغ المدعومة: MP4, AVI, MOV, WMV, FLV, WEBM</li>
              <li>الحد الأقصى لحجم الملف: 119.63 ميجابايت</li>
              <li>تأكد من جودة الفيديو قبل الرفع</li>
              <li>يمكنك معاينة الفيديو قبل الحفظ</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Row -->
@endsection

@section('js')
  <script>
    document.getElementById('video').addEventListener('change', function(e) {
      const file = e.target.files[0];
      const label = document.getElementById('fileLabel');
      const preview = document.getElementById('filePreview');
      const videoPreview = document.getElementById('videoPreview');
      const fileDetails = document.getElementById('fileDetails');
      
      if (file) {
        // Update label
        label.classList.add('has-file');
        label.innerHTML = `
          <i class="bi bi-check-circle text-success" style="font-size: 2rem;"></i>
          <div class="mt-2">
            <strong class="text-success">تم اختيار الفيديو</strong>
            <div class="file-info">${file.name}</div>
          </div>
        `;
        
        // Show preview
        preview.style.display = 'block';
        
        // Create video URL for preview
        const videoURL = URL.createObjectURL(file);
        videoPreview.src = videoURL;
        
        // Show file details
        const fileSize = (file.size / (1024 * 1024)).toFixed(2);
        fileDetails.innerHTML = `
          <strong>اسم الملف:</strong> ${file.name}<br>
          <strong>الحجم:</strong> ${fileSize} ميجابايت<br>
          <strong>النوع:</strong> ${file.type}
        `;
      } else {
        // Reset label
        label.classList.remove('has-file');
        label.innerHTML = `
          <i class="bi bi-cloud-upload" style="font-size: 2rem; color: #6c757d;"></i>
          <div class="mt-2">
            <strong>اضغط لرفع الفيديو</strong>
            <div class="file-info">الصيغ المدعومة: MP4, AVI, MOV, WMV, FLV, WEBM</div>
            <div class="file-info">الحد الأقصى للحجم: 100 ميجابايت</div>
          </div>
        `;
        
        // Hide preview
        preview.style.display = 'none';
      }
    });

    // Form validation
    document.querySelector('form').addEventListener('submit', function(e) {
      const departmentId = document.getElementById('department_id').value;
      const videoFile = document.getElementById('video').files[0];
      
      if (!departmentId) {
        e.preventDefault();
        alert('يرجى اختيار القسم');
        return;
      }
      
      if (!videoFile) {
        e.preventDefault();
        alert('يرجى اختيار ملف الفيديو');
        return;
      }
      
      // Check file size (119.63MB = 119.63 * 1024 * 1024 bytes)
      if (videoFile.size > 119.63 * 1024 * 1024) {
        e.preventDefault();
        alert('حجم الملف كبير جداً. الحد الأقصى 119.63 ميجابايت');
        return;
      }
    });
  </script>
@endsection

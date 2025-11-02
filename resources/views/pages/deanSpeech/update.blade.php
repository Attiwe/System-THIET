@extends('layouts.master')

@section('title')
  تعديل كلمة العميد
@endsection

@section('css')
  {{-- نفس الأكواد السابقة الخاصة بالـ CSS --}}
@endsection

@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div>
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">
          <i class="bi bi-pencil-square text-primary"></i> تعديل كلمة العميد
        </h2>
        <p class="mg-b-0">تعديل معلومات كلمة العميد</p>
      </div>
    </div>
    <div class="main-dashboard-header-right">
      <div>
        <label class="tx-13 font-weight-bold">
          <a class="text-danger" href="{{ route('dashboard') }}">
            <i class="bi bi-house-fill"></i> الرئيسية
          </a>
        </label>
      </div>
      <div>
        <label class="tx-13 font-weight-bold">
          <a class="text-primary" href="{{ route('dean_speech.index') }}">
            <i class="bi bi-list-ul"></i> عرض جميع كلمات العميد
          </a>
        </label>
      </div>
    </div>
  </div>
@endsection

@section('content')
  @include('include.error')

  <div class="row">
    <div class="col-xl-12">
      <div class="card form-card position-relative">
        <div class="card-body p-4">

          <div class="form-header">
            <h4 class="mb-0">
              <i class="bi bi-pencil-fill me-2"></i>
              نموذج تعديل كلمة العميد
            </h4>
            <p class="mb-0 mt-2 opacity-75">تعديل معلومات كلمة العميد المحددة</p>
          </div>

          @include('include.validation')

          <form action="{{ route('dean_speech.update', $news->id) }}" method="POST" enctype="multipart/form-data" id="deanSpeechForm">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $news->id }}">

            <div class="row">
              <!-- اسم العميد -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="management_name" class="form-label">
                    <i class="bi bi-person-fill text-primary"></i>
                    اسم العميد <span class="text-danger">*</span>
                  </label>
                  <input 
                    type="text" 
                    class="form-control @error('management_name') is-invalid @enderror" 
                    id="management_name" 
                    name="management_name"
                    value="{{ old('management_name', $news->management_name) }}" 
                    placeholder="أدخل اسم العميد الكامل"
                    required>
                  @error('management_name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <!-- كلمة العميد -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="title" class="form-label">
                    <i class="bi bi-chat-quote-fill text-primary"></i>
                    كلمة العميد <span class="text-danger">*</span>
                  </label>
                  <textarea 
                    class="form-control @error('title') is-invalid @enderror" 
                    id="title" 
                    name="title" 
                    rows="4"
                    placeholder="أدخل كلمة العميد..."
                    required>{{ old('title', $news->title) }}</textarea>
                  @error('title')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>

            <div class="row">
              <!-- السيرة الذاتية -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="resume" class="form-label">
                    <i class="bi bi-file-earmark-text-fill text-primary"></i>
                    السيرة الذاتية
                  </label>

                  @if($news->resume)
                    <div class="current-image-wrapper mb-3">
                      <p class="mb-2 text-muted fw-bold">الملف الحالي:</p>
                      <a href="{{ asset('image/dean-speech/resumes/' . $news->resume) }}" 
                         target="_blank" 
                         class="btn btn-sm btn-outline-primary rounded-pill">
                        <i class="bi bi-download me-1"></i> عرض الملف
                      </a>
                    </div>
                  @endif

                  <input 
                    type="file" 
                    class="form-control @error('resume') is-invalid @enderror" 
                    id="resume" 
                    name="resume"
                    accept=".pdf,.doc,.docx,.txt">
                  @error('resume')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <!-- الصورة -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="image" class="form-label">
                    <i class="bi bi-image-fill text-primary"></i>
                    صورة العميد
                  </label>

                  @if($news->image)
                    <div class="current-image-wrapper mb-3">
                      <p class="mb-2 text-muted">الصورة الحالية:</p>
                      <img 
                        src="{{ asset('image/dean-speech/' . $news->image) }}" 
                        alt="صورة العميد" 
                        class="current-image">
                    </div>
                  @endif

                  <input 
                    type="file" 
                    class="form-control @error('image') is-invalid @enderror" 
                    id="image" 
                    name="image"
                    accept="image/*"
                    onchange="previewImage(this)">
                  <div id="imagePreview" class="mt-3 text-center" style="display: none;">
                    <p class="text-primary mb-2">معاينة الصورة الجديدة:</p>
                    <img id="previewImg" src="" alt="Preview" class="img-thumbnail" style="max-width: 200px; border-radius: 10px;">
                    <button type="button" class="btn btn-sm btn-danger mt-2" onclick="removePreview()">
                      <i class="bi bi-x-circle"></i> إزالة
                    </button>
                  </div>
                  @error('image')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>

            <div class="text-center mt-4">
  <button type="submit" class="btn btn-primary">
    <i class="bi bi-save2 me-2"></i> حفظ التعديلات
  </button>
  <a href="{{ route('dean_speech.index') }}" class="btn btn-secondary">
    <i class="bi bi-x-circle me-2"></i> إلغاء
  </a>
</div>


          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
<script>
  function previewImage(input) {
    const file = input.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById('imagePreview').style.display = 'block';
        document.getElementById('previewImg').src = e.target.result;
      }
      reader.readAsDataURL(file);
    }
  }

  function removePreview() {
    document.getElementById('image').value = '';
    document.getElementById('imagePreview').style.display = 'none';
  }
</script>
@endsection

@extends('layouts.master')
@section('title', 'تعديل أهداف الوحدة')

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
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> 🎯✏️ تعديل أهداف الوحدة </h2>
        <p class="mg-b-0"> تعديل أهداف الوحدة </p>
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
  <div class="accordion" id="objectivesAccordion">
    <div class="card">
      <!-- accordion header -->
      <div class="card-header bg-warning text-dark h3" id="headingOne">
        <h2 class="mb-0">
          <button class="btn btn-link text-dark text-2xl font-weight-bold" type="button" data-toggle="collapse"
            data-target="#collapseEdit" aria-expanded="true" aria-controls="collapseEdit">
            <i class="bi bi-pencil-square"></i> ✨ <strong class="h3">تعديل أهداف الوحدة</strong>
          </button>
        </h2>
      </div>
      <br>
      <!-- accordion content -->
      <div id="collapseEdit" class="collapse show" aria-labelledby="headingOne" data-parent="#objectivesAccordion">
        <div class="card-body bg-white">
          <br>
          <div class="text-danger font-weight-bold">
            @include('include.validation')
          </div>
          <br>
          
          <!-- Current Data Display -->
          <div class="alert alert-info">
            <h6><i class="bi bi-info-circle"></i> البيانات الحالية:</h6>
            <div class="row">
              <div class="col-md-6">
                <strong>الوحدة:</strong> {{ $unitObjective->unit->name }}
              </div>
              <div class="col-md-6">
                <strong>تاريخ الإنشاء:</strong> {{ $unitObjective->formatted_created_at }}
              </div>
            </div>
          </div>

          <form action="{{ route('unit-objectives.update', $unitObjective->id) }}" method="POST">
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
                            {{ old('unit_id', $unitObjective->unit_id) == $unit->id ? 'selected' : '' }}>
                      {{ $unit->name }}
                    </option>
                  @endforeach
                </select>
                @error('unit_id')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group col-md-6">
                <label class="font-weight-bold lead text-primary">
                  <i class="bi bi-info-circle"></i> إحصائيات النص
                </label>
                <div class="form-control-plaintext border rounded p-2 bg-light">
                  <div class="row text-center">
                    <div class="col-6">
                      <small class="text-muted">عدد الأحرف:</small><br>
                      <span id="charCount" class="badge badge-info">0</span>
                    </div>
                    <div class="col-6">
                      <small class="text-muted">عدد الكلمات:</small><br>
                      <span id="wordCount" class="badge badge-success">0</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="text" class="font-weight-bold lead text-primary">
                <i class="bi bi-file-text"></i> نص الأهداف
              </label>
              <textarea class="form-control @error('text') is-invalid @enderror" id="text" name="text" rows="8" 
                        placeholder="اكتب أهداف الوحدة هنا..." required>{{ old('text', $unitObjective->text) }}</textarea>
              <small class="form-text text-muted">
                <i class="bi bi-info-circle"></i> 
                الحد الأدنى: 10 أحرف، الحد الأقصى: 2000 حرف
              </small>
              @error('text')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Text Preview -->
            <div class="form-group">
              <label class="font-weight-bold lead text-primary">
                <i class="bi bi-eye"></i> معاينة النص
              </label>
              <div id="textPreview" class="border rounded p-3 bg-light" style="min-height: 100px;">
                <p class="text-muted text-center">ستظهر معاينة النص هنا...</p>
              </div>
            </div>

            <div class="d-flex justify-content-center mt-4">
              <button type="submit" class="btn btn-outline-success lead font-weight-bold me-3">
                <i class="bi bi-check-circle"></i> ✔ حفظ التعديلات
              </button>
              <a href="{{ route('unit-objectives.index') }}" class="btn btn-outline-secondary lead font-weight-bold me-3">
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
      const textInput = document.getElementById('text');
      const charCount = document.getElementById('charCount');
      const wordCount = document.getElementById('wordCount');
      const textPreview = document.getElementById('textPreview');

      function updateStats() {
          const text = textInput.value;
          const charLength = text.length;
          const wordLength = text.trim() ? text.trim().split(/\s+/).length : 0;
          
          charCount.textContent = charLength;
          wordCount.textContent = wordLength;
          
          // Update preview
          if (text.trim()) {
              textPreview.innerHTML = `
                  <div class="text-justify">
                      <h6 class="text-primary mb-2">
                          <i class="bi bi-file-text"></i> معاينة النص:
                      </h6>
                      <p class="mb-0" style="white-space: pre-wrap; line-height: 1.6;">${text}</p>
                  </div>
              `;
          } else {
              textPreview.innerHTML = '<p class="text-muted text-center">ستظهر معاينة النص هنا...</p>';
          }
          
          // Update badge colors based on limits
          if (charLength < 10) {
              charCount.className = 'badge badge-warning';
          } else if (charLength > 2000) {
              charCount.className = 'badge badge-danger';
          } else {
              charCount.className = 'badge badge-success';
          }
          
          if (wordLength < 3) {
              wordCount.className = 'badge badge-warning';
          } else {
              wordCount.className = 'badge badge-success';
          }
      }

      textInput.addEventListener('input', updateStats);
      
      // Initial update
      updateStats();
      
      // Clear validation errors when user starts typing
      textInput.addEventListener('input', function() {
          if (this.classList.contains('is-invalid')) {
              this.classList.remove('is-invalid');
              const feedback = this.parentNode.querySelector('.invalid-feedback');
              if (feedback) {
                  feedback.style.display = 'none';
              }
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

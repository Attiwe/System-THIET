@extends('layouts.master')
@section('title', 'عرض أهداف الوحدة')

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
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> 🎯👁️ عرض أهداف الوحدة </h2>
        <p class="mg-b-0"> عرض تفاصيل أهداف الوحدة </p>
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
            <i class="bi bi-building"></i> تفاصيل أهداف الوحدة
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
                  {{ $unitObjective->unit->name }}
                </p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="font-weight-bold text-primary">
                  <i class="bi bi-calendar"></i> تاريخ الإضافة:
                </label>
                <p class="form-control-plaintext border-bottom pb-2">
                  {{ $unitObjective->formatted_created_at }}
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
                  {{ $unitObjective->updated_at->format('d/m/Y - H:i A') }}
                </p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="font-weight-bold text-primary">
                  <i class="bi bi-info-circle"></i> إحصائيات النص:
                </label>
                <div class="form-control-plaintext border-bottom pb-2">
                  <span class="badge badge-info me-2">
                    <i class="bi bi-text-paragraph"></i> {{ $unitObjective->word_count }} كلمة
                  </span>
                  <span class="badge badge-success">
                    <i class="bi bi-type"></i> {{ $unitObjective->character_count }} حرف
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Objectives Text -->
      <div class="card mt-3">
        <div class="card-header bg-primary text-white">
          <h5 class="mb-0">
            <i class="bi bi-file-text"></i> نص الأهداف
          </h5>
        </div>
        <div class="card-body">
          <div class="text-justify" style="white-space: pre-wrap; line-height: 1.8; font-size: 1.1rem;">
            {{ $unitObjective->text }}
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
            <a href="{{ route('unit-objectives.edit', $unitObjective->id) }}" 
               class="btn btn-warning">
              <i class="bi bi-pencil"></i> تعديل
            </a>
            
            <a href="{{ route('unit-objectives.index') }}" 
               class="btn btn-secondary">
              <i class="bi bi-arrow-right"></i> العودة للقائمة
            </a>
            
            <button type="button" class="btn btn-info" onclick="copyToClipboard()">
              <i class="bi bi-clipboard"></i> نسخ النص
            </button>
            
            <button type="button" class="btn btn-danger" onclick="printPage()">
              <i class="bi bi-printer"></i> طباعة
            </button>
          </div>
        </div>
      </div>

      <!-- Text Statistics -->
      <div class="card mt-3">
        <div class="card-header bg-primary text-white">
          <h6 class="mb-0">
            <i class="bi bi-graph-up"></i> إحصائيات النص
          </h6>
        </div>
        <div class="card-body">
          <div class="row text-center">
            <div class="col-6">
              <div class="p-3 bg-light rounded">
                <h4 class="text-primary mb-0">{{ $unitObjective->word_count }}</h4>
                <small class="text-muted">كلمة</small>
              </div>
            </div>
            <div class="col-6">
              <div class="p-3 bg-light rounded">
                <h4 class="text-success mb-0">{{ $unitObjective->character_count }}</h4>
                <small class="text-muted">حرف</small>
              </div>
            </div>
          </div>
          
          <hr>
          
          <div class="text-center">
            <small class="text-muted">
              <strong>متوسط طول الكلمة:</strong><br>
              <span class="badge badge-info">
                {{ $unitObjective->character_count > 0 ? round($unitObjective->character_count / $unitObjective->word_count, 1) : 0 }} حرف/كلمة
              </span>
            </small>
          </div>
        </div>
      </div>

      <!-- Reading Time Estimate -->
      <div class="card mt-3">
        <div class="card-header bg-warning text-dark">
          <h6 class="mb-0">
            <i class="bi bi-stopwatch"></i> وقت القراءة المقدر
          </h6>
        </div>
        <div class="card-body text-center">
          @php
            $readingTime = ceil($unitObjective->word_count / 200); // Assuming 200 words per minute
          @endphp
          <div class="p-3 bg-light rounded">
            <h4 class="text-warning mb-0">{{ $readingTime }}</h4>
            <small class="text-muted">دقيقة</small>
          </div>
          <small class="text-muted">(معدل 200 كلمة/دقيقة)</small>
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
  function printPage() {
      window.print();
  }
  
  function copyToClipboard() {
      const text = `{{ $unitObjective->text }}`;
      navigator.clipboard.writeText(text).then(function() {
          Swal.fire({
              title: 'تم النسخ!',
              text: 'تم نسخ النص إلى الحافظة',
              icon: 'success',
              timer: 2000,
              showConfirmButton: false
          });
      }).catch(function(err) {
          console.error('Could not copy text: ', err);
          Swal.fire({
              title: 'خطأ!',
              text: 'لم يتم النسخ بنجاح',
              icon: 'error'
          });
      });
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

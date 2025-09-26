@extends('layouts.master')
@section('title', 'إضافة بيانات المعهد')

@section('css')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endsection

@section('page-header')
<div class="breadcrumb-header justify-content-between">
  <div class="left-content">
    <div class="breadcrumb-title">
      <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">إضافة بيانات المعهد</h2>
      <div class="d-flex align-items-center gap-2">
        <strong class="mr-2">اسم المعهد:</strong>
        <span>{{ $getSetting->name }}</span>
      </div>
      @if(!empty($getSetting->logo))
        <div class="mt-2">
          <img src="{{ asset($getSetting->logo) }}" alt="Logo" height="50">
        </div>
      @endif
      <p class="mg-b-0 mt-2">رؤية الوحدة: {{ $unitVision }}</p>
      <p class="mg-b-0">رسالة الوحدة: {{ $unitMessage }}</p>
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
      <div>
        <label class="tx-13 font-weight-bold">الصفحه الرئيسيه</label>
        <h5><a class="text-danger" href="{{ route('dashboard') }}"><i class="bi bi-house-fill"></i> الرئيسيه</a></h5>
      </div>
    </div>
  </div>
</div>
<br>
@include('include.validation')
@include('include.success')
@endsection

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('institutes.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label><i class="bi bi-diagram-3"></i> الوحدة</label>
            <select name="unit_id" class="form-control">
              <option value="">-- اختر الوحدة --</option>
              @foreach($units as $u)
                <option value="{{ $u->id }}">{{ $u->name }}</option>
              @endforeach
            </select>
            <small class="form-text text-muted">اختياري: إذا تركته فارغاً سيتم اختيار أول وحدة تلقائياً.</small>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label><i class="bi bi-youtube"></i> رابط الفيديو</label>
            <input type="text" class="form-control" name="vidio" value="{{ old('vidio') }}" placeholder="مثال: https://youtu.be/...">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label><i class="bi bi-chat-quote"></i> كلمة</label>
            <input type="text" class="form-control" name="word" value="{{ old('word') }}" placeholder="اكتب كلمة المعهد">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label><i class="bi bi-list-check"></i> المحاور</label>
            <input type="text" class="form-control" name="muhadara" value="{{ old('muhadara') }}" placeholder="اكتب المحاور">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label><i class="bi bi-star"></i> القيم</label>
            <input type="text" class="form-control" name="values" value="{{ old('values') }}" placeholder="اكتب القيم">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label><i class="bi bi-flag"></i> الخطة</label>
            <input type="text" class="form-control" name="plan" value="{{ old('plan') }}" placeholder="اكتب الخطة">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label><i class="bi bi-bullseye"></i> الاهداف</label>
            <input type="text" class="form-control" name="goals" value="{{ old('goals') }}" placeholder="اكتب الاهداف">
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label><i class="bi bi-people"></i> عدد الطلاب</label>
            <input type="number" class="form-control" name="number" value="{{ old('number') }}" placeholder="مثال: 1500">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label><i class="bi bi-person-gear"></i> العاملين</label>
            <input type="number" class="form-control" name="employees" value="{{ old('employees') }}" placeholder="مثال: 120">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label><i class="bi bi-easel"></i> القاعات</label>
            <input type="number" class="form-control" name="classrooms" value="{{ old('classrooms') }}" placeholder="مثال: 20">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label><i class="bi bi-mortarboard"></i> الخريجين</label>
            <input type="number" class="form-control" name="graduates" value="{{ old('graduates') }}" placeholder="مثال: 500">
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label><i class="bi bi-file-earmark-text"></i> المجلس الأكاديمي (ملف)</label>
            <input type="file" class="form-control file-input" name="academic_council">
            <small class="form-text text-muted file-hint"></small>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label><i class="bi bi-diagram-3"></i> الهيكل التنظيمي (ملف)</label>
            <input type="file" class="form-control file-input" name="structure">
            <small class="form-text text-muted file-hint"></small>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label><i class="bi bi-journal-text"></i> إستراتيجية التعليم (ملف)</label>
            <input type="file" class="form-control file-input" name="strategy">
            <small class="form-text text-muted file-hint"></small>
          </div>
        </div>
      </div>
      <div class="text-left">
        <button class="btn btn-success"><i class="bi bi-save"></i> حفظ</button>
        <a href="{{ route('institutes.index') }}" class="btn btn-secondary">رجوع</a>
      </div>
    </form>
  </div>
</div>
@endsection

@section('js')
<script>
  document.querySelectorAll('.file-input').forEach(function(inp){
    inp.addEventListener('change', function(){
      const file = this.files && this.files[0];
      const hint = this.closest('.form-group').querySelector('.file-hint');
      if(file && hint){
        const sizeMB = (file.size / (1024*1024)).toFixed(2);
        hint.textContent = `الملف: ${file.name} — الحجم: ${sizeMB} MB`;
      } else if(hint) {
        hint.textContent = '';
      }
    });
  });
</script>
@endsection

@extends('layouts.master')
@section('title', '  حقوق  الطلابه')

@section('css')
  <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
  <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('page-header')
 <!-- breadcrumb -->
 <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div>
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> حقوق الطلاب </h2>
        <p class="mg-b-0"> يعرض جدول حقوق الطلاب </p>
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
  <br>
  <br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">إضافة حقوق طلاب جديدة</h3>
                        <a href="{{ route('student-rights.index') }}" class="btn btn-secondary">
                            <i class="fa fa-arrow-right"></i> العودة للقائمة
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('student-rights.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="details" class="form-label">تفاصيل حقوق الطلاب <span class="text-danger">*</span></label>
                            <textarea 
                                name="details" 
                                id="details" 
                                class="form-control @error('details') is-invalid @enderror" 
                                rows="15" 
                                placeholder="اكتب تفاصيل حقوق الطلاب هنا..."
                                required
                            >{{ old('details') }}</textarea>
                            @error('details')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                الحد الأدنى: 10 أحرف | الحد الأقصى: 5000 حرف
                            </small>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fa fa-save"></i> حفظ حقوق الطلاب
                            </button>
                            <a href="{{ route('student-rights.index') }}" class="btn btn-secondary btn-lg mr-2">
                                <i class="fa fa-times"></i> إلغاء
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const textarea = document.getElementById('details');
    const charCount = document.createElement('div');
    charCount.className = 'text-muted text-right mt-1';
    charCount.innerHTML = 'عدد الأحرف: <span id="charCount">0</span> / 5000';
    textarea.parentNode.appendChild(charCount);

    function updateCharCount() {
        const count = textarea.value.length;
        document.getElementById('charCount').textContent = count;
        
        if (count > 5000) {
            document.getElementById('charCount').style.color = 'red';
        } else if (count < 10) {
            document.getElementById('charCount').style.color = 'orange';
        } else {
            document.getElementById('charCount').style.color = 'green';
        }
    }

    textarea.addEventListener('input', updateCharCount);
    updateCharCount();
});
</script>
@endsection

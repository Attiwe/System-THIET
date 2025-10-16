@extends('layouts.master')
@section('title', 'عرض المجلس الأكاديمي')

@section('css')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('page-header')
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div>
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> 📄 عرض المجلس الأكاديمي </h2>
        <p class="mg-b-0"> عرض تفاصيل المجلس الأكاديمي </p>
      </div>
    </div>
    <div class="main-dashboard-header-right">
      <div>
        <label class="tx-13 font-weight-bold">  التاريخ </label>
        <div class="main-star text-primary">
          <span class="text-dark"> {{ now()->format('H:i A | d-m-Y') }} </span>
        </div> 
      </div>
      <div>
        <label class="tx-13 font-weight-bold"> الصفحه الرئيسيه  </label>
        <h5><a class="text-danger" href="{{ route('dashboard') }}"><i class="bi bi-house-fill"></i> الرئيسيه</a></h5>
      </div>
    </div>
  </div>
  <br>
  <br>
  <br>
@endsection

@section('content')
  <div class="container-fluid py-4">
    <div class="card shadow-sm">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">تفاصيل المجلس الأكاديمي</h5>
        <div>
          <a href="{{ route('academic.councils.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-right"></i> العودة للقائمة
          </a>
        </div>
      </div>

      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label fw-bold">تاريخ الإنشاء:</label>
              <p class="form-control-plaintext">{{ $academicCouncil->created_at->format('Y-m-d H:i:s') }}</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label fw-bold">تاريخ آخر تحديث:</label>
              <p class="form-control-plaintext">{{ $academicCouncil->updated_at->format('Y-m-d H:i:s') }}</p>
            </div>
          </div>
        </div>

        @if($academicCouncil->pdf)
          <div class="mb-3">
            <label class="form-label fw-bold">الملف:</label>
            <div class="d-flex gap-2">
              <a href="{{ route('academic.councils.showPdf', $academicCouncil->id) }}" target="_blank" class="btn btn-outline-info">
                <i class="bi bi-eye"></i> عرض PDF
              </a>
              <a href="{{ route('academic.councils.download', $academicCouncil->id) }}" class="btn btn-outline-success">
                <i class="bi bi-download"></i> تحميل PDF
              </a>
            </div>
          </div>
        @else
          <div class="alert alert-warning">
            <i class="bi bi-exclamation-triangle"></i> لا يوجد ملف PDF مرتبط بهذا المجلس الأكاديمي.
          </div>
        @endif
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection

@extends('layouts.master')
@section('title', 'تفاصيل دار النشر')

@section('css')
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div>
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> <i class="bi bi-building"></i> تفاصيل دار النشر </h2>
        <p class="mg-b-0"> عرض تفاصيل دار النشر </p>
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
  
  <div class="card card-body">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-primary text-white">
            <h4 class="card-title mb-0">
              <i class="bi bi-building"></i> تفاصيل دار النشر
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label fw-bold">
                    <i class="bi bi-building text-primary"></i> اسم دار النشر:
                  </label>
                  <p class="form-control-plaintext">{{ $publishing->publishing_name }}</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label fw-bold">
                    <i class="bi bi-telephone text-primary"></i> رقم الهاتف:
                  </label>
                  <p class="form-control-plaintext">
                    <i class="bi bi-telephone-fill text-info"></i> {{ $publishing->phone }}
                  </p>
                </div>
              </div>
            </div>
            
            <div class="row mt-3">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-label fw-bold">
                    <i class="bi bi-file-text text-primary"></i> وصف دار النشر:
                  </label>
                  <div class="border p-3 rounded">
                    {{ $publishing->publishing_description ?? 'لا يوجد وصف' }}
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row mt-3">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label fw-bold">
                    <i class="bi bi-calendar-plus text-primary"></i> تاريخ الإنشاء:
                  </label>
                  <p class="form-control-plaintext">{{ $publishing->created_at->format('Y-m-d H:i:s') }}</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label fw-bold">
                    <i class="bi bi-calendar-check text-primary"></i> آخر تحديث:
                  </label>
                  <p class="form-control-plaintext">{{ $publishing->updated_at->format('Y-m-d H:i:s') }}</p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="d-flex justify-content-between">
              <a href="{{ route('publishings.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> العودة للقائمة
              </a>
              <div>
                <a href="{{ route('publishings.edit', $publishing->id) }}" class="btn btn-primary">
                  <i class="bi bi-pencil"></i> تعديل
                </a>
                <form action="{{ route('publishings.destroy', $publishing->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-danger delete_confirm">
                    <i class="bi bi-trash"></i> حذف
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @include('pages.publishings._delete')
@endsection

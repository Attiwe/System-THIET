@extends('layouts.master')
@section('title', 'تفاصيل عن المعهد')

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
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> <i class="bi bi-building-gear"></i> تفاصيل   المعهد </h2>
        <p class="mg-b-0"> عرض تفاصيل   المعهد </p>
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
              <i class="bi bi-building-gear"></i> تفاصيل   المعهد
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-label fw-bold">
                    <i class="bi bi-eye text-primary"></i> الرؤية:
                  </label>
                  <div class="border p-3 rounded bg-light">
                    {{ $unitInstitute->vision }}
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-label fw-bold">
                    <i class="bi bi-chat-dots text-primary"></i> الرسالة:
                  </label>
                  <div class="border p-3 rounded bg-light">
                    {{ $unitInstitute->message }}
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-label fw-bold">
                    <i class="bi bi-file-text text-primary"></i> الوصف:
                  </label>
                  <div class="border p-3 rounded bg-light">
                    {{ $unitInstitute->description }}
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row mt-3">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-label fw-bold">
                    <i class="bi bi-calendar-plus text-primary"></i> تاريخ الإنشاء:
                  </label>
                  <p class="form-control-plaintext">{{ $unitInstitute->created_at->format('Y-m-d H:i:s') }}</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-label fw-bold">
                    <i class="bi bi-calendar-check text-primary"></i> آخر تحديث:
                  </label>
                  <p class="form-control-plaintext">{{ $unitInstitute->updated_at->format('Y-m-d H:i:s') }}</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-label fw-bold">
                    <i class="bi bi-toggle-on text-primary"></i> الحالة:
                  </label>
                  <p class="form-control-plaintext">
                    @if($unitInstitute->status)
                      <span class="badge bg-success px-3 py-2"><i class="bi bi-check-lg"></i> مفعل</span>
                    @else
                      <span class="badge bg-danger px-3 py-2"><i class="bi bi-x-lg"></i> غير مفعل</span>
                    @endif
                  </p>
                </div>
              </div>
            </div>

            @if($unitInstitute->image)
              <div class="row mt-3">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-label fw-bold">
                      <i class="bi bi-image text-primary"></i> صورة وحدة المعهد:
                    </label>
                    <div class="text-center">
                      <img src="{{ Storage::url('unit_institutes/' . $unitInstitute->image) }}" alt="صورة وحدة المعهد" class="img-fluid rounded border" style="max-height: 400px;">
                      <br>
                      <a href="{{ Storage::url('unit_institutes/' . $unitInstitute->image) }}" target="_blank" class="btn btn-outline-info mt-2">
                        <i class="bi bi-eye-fill"></i> عرض الصورة بالحجم الكامل
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            @endif
          </div>
          <div class="card-footer">
            <div class="d-flex justify-content-between">
              <a href="{{ route('unit_institutes.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> العودة للقائمة
              </a>
              <div>
                <a href="{{ route('unit_institutes.edit', $unitInstitute->id) }}" class="btn btn-primary">
                  <i class="bi bi-pencil"></i> تعديل
                </a>
                <form action="{{ route('unit_institutes.destroy', $unitInstitute->id) }}" method="POST" class="d-inline">
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
  @include('pages.unit_institutes._delete')
@endsection

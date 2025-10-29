@extends('layouts.master')
@section('title', 'تفاصيل الصلاحية')

@section('css')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endsection

@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div>
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">تفاصيل الصلاحية</h2>
        <p class="mg-b-0">عرض تفاصيل الصلاحية والصلاحيات المرتبطة بها</p>
      </div>
    </div>
    <div class="main-dashboard-header-right">
      <div>
        <label class="tx-13 font-weight-bold">التاريخ</label>
        <div class="main-star text-primary">
          <span class="text-dark">{{ now()->format('H:i A | d-m-Y') }}</span>
        </div>
      </div>
      <div>
        <label class="tx-13 font-weight-bold">الصفحة الرئيسية</label>
        <h5><a class="text-danger" href="{{ route('dashboard') }}"><i class="bi bi-house-fill"></i> الرئيسية</a></h5>
      </div>
    </div>
  </div>
  <br>
  @include('include.success')
@endsection

@section('content')
  <div class="row">
    <!-- معلومات الصلاحية الأساسية -->
    <div class="col-lg-4">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-primary text-white">
          <h5 class="mb-0"><i class="bi bi-info-circle"></i> المعلومات الأساسية</h5>
        </div>
        <div class="card-body">
          <div class="mb-3">
            <label class="form-label text-muted">اسم الصلاحية</label>
            <div class="form-control-plaintext fw-bold text-primary fs-5">
              <i class="bi bi-shield-fill"></i> {{ $user->name }}
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label text-muted">البريد الإلكتروني</label>
            <div class="form-control-plaintext fw-bold">
              <i class="bi bi-envelope"></i> {{ $user->email }}
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label text-muted">تاريخ الإنشاء</label>
            <div class="form-control-plaintext fw-bold">
              <i class="bi bi-calendar"></i> {{ $user->created_at ? $user->created_at->format('d/m/Y H:i') : 'غير محدد' }}
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label text-muted">آخر تحديث</label>
            <div class="form-control-plaintext fw-bold">
              <i class="bi bi-clock"></i> {{ $user->updated_at ? $user->updated_at->format('d/m/Y H:i') : 'غير محدد' }}
            </div>
          </div>

          <div class="d-grid gap-2">
            <a href="{{ route('roles.edit', $user->id) }}" class="btn btn-primary">
              <i class="bi bi-pencil"></i> تعديل الصلاحية
            </a>
            <a href="{{ route('roles.index') }}" class="btn btn-outline-secondary">
              <i class="bi bi-arrow-right"></i> العودة للقائمة
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- الصلاحيات المرتبطة -->
    <div class="col-lg-8">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-success text-white">
          <h5 class="mb-0">
            <i class="bi bi-shield-check"></i> الصلاحيات المرتبطة 
            <span class="badge bg-light text-dark">{{ $user->permissions->count() }}</span>
          </h5>
        </div>
        <div class="card-body">
          @if($user->permissions->count() > 0)
            @php
              $groupedPermissions = $user->permissions->groupBy('group');
            @endphp
            
            @foreach($groupedPermissions as $group => $permissions)
              <div class="mb-4">
                <h6 class="text-primary border-bottom pb-2 mb-3">
                  <i class="bi bi-collection"></i> {{ $group }}
                  <span class="badge bg-primary">{{ $permissions->count() }}</span>
                </h6>
                
                <div class="row">
                  @foreach($permissions as $permission)
                    <div class="col-md-6 col-lg-4 mb-2">
                      <div class="card border-success border-opacity-25 bg-success bg-opacity-10">
                        <div class="card-body p-2">
                          <div class="d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <div>
                              <strong class="text-dark">{{ $permission->display_name }}</strong>
                              @if($permission->description)
                                <small class="text-muted d-block">{{ $permission->description }}</small>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            @endforeach
          @else
            <div class="text-center text-muted py-5">
              <i class="bi bi-shield-x" style="font-size: 64px;"></i>
              <h5 class="mt-3">لا توجد صلاحيات مرتبطة</h5>
              <p>هذه الصلاحية لا تحتوي على أي صلاحيات محددة</p>
              <a href="{{ route('roles.edit', $user->id) }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> إضافة صلاحيات
              </a>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>

  <!-- إحصائيات إضافية -->
  <div class="row mt-4">
    <div class="col-12">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-info text-white">
          <h5 class="mb-0"><i class="bi bi-graph-up"></i> إحصائيات الصلاحية</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-3">
              <div class="text-center">
                <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                  <i class="bi bi-shield-check text-primary" style="font-size: 24px;"></i>
                </div>
                <h4 class="mt-2 mb-0 text-primary">{{ $user->permissions->count() }}</h4>
                <p class="text-muted mb-0">إجمالي الصلاحيات</p>
              </div>
            </div>
            
            <div class="col-md-3">
              <div class="text-center">
                <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                  <i class="bi bi-collection text-success" style="font-size: 24px;"></i>
                </div>
                <h4 class="mt-2 mb-0 text-success">{{ $user->permissions->groupBy('group')->count() }}</h4>
                <p class="text-muted mb-0">عدد المجموعات</p>
              </div>
            </div>
            
            <div class="col-md-3">
              <div class="text-center">
                <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                  <i class="bi bi-calendar text-warning" style="font-size: 24px;"></i>
                </div>
                <h4 class="mt-2 mb-0 text-warning">{{ $user->created_at ? $user->created_at->diffInDays() : 0 }}</h4>
                <p class="text-muted mb-0">أيام منذ الإنشاء</p>
              </div>
            </div>
            
            <div class="col-md-3">
              <div class="text-center">
                <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                  <i class="bi bi-clock text-info" style="font-size: 24px;"></i>
                </div>
                <h4 class="mt-2 mb-0 text-info">{{ $user->updated_at ? $user->updated_at->diffInDays() : 0 }}</h4>
                <p class="text-muted mb-0">أيام منذ آخر تحديث</p>
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
@endsection

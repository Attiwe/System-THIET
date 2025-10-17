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
        <p class="mg-b-0">عرض تفاصيل الصلاحية الفرعية والأدوار المرتبطة بها</p>
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
              <code>{{ $permission->name }}</code>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label text-muted">اسم العرض</label>
            <div class="form-control-plaintext fw-bold">
              <i class="bi bi-shield-check"></i> {{ $permission->display_name }}
            </div>
          </div>

          @if($permission->description)
            <div class="mb-3">
              <label class="form-label text-muted">الوصف</label>
              <div class="form-control-plaintext fw-bold">
                {{ $permission->description }}
              </div>
            </div>
          @endif

          @if($permission->group)
            <div class="mb-3">
              <label class="form-label text-muted">المجموعة</label>
              <div class="form-control-plaintext fw-bold">
                <span class="badge bg-info">{{ $permission->group }}</span>
              </div>
            </div>
          @endif

          <div class="mb-3">
            <label class="form-label text-muted">تاريخ الإنشاء</label>
            <div class="form-control-plaintext fw-bold">
              <i class="bi bi-calendar"></i> {{ $permission->created_at->format('d/m/Y H:i') }}
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label text-muted">آخر تحديث</label>
            <div class="form-control-plaintext fw-bold">
              <i class="bi bi-clock"></i> {{ $permission->updated_at->format('d/m/Y H:i') }}
            </div>
          </div>

          <div class="d-grid gap-2">
            <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-primary">
              <i class="bi bi-pencil"></i> تعديل الصلاحية
            </a>
            <a href="{{ route('permissions.index') }}" class="btn btn-outline-secondary">
              <i class="bi bi-arrow-right"></i> العودة للقائمة
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- الأدوار المرتبطة -->
    <div class="col-lg-8">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-success text-white">
          <h5 class="mb-0">
            <i class="bi bi-shield"></i> الأدوار المرتبطة 
            <span class="badge bg-light text-dark">{{ $permission->roles->count() }}</span>
          </h5>
        </div>
        <div class="card-body">
          @if($permission->roles->count() > 0)
            <div class="table-responsive">
              <table class="table table-hover">
                <thead class="table-light">
                  <tr>
                    <th>#</th>
                    <th>اسم الدور</th>
                    <th>البريد الإلكتروني</th>
                    <th>تاريخ الإنشاء</th>
                    <th>العمليات</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($permission->roles as $role)
                    <tr>
                      <td class="fw-bold text-secondary">{{ $loop->iteration }}</td>
                      <td class="fw-bold text-primary">
                        <i class="bi bi-shield-fill"></i> {{ $role->role }}
                      </td>
                      <td class="fw-bold text-dark">{{ $role->email }}</td>
                      <td class="fw-bold text-secondary">{{ $role->created_at->format('d/m/Y') }}</td>
                      <td>
                        <a href="{{ route('roles.show', $role->id) }}" class="btn btn-sm btn-outline-info">
                          <i class="bi bi-eye"></i> عرض
                        </a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          @else
            <div class="text-center text-muted py-5">
              <i class="bi bi-shield-x" style="font-size: 64px;"></i>
              <h5 class="mt-3">لا توجد أدوار مرتبطة</h5>
              <p>هذه الصلاحية غير مرتبطة بأي دور حالياً</p>
              <a href="{{ route('roles.index') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> إدارة الأدوار
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
                  <i class="bi bi-shield text-primary" style="font-size: 24px;"></i>
                </div>
                <h4 class="mt-2 mb-0 text-primary">{{ $permission->roles->count() }}</h4>
                <p class="text-muted mb-0">الأدوار المرتبطة</p>
              </div>
            </div>
            
            <div class="col-md-3">
              <div class="text-center">
                <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                  <i class="bi bi-calendar text-success" style="font-size: 24px;"></i>
                </div>
                <h4 class="mt-2 mb-0 text-success">{{ $permission->created_at->diffInDays() }}</h4>
                <p class="text-muted mb-0">أيام منذ الإنشاء</p>
              </div>
            </div>
            
            <div class="col-md-3">
              <div class="text-center">
                <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                  <i class="bi bi-clock text-warning" style="font-size: 24px;"></i>
                </div>
                <h4 class="mt-2 mb-0 text-warning">{{ $permission->updated_at->diffInDays() }}</h4>
                <p class="text-muted mb-0">أيام منذ آخر تحديث</p>
              </div>
            </div>
            
            <div class="col-md-3">
              <div class="text-center">
                <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                  <i class="bi bi-collection text-info" style="font-size: 24px;"></i>
                </div>
                <h4 class="mt-2 mb-0 text-info">{{ $permission->group ? 1 : 0 }}</h4>
                <p class="text-muted mb-0">{{ $permission->group ? 'مجموعة محددة' : 'بدون مجموعة' }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- معلومات تقنية -->
  <div class="row mt-4">
    <div class="col-12">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-dark text-white">
          <h5 class="mb-0"><i class="bi bi-code-slash"></i> المعلومات التقنية</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <h6 class="text-primary">معرف الصلاحية (ID):</h6>
              <code class="bg-light p-2 rounded">{{ $permission->id }}</code>
            </div>
            <div class="col-md-6">
              <h6 class="text-primary">اسم الصلاحية (Name):</h6>
              <code class="bg-light p-2 rounded">{{ $permission->name }}</code>
            </div>
          </div>
          
          @if($permission->group)
            <div class="row mt-3">
              <div class="col-md-6">
                <h6 class="text-primary">المجموعة (Group):</h6>
                <code class="bg-light p-2 rounded">{{ $permission->group }}</code>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection

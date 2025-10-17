@extends('layouts.master')
@section('title', 'جميع الصلاحيات المتاحة')

@section('css')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endsection

@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div>
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">جميع الصلاحيات المتاحة</h2>
        <p class="mg-b-0">عرض جميع الصلاحيات والأدوار في النظام</p>
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
  <!-- الصلاحيات المتاحة -->
  <div class="col-md-8">
    <div class="card">
      <div class="card-header bg-primary text-white">
        <h5 class="mb-0"><i class="bi bi-shield-check"></i> الصلاحيات المتاحة ({{ \App\Models\Permission::count() }})</h5>
      </div>
      <div class="card-body">
        @php
          $permissions = \App\Models\Permission::orderBy('group')->orderBy('display_name')->get()->groupBy('group');
        @endphp
        
        @foreach($permissions as $group => $groupPermissions)
          <div class="card border-0 shadow-sm mb-3">
            <div class="card-header bg-light">
              <h6 class="mb-0 text-primary">
                <i class="bi bi-collection"></i> {{ $group }}
                <span class="badge bg-primary">{{ $groupPermissions->count() }}</span>
              </h6>
            </div>
            <div class="card-body">
              <div class="row">
                @foreach($groupPermissions as $permission)
                  <div class="col-md-6 mb-2">
                    <div class="d-flex align-items-center">
                      <span class="badge bg-light text-dark me-2">{{ $permission->name }}</span>
                      <span class="text-muted">{{ $permission->display_name }}</span>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <!-- الأدوار المتاحة -->
  <div class="col-md-4">
    <div class="card">
      <div class="card-header bg-success text-white">
        <h5 class="mb-0"><i class="bi bi-people"></i> الأدوار المتاحة ({{ \App\Models\Roles::count() }})</h5>
      </div>
      <div class="card-body">
        @php
          $roles = \App\Models\Roles::with('permissions')->get();
        @endphp
        
        @foreach($roles as $role)
          <div class="card border-0 shadow-sm mb-3">
            <div class="card-body">
              <h6 class="text-primary mb-2">
                <i class="bi bi-person-badge"></i> {{ $role->role }}
              </h6>
              <p class="text-muted mb-2">
                <i class="bi bi-envelope"></i> {{ $role->email }}
              </p>
              <div class="mb-2">
                <small class="text-muted">الصلاحيات: {{ $role->permissions->count() }}</small>
              </div>
              
              @if($role->permissions->count() > 0)
                <div class="mt-2">
                  <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#permissions{{ $role->id }}" aria-expanded="false">
                    <i class="bi bi-eye"></i> عرض الصلاحيات
                  </button>
                  <div class="collapse mt-2" id="permissions{{ $role->id }}">
                    <div class="d-flex flex-wrap gap-1">
                      @foreach($role->permissions as $permission)
                        <span class="badge bg-light text-dark border">{{ $permission->name }}</span>
                      @endforeach
                    </div>
                  </div>
                </div>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

<!-- معلومات النظام -->
<div class="row mt-4">
  <div class="col-md-12">
    <div class="card border-info">
      <div class="card-header bg-info text-white">
        <h5 class="mb-0"><i class="bi bi-info-circle"></i> معلومات النظام</h5>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-3">
            <div class="text-center">
              <h4 class="text-primary">{{ \App\Models\Permission::count() }}</h4>
              <p class="text-muted">إجمالي الصلاحيات</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="text-center">
              <h4 class="text-success">{{ \App\Models\Roles::count() }}</h4>
              <p class="text-muted">إجمالي الأدوار</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="text-center">
              <h4 class="text-info">{{ \App\Models\Permission::distinct('group')->count() }}</h4>
              <p class="text-muted">مجموعات الصلاحيات</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="text-center">
              <h4 class="text-warning">{{ \App\Models\User::count() }}</h4>
              <p class="text-muted">إجمالي المستخدمين</p>
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

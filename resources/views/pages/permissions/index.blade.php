@extends('layouts.master')
@section('title', 'إدارة الصلاحيات الفرعية')

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
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">إدارة الصلاحيات الفرعية</h2>
        <p class="mg-b-0">إدارة جميع الصلاحيات الفرعية في النظام</p>
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
  <div class="card card-body">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="text-primary mb-0">🛡️ الصلاحيات الفرعية</h2>
      <div>
        @if(\App\Helpers\PermissionHelper::hasPermission('roles.read'))
          <a href="{{ route('roles.index') }}" class="btn btn-outline-info me-2">
            <i class="bi bi-shield"></i> إدارة الصلاحيات
          </a>
        @endif
        @if(\App\Helpers\PermissionHelper::hasPermission('roles.create'))
          <a href="{{ route('permissions.create') }}" class="btn btn-outline-primary">
            <i class="bi bi-plus-circle"></i> إضافة صلاحية جديدة
          </a>
        @endif
      </div>
    </div>

    @forelse ($permissions as $group => $groupPermissions)
      <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-gradient" style="background: linear-gradient(45deg, #007bff, #0056b3);">
          <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0 text-white">
              <i class="bi bi-collection"></i> {{ $group }}
              <span class="badge bg-light text-dark">{{ $groupPermissions->count() }}</span>
            </h5>
            <button class="btn btn-sm btn-outline-light" type="button" data-bs-toggle="collapse" data-bs-target="#group{{ $loop->index }}" aria-expanded="false">
              <i class="bi bi-chevron-down"></i>
            </button>
          </div>
        </div>
        <div class="collapse" id="group{{ $loop->index }}">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead class="table-light">
                  <tr>
                    <th>#</th>
                    <th>اسم الصلاحية</th>
                    <th>اسم العرض</th>
                    <th>الوصف</th>
                    <th>عدد الأدوار</th>
                    <th>العمليات</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($groupPermissions as $permission)
                    <tr>
                      <td class="fw-bold text-secondary">{{ $loop->iteration }}</td>
                      <td class="fw-bold text-primary">
                        <code>{{ $permission->name }}</code>
                      </td>
                      <td class="fw-bold text-dark">{{ $permission->display_name }}</td>
                      <td class="text-muted">{{ $permission->description ?? 'لا يوجد وصف' }}</td>
                      <td>
                        <span class="badge bg-info">{{ $permission->roles->count() }}</span>
                      </td>
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton{{ $permission->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-gear"></i> خيارات
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $permission->id }}">
                            <li>
                              <a href="{{ route('permissions.show', $permission->id) }}" class="dropdown-item text-info">
                                <i class="bi bi-eye"></i> عرض التفاصيل
                              </a>
                            </li>
                            <li>
                              <a href="{{ route('permissions.edit', $permission->id) }}" class="dropdown-item text-primary">
                                <i class="bi bi-pencil"></i> تعديل
                              </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                              <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="dropdown-item text-danger delete_confirm" onclick="return confirm('هل أنت متأكد من حذف هذه الصلاحية؟')">
                                  <i class="bi bi-trash"></i> حذف
                                </button>
                              </form>
                            </li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    @empty
      <div class="text-center text-muted py-5">
        <i class="bi bi-shield-x" style="font-size: 64px;"></i>
        <h4 class="mt-3">لا توجد صلاحيات متاحة</h4>
        <p>لم يتم إنشاء أي صلاحيات فرعية بعد</p>
        <a href="{{ route('permissions.create') }}" class="btn btn-primary">
          <i class="bi bi-plus-circle"></i> إضافة صلاحية جديدة
        </a>
      </div>
    @endforelse

    <!-- إحصائيات عامة -->
    @if($permissions->count() > 0)
      <div class="card border-0 shadow-sm mt-4">
        <div class="card-header bg-dark text-white">
          <h5 class="mb-0"><i class="bi bi-graph-up"></i> إحصائيات عامة</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <div class="text-center">
                <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                  <i class="bi bi-shield-check text-primary" style="font-size: 24px;"></i>
                </div>
                <h4 class="mt-2 mb-0 text-primary">{{ $permissions->flatten()->count() }}</h4>
                <p class="text-muted mb-0">إجمالي الصلاحيات</p>
              </div>
            </div>
            
            <div class="col-md-4">
              <div class="text-center">
                <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                  <i class="bi bi-collection text-success" style="font-size: 24px;"></i>
                </div>
                <h4 class="mt-2 mb-0 text-success">{{ $permissions->count() }}</h4>
                <p class="text-muted mb-0">عدد المجموعات</p>
              </div>
            </div>
            
            <div class="col-md-4">
              <div class="text-center">
                <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                  <i class="bi bi-person-badge text-info" style="font-size: 24px;"></i>
                </div>
                <h4 class="mt-2 mb-0 text-info">{{ $permissions->flatten()->sum(function($p) { return $p->roles->count(); }) }}</h4>
                <p class="text-muted mb-0">إجمالي الروابط</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endif
  </div>
@endsection

@section('js')
  <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    // SweetAlert for delete confirmation
    document.addEventListener('DOMContentLoaded', function() {
      const deleteButtons = document.querySelectorAll('.delete_confirm');
      
      deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
          e.preventDefault();
          
          Swal.fire({
            title: 'هل أنت متأكد؟',
            text: "لن تتمكن من التراجع عن هذا الإجراء!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'نعم، احذف!',
            cancelButtonText: 'إلغاء'
          }).then((result) => {
            if (result.isConfirmed) {
              this.closest('form').submit();
            }
          });
        });
      });
    });
  </script>
@endsection

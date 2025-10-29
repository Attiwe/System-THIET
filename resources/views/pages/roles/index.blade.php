@extends('layouts.master')
@section('title', 'إدارة الصلاحيات')

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
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">إدارة الصلاحيات</h2>
        <p class="mg-b-0">إدارة أدوار المستخدمين وصلاحياتهم</p>
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
  
  <div class="card card-body">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="text-primary mb-0">🔐 جدول الصلاحيات</h2>
      <div>
        @if(\App\Helpers\PermissionHelper::hasPermission('roles.read'))
          <a href="{{ route('permissions.index') }}" class="btn btn-outline-info me-2">
            <i class="bi bi-shield-check"></i> إدارة الصلاحيات الفرعية
          </a>
        @endif
        @if(\App\Helpers\PermissionHelper::hasPermission('roles.create') || \App\Helpers\PermissionHelper::isSuperAdmin())
          <a href="{{ route('roles.create') }}" class="btn btn-outline-primary">
            <i class="bi bi-plus-circle"></i> إضافة صلاحية جديدة
          </a>
        @endif
      </div>
    </div>

    <div class="table-responsive mt-3">
      <table id="rolesTable" class="table table-hover table-striped align-middle text-center shadow-sm rounded-3 table-bordered" dir="rtl">
        <thead class="text-white bg-primary">
          <tr>
            <th scope="col">#</th>
            <th scope="col" class="text-white" style="font-size: 18px;"><i class="bi bi-person-badge"></i> اسم الصلاحية</th>
            <th scope="col" class="text-white" style="font-size: 18px;"><i class="bi bi-envelope"></i> البريد الإلكتروني</th>
            <th scope="col" class="text-white" style="font-size: 18px;"><i class="bi bi-shield-check"></i> عدد الصلاحيات</th>
            <th scope="col" class="text-white" style="font-size: 18px;"><i class="bi bi-calendar"></i> تاريخ الإنشاء</th>
            <th scope="col" class="text-white" style="font-size: 18px;"><i class="bi bi-gear"></i> العمليات</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($users as $user)
            <tr>
              <td class="fw-bold text-secondary">{{ $loop->iteration }}</td>
              <td class="fw-bold text-dark">
                <i class="bi bi-person-fill text-primary"></i> {{ $user->name }}
                @if($user->email === 'admin@college.edu' || $user->email === 'ebrahim@gmail.com' || $user->is_protected)
                  <span class="badge bg-success ms-2">
                    <i class="bi bi-shield-check"></i> محمي
                  </span>
                @endif
              </td>
              <td class="fw-bold text-dark">{{ $user->email }}</td>
              <td class="fw-bold text-success">
                <span class="badge bg-success">{{ $user->permissions->count() }}</span>
              </td>
              <td class="fw-bold text-secondary">{{ $user->created_at ? $user->created_at->format('d/m/Y') : 'غير محدد' }}</td>
              <td>
                <div class="dropdown">
                  <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton{{ $user->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-gear"></i> خيارات
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $user->id }}">
                    @if(\App\Helpers\PermissionHelper::hasPermission('roles.read'))
                      <li>
                        <a href="{{ route('roles.show', $user->id) }}" class="dropdown-item text-info">
                          <i class="bi bi-eye"></i> عرض التفاصيل
                        </a>
                      </li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('roles.update') && $user->email !== 'admin@college.edu' && $user->email !== 'ebrahim@gmail.com' && !$user->is_protected)
                      <li>
                        <a href="{{ route('roles.edit', $user->id) }}" class="dropdown-item text-primary">
                          <i class="bi bi-pencil"></i> تعديل
                        </a>
                      </li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('roles.delete') && $user->email !== 'admin@college.edu' && $user->email !== 'ebrahim@gmail.com' && !$user->is_protected)
                      <li><hr class="dropdown-divider"></li>
                      <li>
                        <form action="{{ route('roles.destroy', $user->id) }}" method="POST" class="d-inline">
                          @csrf
                          @method('delete')
                          <button type="submit" class="dropdown-item text-danger delete_confirm" onclick="return confirm('هل أنت متأكد من حذف هذا المستخدم؟')">
                            <i class="bi bi-trash"></i> حذف
                          </button>
                        </form>
                      </li>
                    @endif
                    @if($user->email === 'admin@college.edu' || $user->email === 'ebrahim@gmail.com' || $user->is_protected)
                      <li><hr class="dropdown-divider"></li>
                      <li>
                        <span class="dropdown-item text-success">
                          <i class="bi bi-shield-check"></i> مستخدم محمي
                        </span>
                      </li>
                    @endif
                  </ul>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center py-4">
                <div class="text-muted">
                  <i class="bi bi-shield-x" style="font-size: 48px;"></i>
                  <p class="mt-2">لا توجد صلاحيات متاحة</p>
                </div>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection

@section('js')
  <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#rolesTable').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/ar.json"
        }
      });
    });
  </script>
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

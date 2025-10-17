@extends('layouts.master')
@section('title', 'تعديل الصلاحية')

@if(!\App\Helpers\PermissionHelper::hasPermission('roles.update') && !\App\Helpers\PermissionHelper::isSuperAdmin())
  @php
    abort(403, 'ليس لديك صلاحية للوصول لهذه الصفحة');
  @endphp
@endif

@section('css')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endsection

@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div>
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">تعديل الصلاحية</h2>
        <p class="mg-b-0">تعديل بيانات الصلاحية والصلاحيات المرتبطة بها</p>
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
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="text-primary mb-0">✏️ تعديل الصلاحية: {{ $role->role }}</h2>
      <div>
        <a href="{{ route('roles.show', $role->id) }}" class="btn btn-outline-info me-2">
          <i class="bi bi-eye"></i> عرض التفاصيل
        </a>
        <a href="{{ route('roles.index') }}" class="btn btn-outline-secondary">
          <i class="bi bi-arrow-right"></i> العودة للقائمة
        </a>
      </div>
    </div>

    <form action="{{ route('roles.update', $role->id) }}" method="POST" class="needs-validation" novalidate>
      @csrf
      @method('PUT')
      
      <div class="row">
        <!-- معلومات الصلاحية الأساسية -->
        <div class="col-lg-6">
          <div class="card border-0 shadow-sm">
            <div class="card-header bg-primary text-white">
              <h5 class="mb-0"><i class="bi bi-info-circle"></i> المعلومات الأساسية</h5>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <label for="role" class="form-label">اسم المستخدم <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('role') is-invalid @enderror" 
                       id="role" name="role" value="{{ old('role', $user->name) }}" required>
                @error('role')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">البريد الإلكتروني <span class="text-danger">*</span></label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                       id="email" name="email" value="{{ old('email', $user->email) }}" required>
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">كلمة المرور الجديدة</label>
                <div class="input-group">
                  <input type="password" class="form-control @error('password') is-invalid @enderror" 
                         id="password" name="password">
                  <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                    <i class="bi bi-eye"></i>
                  </button>
                </div>
                @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">اتركها فارغة إذا كنت لا تريد تغيير كلمة المرور</div>
              </div>

              <!-- عرض الصلاحيات الحالية -->
              <div class="mb-3">
                <label class="form-label">الصلاحيات الحالية</label>
                <div class="border rounded p-2 bg-light">
                  @if($role->permissions->count() > 0)
                    @foreach($role->permissions as $permission)
                      <span class="badge bg-success me-1 mb-1">{{ $permission->display_name }}</span>
                    @endforeach
                  @else
                    <span class="text-muted">لا توجد صلاحيات محددة</span>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- الصلاحيات المتاحة -->
        <div class="col-lg-6">
          <div class="card border-0 shadow-sm">
            <div class="card-header bg-success text-white">
              <h5 class="mb-0"><i class="bi bi-shield-check"></i> تحديث الصلاحيات</h5>
            </div>
            <div class="card-body" style="max-height: 400px; overflow-y: auto;">
              @forelse ($permissions as $group => $groupPermissions)
                <div class="mb-3">
                  <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="text-primary border-bottom pb-1 mb-0">{{ $group }}</h6>
                    <button type="button" class="btn btn-sm btn-outline-primary" 
                            onclick="toggleGroup('{{ $group }}')">
                      <i class="bi bi-check-all"></i> تحديد الكل
                    </button>
                  </div>
                  @foreach ($groupPermissions as $permission)
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" 
                             name="permissions[]" value="{{ $permission->id }}" 
                             id="permission_{{ $permission->id }}"
                             data-group="{{ $group }}"
                             {{ in_array($permission->id, $selectedPermissions) ? 'checked' : '' }}>
                      <label class="form-check-label" for="permission_{{ $permission->id }}">
                        <strong>{{ $permission->display_name }}</strong>
                        @if($permission->description)
                          <small class="text-muted d-block">{{ $permission->description }}</small>
                        @endif
                      </label>
                    </div>
                  @endforeach
                </div>
              @empty
                <div class="text-center text-muted">
                  <i class="bi bi-shield-x" style="font-size: 48px;"></i>
                  <p>لا توجد صلاحيات متاحة</p>
                </div>
              @endforelse
            </div>
          </div>
        </div>
      </div>

      <!-- أزرار الإجراءات -->
      <div class="row mt-4">
        <div class="col-12">
          <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">
              <i class="bi bi-x-circle"></i> إلغاء
            </a>
            <button type="submit" class="btn btn-primary">
              <i class="bi bi-check-circle"></i> حفظ التغييرات
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection

@section('js')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Toggle password visibility
    document.getElementById('togglePassword').addEventListener('click', function() {
      const passwordField = document.getElementById('password');
      const icon = this.querySelector('i');
      
      if (passwordField.type === 'password') {
        passwordField.type = 'text';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
      } else {
        passwordField.type = 'password';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
      }
    });

    // Toggle all permissions in a group
    function toggleGroup(groupName) {
      const checkboxes = document.querySelectorAll(`input[name="permissions[]"][data-group="${groupName}"]`);
      const allChecked = Array.from(checkboxes).every(cb => cb.checked);
      
      checkboxes.forEach(cb => {
        cb.checked = !allChecked;
      });
      
      // Update button text
      const button = event.target;
      if (allChecked) {
        button.innerHTML = '<i class="bi bi-check-all"></i> تحديد الكل';
      } else {
        button.innerHTML = '<i class="bi bi-x-square"></i> إلغاء الكل';
      }
    }

    // Form validation
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>
@endsection

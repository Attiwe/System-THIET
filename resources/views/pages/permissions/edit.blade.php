@extends('layouts.master')
@section('title', 'تعديل الصلاحية')

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
        <p class="mg-b-0">تعديل بيانات الصلاحية الفرعية</p>
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
      <h2 class="text-primary mb-0">✏️ تعديل الصلاحية: {{ $permission->display_name }}</h2>
      <div>
        <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-outline-info me-2">
          <i class="bi bi-eye"></i> عرض التفاصيل
        </a>
        <a href="{{ route('permissions.index') }}" class="btn btn-outline-secondary">
          <i class="bi bi-arrow-right"></i> العودة للقائمة
        </a>
      </div>
    </div>

    <form action="{{ route('permissions.update', $permission->id) }}" method="POST" class="needs-validation" novalidate>
      @csrf
      @method('PUT')
      
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="card border-0 shadow-sm">
            <div class="card-header bg-primary text-white">
              <h5 class="mb-0"><i class="bi bi-info-circle"></i> تفاصيل الصلاحية</h5>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <label for="name" class="form-label">اسم الصلاحية (Name) <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                       id="name" name="name" value="{{ old('name', $permission->name) }}" 
                       placeholder="مثال: users.create" required>
                <div class="form-text">يجب أن يكون فريداً، مثال: users.create, roles.read</div>
                @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="display_name" class="form-label">اسم العرض <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('display_name') is-invalid @enderror" 
                       id="display_name" name="display_name" value="{{ old('display_name', $permission->display_name) }}" 
                       placeholder="مثال: إنشاء المستخدمين" required>
                <div class="form-text">الاسم الذي سيظهر في واجهة المستخدم</div>
                @error('display_name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="description" class="form-label">الوصف</label>
                <textarea class="form-control @error('description') is-invalid @enderror" 
                          id="description" name="description" rows="3" 
                          placeholder="وصف مختصر للصلاحية">{{ old('description', $permission->description) }}</textarea>
                <div class="form-text">وصف اختياري للصلاحية</div>
                @error('description')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="group" class="form-label">المجموعة</label>
                <select class="form-select @error('group') is-invalid @enderror" 
                        id="group" name="group">
                  <option value="">اختر مجموعة أو أدخل مجموعة جديدة</option>
                  @foreach($groups as $group)
                    <option value="{{ $group }}" {{ old('group', $permission->group) == $group ? 'selected' : '' }}>
                      {{ $group }}
                    </option>
                  @endforeach
                </select>
                <div class="form-text">يمكنك اختيار مجموعة موجودة أو إدخال مجموعة جديدة</div>
                @error('group')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="new_group" class="form-label">أو أدخل مجموعة جديدة</label>
                <input type="text" class="form-control" 
                       id="new_group" placeholder="مثال: إدارة المستخدمين">
                <div class="form-text">إذا كنت تريد إنشاء مجموعة جديدة، أدخل اسمها هنا</div>
              </div>
            </div>
          </div>

          <!-- معلومات إضافية -->
          <div class="card border-0 shadow-sm mt-4">
            <div class="card-header bg-info text-white">
              <h5 class="mb-0"><i class="bi bi-info-square"></i> معلومات إضافية</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label text-muted">تاريخ الإنشاء</label>
                    <div class="form-control-plaintext fw-bold">
                      <i class="bi bi-calendar"></i> {{ $permission->created_at->format('d/m/Y H:i') }}
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label text-muted">آخر تحديث</label>
                    <div class="form-control-plaintext fw-bold">
                      <i class="bi bi-clock"></i> {{ $permission->updated_at->format('d/m/Y H:i') }}
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="mb-3">
                <label class="form-label text-muted">عدد الأدوار المرتبطة</label>
                <div class="form-control-plaintext fw-bold">
                  <span class="badge bg-success">{{ $permission->roles->count() }}</span>
                  @if($permission->roles->count() > 0)
                    <small class="text-muted">أدوار مرتبطة بهذه الصلاحية</small>
                  @else
                    <small class="text-muted">لا توجد أدوار مرتبطة</small>
                  @endif
                </div>
              </div>
            </div>
          </div>

          <!-- أزرار الإجراءات -->
          <div class="d-flex justify-content-end gap-2 mt-4">
            <a href="{{ route('permissions.index') }}" class="btn btn-secondary">
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
    // Handle new group input
    document.getElementById('new_group').addEventListener('input', function() {
      const groupSelect = document.getElementById('group');
      const newGroupValue = this.value;
      
      if (newGroupValue) {
        groupSelect.value = '';
      }
    });

    // Handle group select change
    document.getElementById('group').addEventListener('change', function() {
      const newGroupInput = document.getElementById('new_group');
      
      if (this.value) {
        newGroupInput.value = '';
      }
    });

    // Form validation
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            // Handle group selection
            const groupSelect = document.getElementById('group');
            const newGroupInput = document.getElementById('new_group');
            
            if (!groupSelect.value && newGroupInput.value) {
              groupSelect.value = newGroupInput.value;
            }
            
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

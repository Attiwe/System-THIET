@extends('layouts.master')
@section('title', 'تسجيل دخول الصلاحيات')

@section('css')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <style>
    .login-container {
      min-height: 100vh;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    .login-card {
      backdrop-filter: blur(10px);
      background: rgba(255, 255, 255, 0.95);
      border-radius: 20px;
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
      border: 1px solid rgba(255, 255, 255, 0.18);
    }
  </style>
@endsection

@section('content')
<div class="login-container d-flex align-items-center justify-content-center">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="login-card p-4">
          <div class="text-center mb-4">
            <div class="mb-3">
              <i class="bi bi-shield-lock text-primary" style="font-size: 48px;"></i>
            </div>
            <h2 class="text-primary fw-bold">تسجيل دخول الصلاحيات</h2>
            <p class="text-muted">تسجيل الدخول كصلاحية محددة</p>
          </div>

          @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <i class="bi bi-check-circle"></i> {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
          @endif

          @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <i class="bi bi-exclamation-triangle"></i> {{ session('error') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
          @endif

          <form action="{{ route('role.login') }}" method="POST" class="needs-validation" novalidate>
            @csrf
            
            <div class="mb-3">
              <label for="email" class="form-label">
                <i class="bi bi-envelope"></i> البريد الإلكتروني
              </label>
              <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" 
                     id="email" name="email" value="{{ old('email') }}" 
                     placeholder="admin@college.edu" required>
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">
                <i class="bi bi-lock"></i> كلمة المرور
              </label>
              <div class="input-group">
                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" 
                       id="password" name="password" placeholder="كلمة المرور" required>
                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                  <i class="bi bi-eye"></i>
                </button>
              </div>
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-primary btn-lg">
                <i class="bi bi-box-arrow-in-right"></i> تسجيل الدخول
              </button>
            </div>
          </form>

          <div class="text-center mt-4">
            <div class="border-top pt-3">
              <p class="text-muted mb-2">المستخدم الحالي:</p>
              <div class="bg-light p-2 rounded">
                <strong>{{ Auth::user()->name ?? 'غير محدد' }}</strong><br>
                <small class="text-muted">{{ Auth::user()->email ?? 'غير محدد' }}</small>
              </div>
            </div>
            
            <div class="mt-3">
              <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-right"></i> العودة للرئيسية
              </a>
            </div>
          </div>

          <!-- معلومات المساعدة -->
          <div class="mt-4 p-3 bg-info bg-opacity-10 rounded">
            <h6 class="text-info mb-2"><i class="bi bi-info-circle"></i> معلومات المساعدة:</h6>
            <ul class="list-unstyled mb-0 small text-muted">
              <li>• استخدم بيانات الصلاحية للوصول لصلاحيات محددة</li>
              <li>• البريد الافتراضي: admin@college.edu</li>
              <li>• كلمة المرور الافتراضية: admin123456</li>
              <li>• يمكنك تسجيل الدخول كصلاحية مختلفة أثناء بقائك مسجل كـ user عادي</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
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

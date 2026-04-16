@extends('layouts.master2')
@section('title', 'تسجيل دخول')

@section('css')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap');

    * { box-sizing: border-box; margin: 0; padding: 0; }

    html, body, body.main-body, body.main-body.bg-primary-transparent {
        background: #135cb6 !important;
        background-color: #135cb6 !important;
        font-family: 'Cairo', sans-serif;
        min-height: 100vh;
        margin: 0 !important;
        padding: 0 !important;
    }

    body.main-body > *:not(#global-loader):not(script) {
        background: transparent !important;
        padding: 0 !important;
        border: none !important;
        box-shadow: none !important;
    }

    /* ---- Card Wrapper ---- */
    .login-card {
        display: flex;
        width: 100%;
        max-width: 860px;
        min-height: 500px;
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 25px 60px rgba(0,0,0,0.3);
        position: relative;
    }

    /* ============================
       LEFT PANEL — Blue / Welcome
       ============================ */
    .left-panel {
        flex: 0 0 42%;
        background: linear-gradient(160deg, #135cb6 0%, #0d47a1 50%, #0a3a8a 100%);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 40px 30px;
        position: relative;
        overflow: hidden;
        color: #fff;
        text-align: center;
    }

    /* Decorative blobs */
    .left-panel::before {
        content: '';
        position: absolute;
        width: 280px;
        height: 280px;
        background: rgba(255,255,255,0.07);
        border-radius: 50%;
        bottom: -80px;
        left: -80px;
    }

    .left-panel::after {
        content: '';
        position: absolute;
        width: 180px;
        height: 180px;
        background: rgba(255,255,255,0.05);
        border-radius: 50%;
        top: -50px;
        right: -50px;
    }

    /* Small floating circles */
    .blob {
        position: absolute;
        border-radius: 50%;
        background: rgba(255,255,255,0.08);
    }
    .blob-1 { width: 120px; height: 120px; top: 60px; left: -30px; }
    .blob-2 { width: 90px;  height: 90px;  bottom: 100px; right: -20px; }
    .blob-3 { width: 55px;  height: 55px;  top: 190px; right: 30px; background: rgba(255,255,255,0.12); }

    /* Logo */
    .left-panel .logo-box {
        position: relative;
        z-index: 2;
        margin-bottom: 22px;
    }

    .left-panel .logo-box img {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        border: 3px solid rgba(255,255,255,0.35);
        box-shadow: 0 0 0 8px rgba(255,255,255,0.08), 0 8px 25px rgba(0,0,0,0.3);
        object-fit: cover;
    }

    /* Pulse ring */
    .pulse-ring {
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%, -50%);
        width: 108px; height: 108px;
        border-radius: 50%;
        border: 2px solid rgba(255,255,255,0.25);
        animation: pulse 2.5s ease-in-out infinite;
    }
    .pulse-ring-2 {
        width: 130px; height: 130px;
        animation-delay: 1.2s;
    }

    @keyframes pulse {
        0%   { transform: translate(-50%,-50%) scale(0.92); opacity: 0.7; }
        50%  { transform: translate(-50%,-50%) scale(1.06); opacity: 1; }
        100% { transform: translate(-50%,-50%) scale(0.92); opacity: 0.7; }
    }

    .left-panel h2 {
        font-size: 1.7rem;
        font-weight: 800;
        letter-spacing: 2px;
        text-transform: uppercase;
        position: relative;
        z-index: 2;
        margin-bottom: 6px;
        text-shadow: 0 2px 8px rgba(0,0,0,0.2);
    }

    .left-panel p {
        font-size: 0.85rem;
        color: rgba(255,255,255,0.7);
        line-height: 1.6;
        position: relative;
        z-index: 2;
        max-width: 200px;
    }

    /* ============================
       RIGHT PANEL — White / Form
       ============================ */
    .right-panel {
        flex: 1;
        background: #fff;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 48px 44px;
    }

    .right-panel h3 {
        font-size: 1.6rem;
        font-weight: 800;
        color: #1a1a2e;
        margin-bottom: 4px;
    }

    .right-panel .sub {
        font-size: 0.82rem;
        color: #9aa0b8;
        margin-bottom: 28px;
    }

    /* Inputs */
    .field-group {
        margin-bottom: 16px;
    }

    .field-group label {
        display: block;
        font-size: 12px;
        font-weight: 700;
        color: #6b7280;
        margin-bottom: 6px;
        letter-spacing: 0.4px;
    }

    .input-wrap {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-wrap i {
        position: absolute;
        right: 14px;
        color: #b0b8d8;
        font-size: 15px;
        pointer-events: none;
    }

    .input-wrap input {
        width: 100%;
        padding: 11px 40px 11px 14px;
        border: 1.5px solid #e0e4f0;
        border-radius: 10px;
        font-size: 13px;
        font-family: 'Cairo', sans-serif;
        color: #2d3555;
        background: #f8f9ff;
        transition: all 0.25s;
        outline: none;
        direction: rtl;
    }

    .input-wrap input:focus {
        border-color: #1565c0;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(21,101,192,0.1);
    }

    .input-wrap input.is-invalid {
        border-color: #e53e3e;
    }

    .invalid-feedback {
        font-size: 11px;
        color: #e53e3e;
        margin-top: 4px;
        display: block;
    }

    /* Toggle password btn */
    .toggle-pass {
        position: absolute;
        left: 12px;
        background: none;
        border: none;
        color: #9aa0b8;
        cursor: pointer;
        font-size: 13px;
        padding: 2px 4px;
        font-weight: 700;
        letter-spacing: 0.5px;
        transition: color 0.2s;
    }

    .toggle-pass:hover { color: #1565c0; }

    /* Remember + Forgot */
    .meta-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
        font-size: 12px;
    }

    .meta-row label {
        display: flex;
        align-items: center;
        gap: 6px;
        color: #6b7280;
        cursor: pointer;
        font-weight: 600;
    }

    .meta-row a {
        color: #1565c0;
        text-decoration: none;
        font-weight: 700;
    }

    .meta-row a:hover { text-decoration: underline; }

    /* Buttons */
    .btn-signin {
        width: 100%;
        padding: 12px;
        background: linear-gradient(135deg, #1565c0, #0d47a1);
        color: #fff;
        border: none;
        border-radius: 10px;
        font-size: 15px;
        font-weight: 700;
        font-family: 'Cairo', sans-serif;
        cursor: pointer;
        transition: all 0.3s;
        box-shadow: 0 4px 15px rgba(21,101,192,0.35);
    }

    .btn-signin:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(21,101,192,0.4);
    }

    .divider {
        text-align: center;
        color: #c5cce8;
        font-size: 12px;
        margin: 14px 0;
        position: relative;
    }

    .divider::before, .divider::after {
        content: '';
        position: absolute;
        top: 50%;
        width: 42%;
        height: 1px;
        background: #e8eaf0;
    }
    .divider::before { right: 0; }
    .divider::after  { left: 0; }

    /* Alerts */
    .alert-box {
        padding: 10px 14px;
        border-radius: 10px;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .alert-success { background: #f0fff4; color: #276749; border: 1px solid #9ae6b4; }
    .alert-error   { background: #fff5f5; color: #c53030; border: 1px solid #feb2b2; }

    /* ---- Responsive ---- */
    @media (max-width: 700px) {
        .login-card { flex-direction: column; max-width: 420px; }
        .left-panel { flex: none; padding: 32px 24px; }
        .left-panel h2 { font-size: 1.3rem; }
        .right-panel { padding: 32px 24px; }
    }
</style>
@endsection

@section('content')
<div style="min-height:100vh; display:flex; align-items:center; justify-content:center; padding:20px; background:#135cb6;">

    <div class="login-card">

        {{-- ===== LEFT — Blue Panel ===== --}}
        <div class="left-panel">
            {{-- Blobs --}}
            <div class="blob blob-1"></div>
            <div class="blob blob-2"></div>
            <div class="blob blob-3"></div>

            {{-- Logo with pulse --}}
            <div class="logo-box">
                <div class="pulse-ring"></div>
                <div class="pulse-ring pulse-ring-2"></div>
                <img src="{{ URL::asset('include/logo/logo.webp') }}" alt="Logo">
            </div>

            <h2>WELCOME</h2>
            <p>المعهد العالى للهندسة والتكنولوجيا بطنطا</p>
        </div>

        {{-- ===== RIGHT — Form Panel ===== --}}
        <div class="right-panel" dir="rtl">
            <h3>تسجيل الدخول</h3>
            <p class="sub">أدخل بياناتك للوصول إلى لوحة التحكم</p>

            {{-- Alerts --}}
            @if(session('success'))
                <div class="alert-box alert-success">
                    <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert-box alert-error">
                    <i class="bi bi-exclamation-triangle-fill"></i> {{ session('error') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert-box alert-error">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.attempt') }}">
                @csrf

                {{-- Email --}}
                <div class="field-group">
                    <label for="email">البريد الإلكتروني</label>
                    <div class="input-wrap">
                        <i class="bi bi-envelope"></i>
                        <input type="email" id="email" name="email"
                               value="{{ old('email') }}"
                               placeholder="example@college.edu"
                               class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                               required autofocus>
                    </div>
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="field-group">
                    <label for="password">كلمة المرور</label>
                    <div class="input-wrap">
                        <i class="bi bi-lock"></i>
                        <input type="password" id="password" name="password"
                               placeholder="••••••••"
                               class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                               required>
                        <button type="button" class="toggle-pass" id="togglePass">إظهار</button>
                    </div>
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Remember + Forgot --}}
                <div class="meta-row">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        تذكرني
                    </label>
                </div>

                {{-- Submit --}}
                <button type="submit" class="btn-signin">تسجيل الدخول</button>
            </form>
        </div>

    </div>
</div>
@endsection

@section('js')
<script>
    const toggleBtn = document.getElementById('togglePass');
    const passInput = document.getElementById('password');
    if (toggleBtn) {
        toggleBtn.addEventListener('click', function () {
            if (passInput.type === 'password') {
                passInput.type = 'text';
                this.textContent = 'إخفاء';
            } else {
                passInput.type = 'password';
                this.textContent = 'إظهار';
            }
        });
    }
</script>
@endsection
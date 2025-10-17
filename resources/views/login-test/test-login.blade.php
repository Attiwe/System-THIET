@extends('layouts.master2')
@section('title', 'تسجيل دخول')

@section('css')
    <style>
        body {
            background: linear-gradient(135deg, #00BFFF 40%, #005f99 100%);
            font-family: "Cairo", sans-serif;
        }

        .login-card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            background: #fff;
            transition: all 0.3s ease-in-out;
        }

        /* 🔥 Hover effect */
        .login-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.25);
        }

        .login-header {
            text-align: center;
            padding: 2rem 1rem 1rem;
            background: #f8f9fa;
        }

        .login-header img {
            width: 60px;
            height: 60px;
        }

        .login-header h3 {
            margin-top: 0.5rem;
            color: #00BFFF;
            font-weight: bold;
        }

        .form-control:focus {
            border-color: #00BFFF;
            box-shadow: 0 0 6px rgba(0, 191, 255, 0.3);
        }

        .btn-login {
            background: #00BFFF;
            border: none;
            font-weight: 600;
            padding: 0.6rem;
            transition: all 0.3s ease-in-out;
        }

        .btn-login:hover {
            background: #0099cc;
            transform: translateY(-2px);
        }

        .right-section {
            background: linear-gradient(135deg, #005f99 30%, #00BFFF 100%);
            color: #fff;
            padding: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
        }

        .right-section h1 {
            font-size: 1.8rem;
            font-weight: bold;
            margin-top: 1rem;
        }

        /* 🔥 Logo inside circular animation */
        .logo-wrapper {
            position: relative;
            width: 220px;
            height: 220px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-wrapper img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            z-index: 2;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.6);
        }

        .logo-circle {
            position: absolute;
            border-radius: 50%;
            border: 2px solid rgba(255, 255, 255, 0.5);
            animation: pulse 3s infinite ease-in-out;
        }

        .circle-1 {
            width: 150px;
            height: 150px;
        }

        .circle-2 {
            width: 190px;
            height: 190px;
            animation-delay: 1s;
        }

        @keyframes pulse {
            0% {
                transform: scale(0.95);
                opacity: 0.6;
            }

            50% {
                transform: scale(1.05);
                opacity: 1;
            }

            100% {
                transform: scale(0.95);
                opacity: 0.6;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="row w-100 shadow-lg login-card">

            <!-- Left Side -->
            <div class="col-md-6 p-4">
                <div class="login-header">
                    <img src="{{ URL::asset('include/logo/logo.webp') }}" alt="Logo">
                    <h3>المعهد العالى للهندسة والتكنولوجيا بطنطا</h3>
                </div>

                <div class="p-4">
                    <h4 class="text-center mb-3">مرحبا بك</h4>
                    <p class="text-center text-muted">يرجى تسجيل الدخول للمتابعة</p>

                    <form method="POST" action="{{ route('login.attempt') }}">
                        @csrf
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">البريد الإلكتروني</label>
                            <input type="email" id="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                required autofocus placeholder="ادخل البريد الإلكتروني">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">كلمة المرور</label>
                            <input type="password" id="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" required
                                placeholder="ادخل كلمة المرور">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="form-check mb-3 custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="remember">تذكرني</label>
                        </div>

                        <!-- Button -->
                        <button type="submit" class="btn btn-primary btn-block mt-4">تسجيل الدخول</button>
                    </form>
                </div>
            </div>

            <!-- Right Side -->
            <div class="col-md-6 right-section">
                <div class="logo-wrapper">
                    <!-- 🔥 Logo in the middle -->
                    <img src="{{ URL::asset('include/logo/logo.webp') }}" alt="Logo">

                    <!-- Circles animation -->
                    <div class="logo-circle circle-1"></div>
                    <div class="logo-circle circle-2"></div>
                </div>
                <h1>بوابة تسجيل الدخول</h1>
                <p class="text-light">المعهد العالى للهندسة والتكنولوجيا بطنطا</p>
            </div>
        </div>
    </div>
@endsection
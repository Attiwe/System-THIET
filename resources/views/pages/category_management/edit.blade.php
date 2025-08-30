@extends('layouts.master')

@section('title', 'تعديل بيانات الإدارة')

@section('css')
  <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
  <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
  <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('vendor/file-input/css/fileinput.min.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css"
    crossorigin="anonymous">
@endsection


@section('page-header')

  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div>
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Hi, welcome back!</h2>
        <p class="mg-b-0">Sales monitoring dashboard template.</p>
      </div>
    </div>
    <div class="main-dashboard-header-right">
      <div>
        <label class="tx-13">Customer Ratings</label>
        <div class="main-star">
          <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i
            class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star"></i>
          <span>(14,873)</span>
        </div>
      </div>
      <div>
        <label class="tx-13">Online Sales</label>
        <h5>563,275</h5>
      </div>
      <div>
        <label class="tx-13">Offline Sales</label>
        <h5>783,675</h5>
      </div>
    </div>
  </div>


  @include('include.error')
  @include('include.validation')

  <div class="row">
    <div class="col-xl-12">

      <div class="card shadow-sm">
        <div class="card-header d-flex  justify-content-between align-items-center ">
          <h2 class="main-content-title tx-24 font-weight-bold text-dark  "> 📰 تعديل بيانات الإدارة </h2>
          <a href="{{ route('category_management.index') }}" class="btn btn-primary">
            <i class="bi bi-arrow-left"></i> رجوع
          </a>
        </div>
        <div class="card-body bg-white">
            <form action="{{ route('category_management.update', $categoryManagement->id) }}" method="POST" >
              @csrf
              @method('PUT')
              <div class="groud row">
                <div class="form-group col-md-4">
                  <label for="dean" class="font-weight-bold lead text-primary">
                    <i class="bi bi-mortarboard-fill"></i> عميد المعهد
                  </label>
                  <input type="text" class="form-control" id="dean" name="dean" value="{{ $categoryManagement->dean }}"
                    placeholder="أدخل اسم عميد المعهد">
                </div>

                <div class="form-group col-md-4">
                  <label for="vice_dean_students" class="font-weight-bold lead text-primary">
                    <i class="bi bi-person-badge-fill"></i> وكيل المعهد لشئون الطلاب
                  </label>
                  <input type="text" class="form-control" id="vice_dean_students" name="vice_dean_students"
                    value="{{ $categoryManagement->vice_dean_students }}" placeholder="أدخل اسم وكيل المعهد لشئون الطلاب">
                </div>

                <div class="form-group col-md-4">
                  <label for="secretary" class="font-weight-bold lead text-primary">
                    <i class="bi bi-person-lines-fill"></i> أمين المعهد
                  </label>
                  <input type="text" class="form-control" id="secretary" name="secretary" value= "{{ $categoryManagement->secretary }}"
                    placeholder="أدخل اسم أمين المعهد">
                </div>
              </div>

              <div class="groud row">
                <div class="form-group col-md-4">
                  <label for="account_manager" class="font-weight-bold lead text-primary">
                    <i class="bi bi-cash-coin"></i> مدير الحسابات
                  </label>
                  <input type="text" class="form-control" id="account_manager" name="account_manager"
                    value="{{ $categoryManagement->account_manager }}" placeholder="أدخل اسم مدير الحسابات">
                </div>

                <div class="form-group col-md-4">
                  <label for="student_affairs_manager" class="font-weight-bold lead text-primary">
                    <i class="bi bi-journal-check"></i> مدير شؤون الطلاب
                  </label>
                  <input type="text" class="form-control" id="student_affairs_manager" name="student_affairs_manager"
                    value="{{ $categoryManagement->student_affairs_manager }}" placeholder="أدخل اسم مدير شؤون الطلاب">
                </div>

                <div class="form-group col-md-4">
                  <label for="hr_manager" class="font-weight-bold lead text-primary">
                    <i class="bi bi-people-fill"></i> مدير الموارد البشرية
                  </label>
                  <input type="text" class="form-control" id="hr_manager" name="hr_manager" value="{{ $categoryManagement->hr_manager }}"
                    placeholder="أدخل اسم مدير الموارد البشرية">
                </div>
              </div>

              <div class="groud row">
                <div class="form-group col-md-4">
                  <label for="it_manager" class="font-weight-bold lead text-primary">
                    <i class="bi bi-pc-display"></i> مدير نظام التكنولوجيا
                  </label>
                  <input type="text" class="form-control" id="it_manager" name="it_manager" value="{{ $categoryManagement->it_manager }}"
                    placeholder="أدخل اسم مدير تكنولوجيا المعلومات">
                </div>

                <div class="form-group col-md-4">
                  <label for="civil_head" class="font-weight-bold lead text-primary">
                    <i class="bi bi-building"></i> رئيس قسم الهندسة المدنية
                  </label>  
                  <input type="text" class="form-control" id="civil_head" name="civil_head" value="{{ $categoryManagement->civil_head }}"
                    placeholder="أدخل اسم رئيس قسم الهندسة المدنية">
                </div>
              </div>

              <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-outline-primary lead font-weight-bold ">
                  <i class="bi bi-check-circle"></i> ✔ اضافة بيانات الإدارة
                </button>
                <button type="reset" class="mr-3 btn btn-outline-danger lead font-weight-bold">
                  <i class="bi bi-x-circle"></i> ❌ إلغاء البيانات
                </button>
              </div>

            </form>
        </div>
      </div>
    </div>
  </div>
@endsection

 
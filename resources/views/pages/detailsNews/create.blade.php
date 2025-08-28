@extends('layouts.master')
@section('title')
  اضافة اخبار جديد
@endsection
@section('css')
  <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
  <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
  <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
  <!-- file input -->
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
        <label class="tx-13 font-weight-bold">Customer Ratings</label>
        <div class="main-star">
          <i class="typcn typcn-star active"></i>
          <i class="typcn typcn-star active"></i>
          <i class="typcn typcn-star active"></i>
          <i class="typcn typcn-star active"></i>
          <i class="typcn typcn-star"></i>
          <span>(14,873)</span>
        </div>
      </div>
      <div>
        <label class="tx-13 font-weight-bold">Online Sales</label>
        <h5>563,275</h5>
      </div>
      <div>
        <label class="tx-13 font-weight-bold">Offline Sales</label>
        <h5>783,675</h5>
      </div>
    </div>
  </div>

  <!-- content -->
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow-sm">
        <div class="card-body">
          <div class="main-content-label mb-3 font-weight-bold h3">📰 اضافة اخبار </div>
          <br>
          @include('include.validation')
          <form action="{{ route('detailsNews.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <label for="title" class="font-weight-bold lead "> عنوان الخبر </label>
              <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"
                placeholder="أدخل عنوان الخبر">
            </div>

            <div class="form-group">
              <label for="image_new1" class="font-weight-bold lead"> الصورة </label>
              <input type="file" class="form-control-file" id="image_new1" name="image" value="{{ old('image') }}"
                accept="image/*">
            </div>

            <div class="form-group">
              <label for="description" class="font-weight-bold lead">الوصف</label>
              <textarea class="form-control" id="description" name="description" rows="4"
                value="{{ old('description')  }}" placeholder=" أدخل وصف  الخبر ان امكن"></textarea>
            </div>
            <div class="d-flex justify-content-center mt-3">
              <button type="submit" class="btn btn-primary mb-3 lead">✔ نشر الخبر</button>
              <br>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
  <!--Internal Datatable js -->
  <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
  <!-- file input -->
  <script src="{{ asset('vendor/file-input/js/fileinput.min.js') }}"></script>

  <!-- file input -->
  <script>
    $("#image_new1").fileinput();
  </script>

@endsection
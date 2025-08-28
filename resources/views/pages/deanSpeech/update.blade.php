@extends('layouts.master')

@section('title')
  تعديل خبر
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

    
    <div class="breadcrumb-header justify-content-between">
      <div class="left-content">
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">📰 تعديل خبر</h2>
      </div>
    </div>

    @include('include.error')

    <div class="row">
      <div class="col-xl-12">
        <div class="card shadow-sm">
          <div class="card-body">

            @include('include.validation')

            <form action="{{ route('dean_speech.update', $news->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <input type="hidden" name="id" value="{{ $news->id }}">

              <div class="row">
                <div class="form-group col-md-6">
                  <label for="title" class="font-weight-bold lead "> الوظيفه </label>
                  <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}"
                    placeholder="أدخل الاسم الوظيفه  ">
                </div>

                <div class="form-group col-md-6">
                  <label for="management_id" class="font-weight-bold lead "> المدير </label>
                  <select name="management_id" class="form-control ">
                    <option value="">اختر المدير</option>
                    @foreach($mangment as $manager)
                      <option value="{{ $manager->id }}" {{ $manager->id == $news->management_id ? 'selected' : '' }}>
                        {{ $manager->position }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-primary mb-3 lead">✔ تعديل الخبر</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('js')
  <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>

  <!-- file input -->
  <script src="{{ asset('vendor/file-input/js/fileinput.min.js') }}"></script>
  <script src="{{ asset('vendor/file-input/themes/fa/theme.min.js') }}"></script>

  <script>
    // صورة العميد
    $("#image_new1").fileinput({
      theme: "fa",
      showUpload: false,
      showRemove: true,
      initialPreview: [
        @if($news->image)
          "{{ asset('image/news/' . $news->image) }}"
        @endif
        ],
      initialPreviewAsData: true,
      initialPreviewFileType: 'image',
      overwriteInitial: true,
    });

   
  </script>
@endsection
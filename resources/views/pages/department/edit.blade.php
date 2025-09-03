@extends('layouts.master')

@section('title', 'تعديل القسم')
@section('css')
  <link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
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
          <h2 class="main-content-title tx-24 font-weight-bold text-dark  "> 📰 تعديل القسم</h2>
          <a href="{{ route('departments.index') }}" class="btn btn-primary">
            <i class="bi bi-arrow-left"></i> رجوع
          </a>
        </div>

        <div class="card-body bg-white">
          <form action="{{ route('departments.update', $department->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $department->id }}">
            <div class="row">
              <div class="form-group col-md-6">
                <label for="name" class="font-weight-bold text-primary">
                  <i class="bi bi-person-fill"></i> اسم البرنامج التعليمي
                </label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $department->name }}"
                  placeholder="أدخل اسم البرنامج">
              </div>
              <div class="form-group col-md-6">
                <label for="is_active" class="font-weight-bold text-primary">
                  <i class="bi bi-barcode"></i> الحالة
                </label>
                <select name="is_active" id="is_active" class="form-control">
                  <option value="" selected>اختر الحالة</option>
                  <option value="1" {{ $department->is_active == 1 ? 'selected' : '' }}>مفعل</option>
                  <option value="0" {{ $department->is_active == 0 ? 'selected' : '' }}>غير مفعل</option>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-12">
                <label for="description" class="font-weight-bold text-primary">
                  <i class="bi bi-person-fill"></i> وصف البرنامج التعليمي
                </label>
                <input type="text" class="form-control" id="description" name="description"
                  value="{{ $department->description }}" placeholder="أدخل وصف البرنامج">
              </div>
            </div>

            <div class="form-group">
              <label for="depart_vision" class="font-weight-bold text-primary">
                <i class="bi bi-person-bounding-box"></i> رؤية البرنامج
              </label>
              <textarea class="form-control" id="depart_vision" name="depart_vision" rows="3"
                placeholder="أدخل رؤية البرنامج">{{ $department->depart_vision }}</textarea>
            </div>

            <div class="form-group">
              <label for="depart_massage" class="font-weight-bold text-primary">
                <i class="bi bi-person-bounding-box"></i> رسالة البرنامج
              </label>
              <textarea class="form-control" id="depart_massage" name="depart_massage" rows="3"
                placeholder="أدخل رسالة البرنامج">{{ $department->depart_massage }}</textarea>
            </div>
            <br>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="requerd_file" class="font-weight-bold text-primary">
                  <i class="bi bi-file-earmark-text-fill"></i> إضافة ملف البرنامج التعليمي
                </label>
                <input type="file" class="form-control-file" id="requerd_file" name="requerd_file"
                  accept="application/pdf">
                <input type="hidden" name="old_requerd_file" value="{{ $department->requerd_file }}">
                @if($department->requerd_file)
                  <a href="{{ asset('image/department-file/' . $department->requerd_file) }}" target="_blank"
                    class="btn btn-outline-danger btn-sm">
                    <i class="bi bi-file-earmark-pdf-fill"></i> عرض ملف البرنامج
                  </a>
                @else
                  <span class="text-muted"><i class="bi bi-file-earmark-x"></i> لا يوجد ملف</span>
                @endif
              </div>

              <div class="form-group col-md-6">
                <label for="dapart_image" class="font-weight-bold text-primary">
                  <i class="bi bi-file-earmark-text-fill"></i> إضافة صورة البرنامج
                </label>
                <input type="file" class="form-control-file" id="dapart_image" name="dapart_image" accept="image/*">
              </div>
            </div>
            <div class="d-flex justify-content-center mt-3">
              <button type="submit" class="btn btn-outline-primary font-weight-bold">✔ تحديث</button>
              <button type="reset" class="mr-3 btn btn-outline-danger font-weight-bold ml-3">❌ إلغاء</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script src="{{ asset('vendor/file-input/js/fileinput.min.js') }}"></script>
  <script src="{{ asset('vendor/file-input/themes/fa/theme.min.js') }}"></script>

  <script>
    $("#dapart_image").fileinput({
      theme: "fa",
      showUpload: false,
      showRemove: true,
      initialPreview: [
        @if($department->dapart_image)
          "{{ asset('image/department-image/' . $department->dapart_image) }}"
        @endif
            ],
      initialPreviewAsData: true,
      initialPreviewFileType: 'image',
      overwriteInitial: true,
    });
  </script>
@endsection
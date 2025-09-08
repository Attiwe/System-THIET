@extends('layouts.master')

@section('title')
  تعديل خبر
@endsection

@section('css')
  <link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />

  <!-- file input -->
  <link rel="stylesheet" href="{{ asset('vendor/file-input/css/fileinput.min.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css"
    crossorigin="anonymous">
@endsection

@section('page-header')
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

          <form action="{{ route('detailsNews.update', $detailsNews->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="row">
            <div class="form-group col-md-6 mb-3">
              <label for="title" class="font-weight-bold lead mb-0"> اسم الخبر </label>
              <input type="text" class="form-control" id="title" name="title" value="{{ $detailsNews->title }}" required
                placeholder="أدخل اسم الخبر">
            </div>

            <div class="form-group col-md-6 mb-3">
              <label for="publisher" class="font-weight-bold lead mb-0">الناشر</label>
              <input type="text" class="form-control" id="publisher" name="publisher" value="{{ $detailsNews->publisher }}"
                required placeholder="أدخل اسم الناشر">
            </div>

          </div>

          <div class="form-group  ">
            <label for="new_element_id" class="font-weight-bold lead"> اسم العنصر </label>
            <select name="new_element_id" id="new_element_id" class="form-control" required>
              <option value="" selected>اختر العنصر</option>
              @foreach ($newElements as $newElement)
                <option value="{{ $newElement->id }}" @if($newElement->id == $detailsNews->new_element_id) selected @endif>{{ $newElement->name }}</option>
              @endforeach
            </select>
          </div>


          <div class="form-group">
            <label for="description" class="font-weight-bold lead">الوصف</label>
            <textarea class="form-control" id="description" name="description" rows="4" required
              placeholder="أدخل وصف الخبر ان امكن">{{ $detailsNews->description }}</textarea>
          </div>

          <div class="form-group">
            <label for="image" class="font-weight-bold lead"> الصورة </label>
            <input type="file" class="form-control-file" id="image_new1" name="image" value="{{ old('image') }}"
              accept="image/*">
          </div>
          <br>
          <div class="d-flex justify-content-center mt-3">
            <button type="submit" class="btn btn-success mb-3 lead">✔ تعديل الخبر</button>
            <br>
            <button type="reset" class="btn btn-outline-danger mb-3 lead mr-2 ">❌ إلغاء البيانات</button>
          </div>
        </form>

        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>

  <!-- file input -->
  <script src="{{ asset('vendor/file-input/js/fileinput.min.js') }}"></script>
  <script src="{{ asset('vendor/file-input/themes/fa/theme.min.js') }}"></script>
  <script>
    $("#image_new1").fileinput({
      theme: "fa",
      showUpload: false,
      showRemove: true,
      initialPreview: [
        @if($detailsNews->image)
          "{{ asset('image/detail-news/' . $detailsNews->image) }}"
        @endif
              ],
      initialPreviewAsData: true,
      initialPreviewFileType: 'image',
      overwriteInitial: true,
    });
  </script>

@endsection
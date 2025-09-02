@extends('layouts.master')
@section('title', '    البرامج التعلمية')

@section('css')
  <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
  <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endsection

@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div>
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> 📋 البرامج التعلمية </h2>
        <p class="mg-b-0"> يعرض جدول البرامج التعلمية </p>
      </div>
    </div>
    <div class="main-dashboard-header-right">
      <div>
        <label class="tx-13 font-weight-bold"> التاريخ </label>
        <div class="main-star text-primary">
          <span class="text-dark"> {{ now()->format('H:i A | d-m-Y') }} </span>
        </div>
      </div>
      <div>
        <label class="tx-13 font-weight-bold"> الصفحه الرئيسيه </label>
        <h5> <a class="text-danger" href="{{ route('dashboard') }}"> <i class="bi bi-house-fill"></i> الرئيسيه</a></h5>
      </div>

    </div>
  </div>
  <br>
  @include('include.success')

  @include('pages.department.create')

  <div class="accordion" id="facultyAccordion">
    <div class="card">
      <div class="card-header bg-primary text-white" id="headingOne">
        <h2 class="mb-0">
          <button class="btn btn-link text-white font-weight-bold" type="button" data-toggle="collapse"
            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <strong class="h3"> 📋🚀     البرامج التعلمية </strong>
          </button>
        </h2>
      </div>

      <div id="collapseOne" class="collapse false " aria-labelledby="headingOne" data-parent="#facultyAccordion">
        <div class="table-responsive mt-3">
          <table id="example1" class="table table-bordered table-striped text-center align-middle" dir="rtl">
            <thead>
              <tr>
                <th>#</th>
                <th class="text-primary font-weight-bold "> <i class="bi bi-person-fill"></i> اسم البرنامج التعلمي </th>
                <th class="text-primary font-weight-bold "> <i class="bi bi-person-fill"></i> وصف البرنامج التعلمي </th>
                <th class="text-primary font-weight-bold"> <i class="bi bi-file-earmark-text-fill"></i>  اضافه ملف البرنامج التعلمي
                </th>
                <th class="text-primary font-weight-bold"> <i class="bi bi-file-earmark-text-fill"></i>   اضافه صورة البرنامج </th>
                 <th class="text-primary font-weight-bold"> <i class="bi bi-person-bounding-box"></i> الرؤية البرنامج</th>
                 <th class="text-primary font-weight-bold"> <i class="bi bi-person-bounding-box"></i> رساله البرنامج</th>
                <th class="text-primary font-weight-bold"> <i class="bi bi-barcode"></i>الحالة</th>
                 <th class="text-primary font-weight-bold"> <i class="bi bi-gear"></i>الاعدادت</th>
              </tr>
            </thead>
            <tbody>
              @foreach($departments as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->description }}</td>
                   <td>
                    @if($item->requerd_file)
                      <a href="{{ asset('image/department-file/' . $item->requerd_file) }}" target="_blank"
                        class="btn btn-outline-danger btn-sm">
                        <i class="fas fa-file-pdf"></i> عرض البرنامج
                      </a>
                    @else
                      <span class="text-muted">لا يوجد ملف</span>
                    @endif
                  </td>
                  <td>
                    @if($item->dapart_image)
                      <a href="{{ asset('image/department-image/' . $item->dapart_image) }}" target="_blank" class="btn btn-outline-danger btn-sm">
                        <i class="bi bi-file-pdf"></i> عرض CV
                      </a>
                    @else
                      <span class="text-muted">لا يوجد ملف</span>
                    @endif
                  </td>
                  <td>
                    @if($item->depart_vision)
                      <img src="{{ asset('image/images_doctor/' . $item->depart_vision) }}" width="100"
                        class="img-thumbnail">
                    @else
                      <span class="text-muted">لا يوجد صورة</span>
                    @endif
                  </td>
                  <td class="text-center">
                    @if($item->is_active === 1)
                      <i class="bi bi-check-circle text-success fs-2"></i>
                    @else
                      <i class="bi bi-x-circle text-danger fs-2"></i>
                    @endif
                  </td>
                    <!-- dropdown     -->
                    <div class="dropdown">
                      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-gear"></i> الاعدادت
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href=" {{ route('department.edit', $item->id) }}">تعديل</a>
                        <form action="{{ route('department.destroy', $item->id) }}" method="POST" class="d-inline">
                          @csrf
                          @method('delete')
                          <a type="submit" class="dropdown-item delete_confirm   ">
                            حذف
                          </a>
                        </form>
                      </div>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.min.js')}}"></script>
  <script>
    $(document).ready(function () {
      $('#example1').DataTable({
        responsive: true,
        language: {
          url: "//cdn.datatables.net/plug-ins/1.13.5/i18n/ar.json",
        },

      });
    });
  </script>
  <!-- sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @include('pages.department._delete')
@endsection
@extends('layouts.master')
@section('title', '  جدول صوره السلايدر  ')

@section('css')
  <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
  <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


@endsection

@section('page-header')

  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div>
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> </h2>
        <p class="mg-b-0"> يعرض جدول صوره السلايدر </p>
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

  @include('include.success')

  <div class="card card-body">
    <div class="table-responsive">
      <h2 class="text-primary mb-3">📋 جدول صوره السلايدر</h2>

      <div class="d-flex justify-content-center mb-3">
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          <i class="bi bi-plus-circle"></i> <strong class="h5 font-weight-bold"> إضافة صوره سلايدر</strong>
        </button>
      </div>
      <p class="text-danger">✔️ يجب ان تضع صوره سلايدر بحجم 1920x1080 ولا تقل عن 3 صوره 🔥</p>
      <!-- Model academic_years -->
      @include('pages.slider._create')
      <table id="example1"
        class="table table-hover table-striped align-middle text-center shadow-sm rounded-3 table-bordered " dir="rtl">
        <thead class="px-3 py-2  text-white">
          <tr>
            <th scope="col">#</th>
            <th scope="col" class=" text-primary  " style="font-size: 18px;"><i class="bi bi-title"></i> العنون</th>
            <th scope="col" class="  text-primary  " style="font-size: 18px;"><i class="bi bi-image"></i> الصوره</th>
            <th scope="col" class="  text-primary  " style="font-size: 18px;"><i class="bi bi-check-circle"></i> الحالة
            </th>
            <th scope="col" class="  text-primary  " style="font-size: 18px;"><i class="bi bi-gear"></i> الإعدادات</th>
          </tr>
        </thead>
        <tbody>
          @foreach($sliders as $item)
            <tr>
              <td class="fw-bold text-secondary">{{ $loop->iteration }}</td>
              <td class="fw-bold text-dark">{{ $item->title }}</td>
              <td class="fw-bold text-danger">
                <div class="text-center">
                  <a href="{{ asset('image/image_slider/' . $item->image_slider) }}" target="_blank">
                    <img src="{{ asset('image/image_slider/' . $item->image_slider) }}" alt="{{ $item->title }}"
                      class="img-fluid rounded" style="width: 50px; height: 50px; object-fit: cover;">
                  </a>
                  <small class="text-muted">
                    <a href="{{ asset('image/image_slider/' . $item->image_slider) }}" target="_blank"
                      class="text-decoration-none">
                      <i class="bi bi-eye"></i> عرض الصورة
                    </a>
                  </small>
                </div>
              </td>
              <td>
                @if($item->is_active)
                  <span class="badge bg-success px-3 py-2"><i class="bi bi-check-lg"></i> مفعل</span>
                @else
                  <span class="badge bg-danger px-3 py-2"><i class="bi bi-x-lg"></i> غير مفعل</span>
                @endif
              </td>
              <td>
                <div class="dropdown">
                  <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-gear"></i> الإعدادات
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary dropdown-item" data-bs-toggle="modal"
                        data-bs-target="#editModal{{ $item->id }}">
                        <i class="bi bi-pencil"></i> تعديل
                      </button>
                    </li>
                    <li>
                      <form action="{{ route('slider.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="dropdown-item text-danger delete_confirm">
                          <i class="bi bi-trash"></i> حذف
                        </button>
                      </form>
                    </li>
                  </ul>
                </div>
              </td>
            </tr>
            <!-- model edit -->
            @include('pages.slider._edit', compact('item'))
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
@endsection

@section('js')
  <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#example1').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/ar.json"
        }
      });
    });
  </script>
  <!-- sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @include('pages.slider._delete')
@endsection
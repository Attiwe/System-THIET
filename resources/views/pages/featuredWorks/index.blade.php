@extends('layouts.master')
@section('title', '  الانشطه الطلابية')

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
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> 📋 الانشطه الطلابية </h2>
        <p class="mg-b-0"> يعرض جدول الانشطه الطلابية </p>
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
  <div class="card card-body">
    <div class="table-responsive mt-3">
      <div class="d-flex justify-content-between align-items-center ">
        <h2 class="text-primary mb-3 ">📋 جدول الانشطه الطلابية</h2>
        <div class="d-flex gap-4">
          <a href="{{ route('featured_work.trashed') }}" class="btn btn-outline-danger">
            <i class="bi bi-trash"></i> ارشفه
          </a>
          <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="bi bi-plus-circle"></i> <strong class="h5 font-weight-bold"> اضافة انشطه طلابه</strong>
          </button>
        </div>
      </div>


      <!-- Model   -->
      @include('pages.featuredWorks._create')

      <br>
      <br>
      <table id="example1"
        class="table table-hover table-striped align-middle text-center shadow-sm rounded-3 table-bordered " dir="rtl">
        <thead class="px-3 py-2  text-white">
          <tr>
            <th scope="col">#</th>
            <th scope="col" class="h5"><i class="bi bi-calendar-week"></i>  اسم الطالب || الطالبه </th>
            <th scope="col" class="h5"><i class="bi bi-calendar-week"></i>  الصورة </th>
            <th scope="col" class="h5"><i class="bi bi-calendar-week"></i>    العنوان </th>
            <th scope="col" class="h5"><i class="bi bi-calendar-week"></i>    التفاصيل </th>
            <th scope="col" class="h5"><i class="bi bi-calendar-week"></i>    الحالة </th>
            <th scope="col" class="h5"><i class="bi bi-calendar-week"></i>    تاريخ النشطه </th>
            <th scope="col" class="h5"><i class="bi bi-gear"></i> الإعدادات</th>
          </tr>
        </thead>
        <tbody>
          @foreach($featuredWorks as $item)
            <tr>
              <td class="fw-bold text-secondary">{{ $loop->iteration }}</td>
              <td class="fw-bold text-dark">{{ $item->name }}</td>
              <td class="fw-bold text-dark">{{ $item->image }}</td>
              <td class="fw-bold text-dark">{{ $item->title }}</td>
              <td class="fw-bold text-dark">{{ $item->details }}</td>
              <td>
                @if($item->is_active)
                  <span class="badge bg-success px-3 py-2"><i class="bi bi-check-lg"></i> مفعل</span>
                @else
                  <span class="badge bg-danger px-3 py-2"><i class="bi bi-x-lg"></i> غير مفعل</span>
                @endif
              </td>
              <td class="fw-bold text-danger">{{ $item->created_at->format('Y-m-d') }}</td>
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
                      <form action="{{ route('featured_work.destroy', $item->id) }}" method="POST" class="d-inline">
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
            @include('pages.featuredWorks._edit', compact('item'))
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
  @include('pages.qualityItem._delete')
@endsection
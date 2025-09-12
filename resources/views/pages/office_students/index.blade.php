@extends('layouts.master')
@section('title', '📚 بيانات الطلاب')
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
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1 font-weight-bold"> طلاب المكتبه 📚 </h2>
        <p class="mg-b-0"> طلاب المكتبه </p>
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
      <h2 class="text-primary mb-3">📋 <i class="bi bi-person-fill"></i> جدول الطلاب المكتبه</h2>

      <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createStudent">
          <i class="bi bi-plus-circle"></i> <strong class="h5 font-weight-bold text-2xl"> إضافة طالب </strong>
        </button>
      </div>
      @include('pages.office_students._create')
      <br>
      <br>
      <table id="example1"
        class="table table-hover table-striped align-middle text-center shadow-sm rounded-3 table-bordered " dir="rtl">
        <thead class="text-white">
          <tr>
            <th class="text-primary">#</th>
            <th class="text-primary"><i class="bi bi-building h5" style="font-size: 18px;"></i> القسم</th>
            <th class="text-primary"><i class="bi bi-layers" style="font-size: 18px;"></i> المستوى</th>
            <th class="text-primary"><i class="bi bi-person" style="font-size: 18px;"></i> الاسم</th>
            <th class="text-primary"><i class="bi bi-card-text" style="font-size: 18px;"></i> رقم القيد</th>
            <th class="text-primary"><i class="bi bi-envelope" style="font-size: 18px;"></i> البريد الإلكتروني</th>
            <th class="text-primary"><i class="bi bi-telephone" style="font-size: 18px;"></i> رقم الهاتف</th>
            <th class="text-primary"><i class="bi bi-gear" style="font-size: 18px;"></i> خيارات</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($students as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->department->name ?? '---' }}</td>
              <td>{{ $item->level->level_name ?? '---' }}</td>
              <td>{{ $item->name }}</td>
              <td class="text-danger">{{ $item->number_id }}</td>
              <td>{{ $item->email }}</td>
              <td class="text-danger">{{ $item->phone }}</td>
              <td>
                <div class="dropdown">
                  <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-gear"></i> خيارات
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li>
                      <button type="button" class="btn btn-primary dropdown-item" data-bs-toggle="modal"
                        data-bs-target="#editModal{{ $item->id }}">
                        <i class="bi bi-pencil"></i> تعديل
                      </button>
                    </li>
                    <li>
                      <form action="{{ route('office_students.destroy', $item->id) }}" method="POST" class="d-inline">
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
            @include('pages.office_students._edit')
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
  @include('pages.office_students._delete')
@endsection
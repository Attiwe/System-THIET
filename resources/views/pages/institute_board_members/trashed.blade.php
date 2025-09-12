@extends('layouts.master')
@section('title', ' مجلس اداره المعهد المحذوفه')

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
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> 📋 مجلس اداره المعهد </h2>
        <p class="mg-b-0"> يعرض جدول مجلس اداره المعهد </p>
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
        <label class="tx-13 font-weight-bold">  الصفحه الرئيسيه </label>
        <h5> <a class="text-primary" href="{{ route('dashboard') }}"> <i class="bi bi-house-fill "></i> الرئيسيه</a></h5>
      </div>

    </div>
  </div>
  <br>
  @include('include.success')
  <div class="card card-body">

    <div class="d-flex justify-content-between align-items-center">
      <h2 class="text-primary mb-3">📋 مجلس اداره المعهد المحذوفه </h2>
      <a href="{{ route('institute_board_members.index') }}" class="btn btn-outline-primary">
        <i class="bi bi-arrow-left"></i> العوده للصفحه الرئيسيه
      </a>
    </div>
    <br>
    <br>

    <table id="example1"
      class="table table-hover table-striped align-middle text-center shadow-sm rounded-3 table-bordered " dir="rtl">
      <thead class="px-3 py-2  text-white">
        <tr>
          <th scope="col">#</th>
          <th scope="col" class="h5"><i class="bi bi-calendar-week"></i> اسم العضو </th>
          <th scope="col" class="h5"><i class="bi bi-check-circle"></i> الدرجة</th>
           <th scope="col" class="h5"><i class="bi bi-gear"></i> الإعدادات</th>
        </tr>
      </thead>
      <tbody>
        @foreach($instituteBoardMembers as $item)
          <tr>
            <td class="fw-bold text-secondary">{{ $loop->iteration }}</td>
            <td class="fw-bold text-dark">{{ $item->facultyMembers->username }}</td>
            <td>
              {{ $item->type }}
            </td>
            <td>
              <!-- restore -->
              <form action="{{ route('institute_board_members.restore', $item->id) }}" method="POST" class="d-inline">
                @csrf
                @method('HEAD')
                <button type="submit" class="btn btn-outline-success">
                  <i class="bi bi-arrow-clockwise"></i> استرجاع
                </button>
              </form>

              <!-- delete -->
              <form action="{{ route('institute_board_members.forceDelete', $item->id) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-outline-danger delete_confirm">
                  <i class="bi bi-trash"></i> حذف نهائي
                </button>
              </form>

            </td>
          </tr>
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
  <script>
    $('.delete_confirm').click(function (e) {
      var form = $(this).closest('form');
      e.preventDefault();
      Swal.fire({
        title: 'هل انت متاكد من حذف هذا العنصر',
        text: "لا يمكن استرجاع هذا العنصر",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'نعم, حذف هذا العنصر'
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
        }
      })
    })
  </script>
@endsection
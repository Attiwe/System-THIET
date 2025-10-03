@extends('layouts.master')
@section('title', 'الهيكل التنظيمي')

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
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> 🏢📋 الهيكل التنظيمي </h2>
        <p class="mg-b-0"> يعرض الهيكل التنظيمي للمعهد </p>
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

  @include('pages.organization-structure.create')

  <div class="accordion" id="organizationAccordion">
    <div class="card">
      <div class="card-header bg-primary text-white" id="headingOne">
        <h2 class="mb-0">
          <button class="btn btn-link text-white font-weight-bold" type="button" data-toggle="collapse"
            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <strong class="h3"> 🏢📋 جدول الهيكل التنظيمي </strong>
          </button>
        </h2>
      </div>

      <br>
      <div id="collapseOne" class="collapse false " aria-labelledby="headingOne" data-parent="#organizationAccordion">
        <div class="table-responsive mt-3">
          <table id="example1"
            class="table table-bordered table-striped text-center align-middle shadow-sm rounded-3 table-bordered table-hover"
            dir="rtl">
            <thead>
              <tr>
                <th>#</th>
                <th class="text-primary font-weight-bold" style="font-size: 18px;">
                  <i class="bi bi-building"></i> الوحدة
                </th>
                <th class="text-primary font-weight-bold" style="font-size: 18px;">
                  <i class="bi bi-file-earmark-text"></i> ملف الهيكل التنظيمي
                </th>
                <th class="text-primary font-weight-bold" style="font-size: 18px;">
                  <i class="bi bi-calendar"></i> تاريخ الإضافة
                </th>
                <th class="text-primary font-weight-bold" style="font-size: 18px;">
                  <i class="bi bi-gear"></i> الإعدادات
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach($organizationStructures as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td class="fw-bold text-dark">
                    <div class="d-flex align-items-center justify-content-center">
                      <i class="bi bi-building text-primary me-2"></i>
                      {{ $item->unit->name }}
                    </div>
                  </td>
                  <td class="fw-bold text-muted">
                    @if($item->file_exists)
                      <div class="d-flex gap-2 align-items-center justify-content-center">
                        <a href="{{ $item->file_url }}" target="_blank" class="btn btn-outline-primary btn-sm">
                          <i class="bi bi-eye"></i> عرض
                        </a>
                        <a href="{{ $item->file_url }}" download class="btn btn-outline-success btn-sm">
                          <i class="bi bi-download"></i> تحميل
                        </a>
                        <span class="badge bg-info text-white">
                          <i class="bi bi-file-earmark"></i> {{ $item->file_size ?? 'غير محدد' }}
                        </span>
                      </div>
                    @else
                      <span class="badge bg-danger">
                        <i class="bi bi-exclamation-triangle"></i> الملف غير موجود
                      </span>
                    @endif
                  </td>
                  <td class="fw-bold text-dark">
                    <div class="d-flex align-items-center justify-content-center">
                      <i class="bi bi-calendar text-success me-2"></i>
                      {{ $item->formatted_created_at }}
                    </div>
                  </td>
                  <td>
                    <div class="dropdown">
                      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-gear"></i> الإعدادات
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('organization-structure.show', $item->id) }}">
                          <i class="bi bi-eye text-info"></i> عرض
                        </a>
                        <a class="dropdown-item" href="{{ route('organization-structure.edit', $item->id) }}">
                          <i class="bi bi-pencil text-warning"></i> تعديل
                        </a>
                        <form action="{{ route('organization-structure.destroy', $item->id) }}" method="POST" class="d-inline">
                          @csrf
                          @method('delete')
                          <a type="submit" class="dropdown-item delete_confirm text-danger">
                            <i class="bi bi-trash"></i> حذف
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
  @include('pages.organization-structure._delete')
@endsection

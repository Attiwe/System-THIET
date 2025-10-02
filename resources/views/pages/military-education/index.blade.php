@extends('layouts.master')
@section('title', 'التربية العسكرية')

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
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> 🎖️ التربية العسكرية </h2>
        <p class="mg-b-0"> إدارة وتنظيم محتوى التربية العسكرية </p>
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
        <h2 class="text-primary mb-3 "> جدول التربية العسكرية </h2>
         <div class="d-flex gap-3">
           <!-- Add Button (Modal) -->
           <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
             <i class="bi bi-plus-circle"></i> <span class="ms-2">إضافة تربية عسكرية</span>
           </button>
           <!-- Add Button (Page) -->
           <a href="{{ route('military-education.create') }}" class="btn btn-outline-success">
             <i class="bi bi-plus-square"></i> <span class="ms-2">إضافة في صفحة منفصلة</span>
           </a>
         </div>
      </div>
      <!-- Model -->
      @include('pages.military-education._create')
      <br>
      <br>
      <table id="example1"
        class="table table-hover table-striped align-middle text-center shadow-sm rounded-3 table-bordered" dir="rtl">
        <thead class="px-3 py-2  text-white">
          <tr>
            <th scope="col">#</th>
            <th scope="col" class="text-primary" style="font-size: 18px;"><i class="bi bi-file-text"></i> الوصف</th>
            <th scope="col" class="text-primary" style="font-size: 18px;"><i class="bi bi-calendar"></i> تاريخ الإنشاء</th>
            <th scope="col" class="text-primary" style="font-size: 18px;"><i class="bi bi-gear"></i> الإعدادات</th>
          </tr>
        </thead>
        <tbody>
          @foreach($militaryEducations as $item)
            <tr>
              <td class="fw-bold text-secondary">{{ $loop->iteration }}</td>
               <td class="fw-bold text-dark text-start">
                 <div class="d-flex align-items-center gap-2">
                   <div class="text-truncate" style="max-width: 300px;" title="{{ $item->description }}">
                     {{ Str::limit($item->description, 80) }}
                   </div>
                   <a href="{{ route('military-education.show', $item->id) }}" 
                      class="btn btn-outline-info btn-sm" 
                      title="عرض كامل">
                     <i class="bi bi-eye"></i>
                   </a>
                 </div>
               </td>
              <td class="fw-bold text-dark">{{ $item->created_at->format('Y-m-d H:i') }}</td>
              <td>
                <div class="dropdown">
                  <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-gear"></i> الإعدادات
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li>
                      <a class="dropdown-item" href="{{ route('military-education.show', $item->id) }}">
                        <i class="bi bi-eye text-info"></i> عرض
                      </a>
                    </li>
                    <li>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary dropdown-item" data-bs-toggle="modal"
                        data-bs-target="#editModal{{ $item->id }}">
                        <i class="bi bi-pencil"></i> تعديل سريع
                      </button>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{ route('military-education.edit', $item->id) }}">
                        <i class="bi bi-pencil-square text-primary"></i> تعديل في صفحة منفصلة
                      </a>
                    </li>
                    <li>
                      <form action="{{ route('military-education.destroy', $item->id) }}" method="POST" class="d-inline">
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
            @include('pages.military-education._edit', compact('item'))
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
  @include('pages.military-education._delete')
@endsection

@extends('layouts.master')
@section('title', 'الرحلات العلمية')

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
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> 📋 جدول الرحلات العلمية </h2>
        <p class="mg-b-0"> يعرض جدول الرحلات العلمية والصور المرتبطة بها </p>
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
      <h2 class="text-primary mb-3">📋 جدول الرحلات العلمية</h2>

      <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          <i class="bi bi-plus-circle"></i> <strong class="h5 font-weight-bold"> إضافة رحلة علمية</strong>
        </button>
      </div>

      <!-- Model scientific_trips -->
      @include('pages.scientific_trips._create')

      <br>
      <br>
      <table id="example1"
        class="table table-hover table-striped align-middle text-center shadow-sm rounded-3 table-bordered" dir="rtl">
        <thead class="px-3 py-2 text-white">
          <tr>
            <th scope="col">#</th>
            <th scope="col" class="text-primary" style="font-size: 18px;"><i class="bi bi-building"></i> القسم</th>
            <th scope="col" class="text-primary" style="font-size: 18px;"><i class="bi bi-person-badge"></i> اسم الدكتور</th>
            <th scope="col" class="text-primary" style="font-size: 18px;"><i class="bi bi-geo-alt"></i> اسم الرحلة</th>
            <th scope="col" class="text-primary" style="font-size: 18px;"><i class="bi bi-file-text"></i> الوصف</th>
            <th scope="col" class="text-primary" style="font-size: 18px;"><i class="bi bi-image"></i> الصورة</th>
            <th scope="col" class="text-primary" style="font-size: 18px;"><i class="bi bi-calendar-date"></i> تاريخ الإنشاء</th>
            <th scope="col" class="text-primary" style="font-size: 18px;"><i class="bi bi-gear"></i> الإعدادات</th>
          </tr>
        </thead>
        <tbody>
          @foreach($scientificTrips as $trip)
            <tr>
              <td class="fw-bold text-dark">{{ $loop->iteration }}</td>
              <td class="fw-bold text-dark">{{ $trip->department->name ?? 'غير محدد' }}</td>
              <td class="fw-bold text-dark">{{ $trip->doctor_name }}</td>
              <td class="fw-bold text-dark">{{ $trip->trip_name }}</td>
              <td class="fw-bold text-dark">{{ Str::limit($trip->description, 50) }}</td>
              <td>
                @if($trip->trip_image)
                  <button type="button" class="btn btn-outline-primary btn-sm" 
                          onclick="viewImage('{{ asset('storage/scientific_trips/images/' . $trip->trip_image) }}', '{{ $trip->trip_name }}')">
                    <i class="bi bi-eye"></i> عرض الصورة
                  </button>
                @else
                  <span class="badge bg-secondary px-3 py-2"><i class="bi bi-image"></i> لا توجد صورة</span>
                @endif
              </td>
              <td class="fw-bold text-warning">{{ $trip->created_at->format('Y-m-d') }}</td>
              <td>
                <div class="dropdown">
                  <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton{{ $trip->id }}"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-gear"></i> خيارات
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $trip->id }}">
                    <li>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary dropdown-item" data-bs-toggle="modal"
                        data-bs-target="#editModal{{ $trip->id }}">
                       <i class="bi bi-pencil"></i> تعديل  
                      </button>
                    </li>
                    <li>
                      <form action="{{ route('scientific_trips.destroy', $trip->id) }}" method="POST" class="d-inline">
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
            @include('pages.scientific_trips._edit', compact('trip'))
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!-- Image Viewer Modal -->
  <div class="modal fade" id="imageViewerModal" tabindex="-1" aria-labelledby="imageViewerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-white">
          <h5 class="modal-title" id="imageViewerModalLabel">
            <i class="bi bi-image"></i> عرض الصورة
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <img id="modalImage" src="" alt="صورة الرحلة العلمية" class="img-fluid rounded">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="bi bi-x-circle"></i> إغلاق
          </button>
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

    function viewImage(imageUrl, imageTitle) {
      const modal = new bootstrap.Modal(document.getElementById('imageViewerModal'));
      const modalTitle = document.getElementById('imageViewerModalLabel');
      const modalImage = document.getElementById('modalImage');
      
      modalTitle.innerHTML = '<i class="bi bi-image"></i> عرض الصورة: ' + imageTitle;
      modalImage.src = imageUrl;
      modalImage.alt = imageTitle;
      
      modal.show();
    }
  </script>
  <!-- sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @include('pages.scientific_trips._delete')
@endsection

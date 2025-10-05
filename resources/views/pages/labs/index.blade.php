@extends('layouts.master')
@section('title', 'المعامل')

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
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> 📋 جدول المعامل </h2>
        <p class="mg-b-0"> يعرض جدول المعامل والملفات المرتبطة بها </p>
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
      <h2 class="text-primary mb-3">📋 جدول المختبرات</h2>

      <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          <i class="bi bi-plus-circle"></i> <strong class="h5 font-weight-bold"> إضافة معامل</strong>
        </button>
      </div>

      <!-- Model labs -->
      @include('pages.labs._create')

      <br>
      <br>
      <table id="example1"
        class="table table-hover table-striped align-middle text-center shadow-sm rounded-3 table-bordered" dir="rtl">
        <thead class="px-3 py-2 text-white">
          <tr>
            <th scope="col">#</th>
            <th scope="col" class="text-primary" style="font-size: 18px;"><i class="bi bi-building"></i> القسم</th>
            <th scope="col" class="text-primary" style="font-size: 18px;"><i class="bi bi-flask"></i> اسم المعامل</th>
            <th scope="col" class="text-primary" style="font-size: 18px;"><i class="bi bi-file-earmark"></i> الملف</th>
            <th scope="col" class="text-primary" style="font-size: 18px;"><i class="bi bi-calendar-date"></i> تاريخ الإنشاء</th>
            <th scope="col" class="text-primary" style="font-size: 18px;"><i class="bi bi-gear"></i> الإعدادات</th>
          </tr>
        </thead>
        <tbody>
          @foreach($labs as $lab)
            <tr>
              <td class="fw-bold text-dark">{{ $loop->iteration }}</td>
              <td class="fw-bold text-dark">{{ $lab->department->name ?? 'غير محدد' }}</td>
              <td class="fw-bold text-primary">{{ $lab->lab_name }}</td>
              <td>
                @if($lab->lab_pdf)
                  <button type="button" class="btn btn-outline-danger btn-sm" 
                          onclick="viewFile('{{ asset('storage/labs/' . $lab->lab_pdf) }}', '{{ $lab->lab_name }}')">
                    <i class="bi bi-eye"></i> عرض الملف
                  </button>
                @else
                  <span class="badge bg-secondary px-3 py-2"><i class="bi bi-file-earmark"></i> لا يوجد ملف</span>
                @endif
              </td>
              <td class="fw-bold text-info">{{ $lab->created_at->format('Y-m-d') }}</td>
              <td>
                <div class="dropdown">
                  <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton{{ $lab->id }}"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-gear"></i> خيارات
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $lab->id }}">
                    <li>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary dropdown-item" data-bs-toggle="modal"
                        data-bs-target="#editModal{{ $lab->id }}">
                       <i class="bi bi-pencil"></i> تعديل  
                      </button>
                    </li>
                    <li>
                      <form action="{{ route('labs.destroy', $lab->id) }}" method="POST" class="d-inline">
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
            @include('pages.labs._edit', compact('lab'))
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!-- File Viewer Modal -->
  <div class="modal fade" id="fileViewerModal" tabindex="-1" aria-labelledby="fileViewerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header text-white">
          <h5 class="modal-title" id="fileViewerModalLabel">
            <i class="bi bi-file-earmark-text"></i> عرض الملف
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="fileContent" class="text-center">
            <div class="spinner-border text-primary" role="status">
              <span class="visually-hidden">جاري التحميل...</span>
            </div>
            <p class="mt-2">جاري تحميل الملف...</p>
          </div>
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

    function viewFile(fileUrl, fileName) {
      const modal = new bootstrap.Modal(document.getElementById('fileViewerModal'));
      const modalTitle = document.getElementById('fileViewerModalLabel');
      const fileContent = document.getElementById('fileContent');
      
      modalTitle.innerHTML = '<i class="bi bi-file-earmark-text"></i> عرض الملف: ' + fileName;
      
      // Check file extension
      const fileExtension = fileUrl.split('.').pop().toLowerCase();
      
      if (fileExtension === 'pdf') {
        fileContent.innerHTML = `
          <iframe src="${fileUrl}" width="100%" height="600px" style="border: none;">
            <p>متصفحك لا يدعم عرض ملفات PDF. <a href="${fileUrl}" target="_blank">اضغط هنا لتحميل الملف</a></p>
          </iframe>
        `;
      } else if (['doc', 'docx'].includes(fileExtension)) {
        fileContent.innerHTML = `
          <div class="alert alert-info">
            <i class="bi bi-info-circle"></i>
            <strong>ملف Word</strong><br>
            لا يمكن عرض ملفات Word مباشرة في المتصفح.<br>
            <a href="${fileUrl}" target="_blank" class="btn btn-primary mt-2">
              <i class="bi bi-download"></i> تحميل الملف لعرضه
            </a>
          </div>
        `;
      } else {
        fileContent.innerHTML = `
          <div class="alert alert-warning">
            <i class="bi bi-exclamation-triangle"></i>
            <strong>نوع ملف غير مدعوم</strong><br>
            لا يمكن عرض هذا النوع من الملفات مباشرة.<br>
            <a href="${fileUrl}" target="_blank" class="btn btn-primary mt-2">
              <i class="bi bi-download"></i> تحميل الملف
            </a>
          </div>
        `;
      }
      
      modal.show();
    }
  </script>
  <!-- sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @include('pages.labs._delete')
@endsection

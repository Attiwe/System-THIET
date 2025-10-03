@extends('layouts.master')
@section('title', 'مجلس الإدارة')

@section('css')
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('page-header')

  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div>
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> 📋 جدول مجلس الإدارة </h2>
        <p class="mg-b-0"> يعرض جدول مجلس الإدارة </p>
      </div>
    </div>
    <div class="main-dashboard-header-right">
      <div>
        <label class="tx-13 font-weight-bold">  التاريخ </label>
        <div class="main-star text-primary">
          <span class="text-dark"> {{ now()->format('H:i A | d-m-Y') }} </span>
        </div> 
      </div>
      <div>
        <label class="tx-13 font-weight-bold"> الصفحه الرئيسيه  </label>
        <h5  > <a class="text-danger" href="{{ route('dashboard') }}" > <i class="bi bi-house-fill"></i> الرئيسيه</a></h5>
      </div>

    </div>
  </div>
  <br>
  <br>
  <br>
  <div class="container-fluid py-4">
    <div class="card shadow-sm">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">مجلس الإدارة</h5>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          <i class="bi bi-plus-circle"></i> إضافة
        </button>
      </div>

      <div class="card-body">
        @include('include.validation')
        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
          <table class="table table-bordered align-middle">
            <thead>
              <tr>
                <th>#</th>
                <th>الوحدة</th>
                <th>الملف</th>
                <th>الخيارات</th>
              </tr>
            </thead>
            <tbody>
              @forelse($boards as $item)
                <tr>
                  <td class="fw-bold text-secondary">{{ $loop->iteration }}</td>
                  <td class="fw-bold">{{ optional($item->unit)->name }}</td>
                  <td>
                    @if($item->file_path)
                      <?php $basename = basename($item->file_path); ?>
                      <a class="btn btn-outline-info btn-sm" href="{{ route('management-boards.download', $basename) }}" target="_blank">
                        <i class="bi bi-box-arrow-up-right"></i> عرض/تحميل
                      </a>
                    @endif
                  </td>
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
                           <i class="bi bi-pencil"></i>  تعديل  
                          </button>
                        </li>
                        <li>
                          <form action="{{ route('management-boards.destroy', $item->id) }}" method="POST" class="d-inline">
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
                @include('pages.management_boards._edit', ['item' => $item, 'units' => $units])
              @empty
                <tr><td colspan="4" class="text-center">لا توجد بيانات</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  @include('pages.management_boards._create', ['units' => $units])
@endsection

@section('js')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const deleteButtons = document.querySelectorAll('.delete_confirm');
      deleteButtons.forEach(btn => {
        btn.addEventListener('click', function (e) {
          e.preventDefault();
          const form = this.closest('form');
          Swal.fire({
            title: 'هل أنت متأكد؟',
            text: 'لن تتمكن من التراجع عن هذه العملية!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'نعم، احذف',
            cancelButtonText: 'إلغاء'
          }).then((result) => {
            if (result.isConfirmed) {
              form.submit();
            }
          });
        });
      });
    });
  </script>
@endsection



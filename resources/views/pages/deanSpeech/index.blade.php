@extends('layouts.master')
@section('title', 'كلمات العميد')

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
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> 🎓 كلمات العميد </h2>
        <p class="mg-b-0">إدارة جميع كلمات العميد</p>
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
        <label class="tx-13 font-weight-bold"> الصفحة الرئيسية </label>
        <h5><a class="text-danger" href="{{ route('dashboard') }}"><i class="bi bi-house-fill"></i> الرئيسية</a></h5>
      </div>
    </div>
  </div>

  <br><br><br>

  <div class="container-fluid py-4">
    <div class="card shadow-sm">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-person-badge"></i> كلمات العميد</h5>
        <a href="{{ route('dean_speech.create') }}" class="btn btn-primary">
          <i class="bi bi-plus-circle"></i> إضافة كلمة عميد جديدة
        </a>
      </div>

      <div class="card-body">
        @include('include.validation')
        @include('include.success')

        <div class="table-responsive">
          <table class="table table-bordered align-middle text-center">
            <thead class="table-primary">
              <tr>
                <th>#</th>
                <th>اسم العميد</th>
                <th>الصورة</th>
                <th>كلمة العميد</th>
                <th>السيرة الذاتية</th>
                <th>الخيارات</th>
              </tr>
            </thead>
            <tbody>
              @forelse($news as $item)
                <tr>
                  <td class="fw-bold text-secondary">{{ $loop->iteration }}</td>
                  <td class="fw-bold">{{ $item->management_name }}</td>
                  <td>
                    @if($item->image)
                      <img src="{{ asset('image/dean-speech/' . $item->image) }}" alt="{{ $item->management_name }}"
                        class="img-thumbnail rounded" style="width: 90px; height: 90px; object-fit: cover;"
                        onerror="this.src='{{ asset('assets/img/no-image.png') }}'">
                    @else
                      <span class="badge bg-secondary"><i class="bi bi-image"></i> لا توجد صورة</span>
                    @endif
                  </td>
                  <td>
                    <div class="text-truncate" style="max-width: 300px;" title="{{ $item->title }}">
                      {{ Str::limit($item->title, 80) }}
                    </div>
                  </td>
                  <td>
                    @if($item->resume)
                      @if(preg_match('/\.(pdf|doc|docx|txt)$/i', $item->resume))
                        <a href="{{ asset('image/dean-speech/resumes/' . $item->resume) }}" target="_blank"
                          class="btn btn-outline-danger btn-sm rounded-pill">
                          <i class="bi bi-file-earmark-pdf"></i> عرض
                        </a>
                      @else
                        <button class="btn btn-outline-info btn-sm rounded-pill" data-bs-toggle="modal"
                          data-bs-target="#resumeModal{{ $item->id }}">
                          <i class="bi bi-file-earmark-text"></i> عرض
                        </button>
                      @endif
                    @else
                      <span class="badge bg-secondary"><i class="bi bi-x-circle"></i> غير متوفر</span>
                    @endif
                  </td>
                  <td>
                    <div class="dropdown">
                      <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button"
                        id="dropdownMenuButton{{ $item->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-gear"></i> خيارات
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $item->id }}">
                        <li>
                          <a href="{{ route('dean_speech.edit', $item->id) }}" class="dropdown-item text-primary">
                            <i class="bi bi-pencil"></i> تعديل
                          </a>
                        </li>
                        <li>
                          <form action="{{ route('dean_speech.destroy', $item->id) }}" method="POST" class="d-inline">
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

                @if($item->resume && !preg_match('/\.(pdf|doc|docx|txt)$/i', $item->resume))
                  <div class="modal fade" id="resumeModal{{ $item->id }}" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                          <h5 class="modal-title">
                            <i class="bi bi-file-earmark-text"></i>
                            السيرة الذاتية - {{ $item->management_name }}
                          </h5>
                          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                          <div class="p-3 bg-light rounded text-end" style="white-space: pre-wrap; direction: rtl;">
                            {{ $item->resume }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endif
              @empty
                <tr>
                  <td colspan="6" class="text-center text-muted py-5">
                    <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                    لا توجد كلمات عميد بعد
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

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
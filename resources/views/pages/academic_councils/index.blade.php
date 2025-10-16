@extends('layouts.master')
@section('title', 'المجالس الأكاديمية')

@section('css')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('page-header')
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div>
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> 📋 جدول المجالس الأكاديمية </h2>
        <p class="mg-b-0"> يعرض جدول المجالس الأكاديمية </p>
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
        <h5><a class="text-danger" href="{{ route('dashboard') }}"><i class="bi bi-house-fill"></i> الرئيسيه</a></h5>
      </div>
    </div>
  </div>
  <br>
  <br>
  <br>
@endsection

@section('content')
  <div class="container-fluid py-4">
    <div class="card shadow-sm">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">المجالس الأكاديمية</h5>
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
          <table class="table table-bordered align-middle" id="academic_councils">
            <thead>
              <tr>
                <th class="fw-bold text-primary" style="font-size: 18px;">#</th>
                <th class="fw-bold text-primary" style="font-size: 18px;">تاريخ الإنشاء</th>
                <th class="fw-bold text-primary" style="font-size: 18px;">الملف</th>
                <th class="fw-bold text-primary" style="font-size: 18px;">الخيارات</th>
              </tr>
            </thead>
            <tbody>
              @forelse($academicCouncils as $council)
                <tr>
                  <td class="fw-bold text-secondary">{{ $loop->iteration }}</td>
                  <td class="fw-bold">{{ $council->created_at->format('Y-m-d H:i') }}</td>
                  <td>
                    @if($council->pdf)
                      <div class="d-flex gap-2">
                        <a class="btn btn-outline-info btn-sm" href="{{ route('academic.councils.showPdf', $council->id) }}"
                          target="_blank">
                          <i class="bi bi-eye"></i> عرض
                        </a>
                        <a class="btn btn-outline-success btn-sm"
                          href="{{ route('academic.councils.download', $council->id) }}">
                          <i class="bi bi-download"></i> تحميل
                        </a>
                      </div>
                    @else
                      <span class="text-muted">لا يوجد ملف</span>
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

                          <button type="button" class="btn btn-primary dropdown-item" name="pdf" data-bs-toggle="modal"
                            data-bs-target="#editModal{{ $council->id }}">
                            <i class="bi bi-pencil"></i> تعديل
                          </button>
                        </li>
                        <li>
                          <form action="{{ route('academic.councils.destroy', $council->id) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="id" value="{{ $council->id }}">
                            <button type="submit" class="dropdown-item text-danger delete_confirm">
                              <i class="bi bi-trash"></i> حذف
                            </button>
                          </form>
                        </li>
                      </ul>
                    </div>
                  </td>
                </tr>
                @include('pages.academic_councils._edit', ['council' => $council])
              @empty
                <tr>
                  <td colspan="4" class="text-center">لا توجد بيانات</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  @include('pages.academic_councils._create')
@endsection

@section('js')

  <!-- sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @include('pages.academic_councils._delete')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function confirmDelete(councilName) {
      return confirm('هل أنت متأكد من حذف المجلس الأكاديمي: ' + councilName + '؟\n\nلن تتمكن من التراجع عن هذه العملية!');
    }
  </script>
@endsection
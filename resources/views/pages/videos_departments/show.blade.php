@extends('layouts.master')
@section('title', 'عرض فيديو قسم')
@section('css')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <style>
    .video-container {
      background: #f8f9fa;
      border-radius: 12px;
      padding: 2rem;
      text-align: center;
      margin-bottom: 2rem;
    }
    .video-player {
      max-width: 100%;
      max-height: 400px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .info-card {
      background: #fff;
      border-radius: 8px;
      padding: 1.5rem;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      margin-bottom: 1rem;
    }
    .info-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0.75rem 0;
      border-bottom: 1px solid #e9ecef;
    }
    .info-item:last-child {
      border-bottom: none;
    }
    .info-label {
      font-weight: 600;
      color: #495057;
    }
    .info-value {
      color: #6c757d;
    }
    .badge-custom {
      font-size: 0.875rem;
      padding: 0.5rem 1rem;
    }
  </style>
@endsection
@section('page-header')
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div class="breadcrumb-title">
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">عرض فيديو قسم</h2>
        <p class="mg-b-0">تفاصيل الفيديو المحدد</p>
      </div>
    </div>
    <div class="main-dashboard-header-right">
      <div class="d-flex align-items-center">
        <div class="mr-5">
          <label class="tx-13 font-weight-bold">التاريخ</label>
          <div class="main-star text-primary">
            <span class="text-dark">{{ now()->format('H:i A | d-m-Y') }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('content')
  <!-- Row -->
  <div class="row row-sm">
    <div class="col-lg-8">
      <div class="card custom-card">
        <div class="card-body">
          @if($videosDepartment->video)
            <div class="video-container">
              <h5 class="mb-3">
                <i class="bi bi-video text-primary"></i> 
                فيديو قسم {{ $videosDepartment->department->name ?? 'غير محدد' }}
              </h5>
              <video controls class="video-player">
                <source src="{{ route('videos_departments.showVideo', $videosDepartment->id) }}" type="video/mp4">
                متصفحك لا يدعم تشغيل الفيديو.
              </video>
              <div class="mt-3">
                <a href="{{ route('videos_departments.showVideo', $videosDepartment->id) }}" 
                   target="_blank" class="btn btn-primary">
                  <i class="bi bi-download"></i> تحميل الفيديو
                </a>
              </div>
            </div>
          @else
            <div class="alert alert-warning text-center">
              <i class="bi bi-exclamation-triangle" style="font-size: 2rem;"></i>
              <h5 class="mt-2">لا يوجد فيديو</h5>
              <p class="mb-0">لم يتم رفع فيديو لهذا القسم بعد.</p>
            </div>
          @endif
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card custom-card">
        <div class="card-body">
          <h6 class="main-content-label mb-3">تفاصيل الفيديو</h6>
          
          <div class="info-card">
            <div class="info-item">
              <span class="info-label">القسم:</span>
              <span class="info-value">
                @if($videosDepartment->department)
                  <span class="badge badge-primary badge-custom">
                    {{ $videosDepartment->department->name }}
                  </span>
                @else
                  <span class="text-muted">غير محدد</span>
                @endif
              </span>
            </div>
            
            <div class="info-item">
              <span class="info-label">تاريخ الإنشاء:</span>
              <span class="info-value">{{ $videosDepartment->created_at->format('Y-m-d H:i') }}</span>
            </div>
            
            <div class="info-item">
              <span class="info-label">تاريخ آخر تحديث:</span>
              <span class="info-value">{{ $videosDepartment->updated_at->format('Y-m-d H:i') }}</span>
            </div>
            
            <div class="info-item">
              <span class="info-label">حالة الفيديو:</span>
              <span class="info-value">
                @if($videosDepartment->video)
                  <span class="badge badge-success badge-custom">
                    <i class="bi bi-check-circle"></i> متوفر
                  </span>
                @else
                  <span class="badge badge-warning badge-custom">
                    <i class="bi bi-exclamation-circle"></i> غير متوفر
                  </span>
                @endif
              </span>
            </div>
          </div>

          <div class="d-grid gap-2">
            <a href="{{ route('videos_departments.edit', $videosDepartment->id) }}" 
               class="btn btn-warning">
              <i class="bi bi-pencil"></i> تعديل الفيديو
            </a>
            <a href="{{ route('videos_departments.index') }}" 
               class="btn btn-secondary">
              <i class="bi bi-arrow-right"></i> العودة للقائمة
            </a>
            <button type="button" class="btn btn-danger" 
                    onclick="confirmDelete({{ $videosDepartment->id }})">
              <i class="bi bi-trash"></i> حذف الفيديو
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Row -->

  <!-- Delete Confirmation Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">تأكيد الحذف</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          هل أنت متأكد من حذف هذا الفيديو؟ لا يمكن التراجع عن هذا الإجراء.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
          <form id="deleteForm" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">حذف</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
    function confirmDelete(id) {
      const form = document.getElementById('deleteForm');
      form.action = `/videos_departments/${id}`;
      $('#deleteModal').modal('show');
    }
  </script>
@endsection

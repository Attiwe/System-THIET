@extends('layouts.master')
@section('title', 'فيديوهات الأقسام')
@section('css')
  <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
  <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <style>
    .video-display {
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .video-icon {
      font-size: 1.2em;
      color: #dc3545;
    }
    .video-info {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
    }
    .dropdown-menu {
      border: 1px solid #dee2e6;
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }
    .dropdown-item {
      padding: 0.5rem 1rem;
      transition: all 0.3s ease;
    }
    .dropdown-item:hover {
      background-color: #f8f9fa;
    }
    .table td {
      vertical-align: middle;
    }
    .video-preview {
      width: 60px;
      height: 40px;
      background: #f8f9fa;
      border-radius: 4px;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 1px solid #dee2e6;
    }
  </style>
@endsection
@section('page-header')
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div class="breadcrumb-title">
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">فيديوهات الأقسام</h2>
        <p class="mg-b-0">جدول فيديوهات الأقسام والملفات المرتبطة بها</p>
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
    <div class="col-lg-12">
      <div class="card custom-card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h6 class="main-content-label mb-0">قائمة فيديوهات الأقسام</h6>
            <a href="{{ route('videos_departments.create') }}" class="btn btn-primary">
              <i class="bi bi-plus-circle"></i> إضافة فيديو جديد
            </a>
          </div>

          @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

          @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('error') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

          <div class="table-responsive">
            <table class="table table-bordered table-striped mg-b-0 text-md-nowrap">
              <thead>
                <tr>
                  <th>#</th>
                  <th>القسم</th>
                  <th>الفيديو</th>
                  <th>تاريخ الإنشاء</th>
                  <th>تاريخ التحديث</th>
                  <th>الإجراءات</th>
                </tr>
              </thead>
              <tbody>
                @forelse($videosDepartments as $index => $videoDepartment)
                  <tr>
                    <td>{{ $videosDepartments->firstItem() + $index }}</td>
                    <td>
                      <span class="badge badge-primary">{{ $videoDepartment->department->name ?? 'غير محدد' }}</span>
                    </td>
                    <td>
                      @if($videoDepartment->video)
                        <div class="video-display">
                          <div class="video-preview">
                            <i class="bi bi-play-circle video-icon"></i>
                          </div>
                          <div class="video-info">
                            <small class="text-muted">فيديو</small>
                            <a href="{{ route('videos_departments.showVideo', $videoDepartment->id) }}" 
                               target="_blank" class="text-primary">
                              عرض الفيديو
                            </a>
                          </div>
                        </div>
                      @else
                        <span class="text-muted">لا يوجد فيديو</span>
                      @endif
                    </td>
                    <td>{{ $videoDepartment->created_at->format('Y-m-d H:i') }}</td>
                    <td>{{ $videoDepartment->updated_at->format('Y-m-d H:i') }}</td>
                    <td>
                      <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" 
                                id="dropdownMenuButton{{ $videoDepartment->id }}" 
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $videoDepartment->id }}">
                          <a class="dropdown-item" href="{{ route('videos_departments.show', $videoDepartment->id) }}">
                            <i class="bi bi-eye text-info"></i> عرض
                          </a>
                          <a class="dropdown-item" href="{{ route('videos_departments.edit', $videoDepartment->id) }}">
                            <i class="bi bi-pencil text-warning"></i> تعديل
                          </a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item text-danger" href="#" 
                             onclick="confirmDelete({{ $videoDepartment->id }})">
                            <i class="bi bi-trash"></i> حذف
                          </a>
                        </div>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="6" class="text-center text-muted py-4">
                      <i class="bi bi-inbox" style="font-size: 2rem;"></i>
                      <p class="mt-2">لا توجد فيديوهات أقسام</p>
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          @if($videosDepartments->hasPages())
            <div class="d-flex justify-content-center mt-4">
              {{ $videosDepartments->links() }}
            </div>
          @endif
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
  <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
  <script>
    function confirmDelete(id) {
      const form = document.getElementById('deleteForm');
      form.action = `/videos_departments/${id}`;
      $('#deleteModal').modal('show');
    }

    // Auto-hide alerts after 5 seconds
    setTimeout(function() {
      $('.alert').fadeOut('slow');
    }, 5000);
  </script>
@endsection

@extends('layouts.master')
@section('title', 'بيانات المعهد')

@section('css')
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <style>
    .institute-card {
      border: 1px solid #e9ecef;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
      transition: all 0.3s ease;
      margin-bottom: 20px;
      background: #fff;
    }
    .institute-card:hover {
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.12);
      transform: translateY(-2px);
    }
    .card-header-custom {
      background: linear-gradient(45deg, #6c757d, #495057);
      color: white;
      border-bottom: 2px solid #007bff;
      padding: 15px 20px;
      border-radius: 8px 8px 0 0;
    }
    .card-body-enhanced { padding: 20px; }
    .info-item {
      display: flex; align-items: start;
      padding: 12px 0; border-bottom: 1px solid #f8f9fa;
      transition: background-color 0.2s ease;
    }
    .info-item:hover { background-color: rgba(0, 123, 255, 0.03); border-radius: 4px; }
    .info-item:last-child { border-bottom: none; }
    .info-icon {
      background: #007bff; color: white; width: 32px; height: 32px;
      border-radius: 6px; display: flex; align-items: center;
      justify-content: center; margin-left: 12px; font-size: 14px;
    }
    .info-content { flex: 1; }
    .info-label { font-weight: 600; color: #495057; font-size: 14px; margin-bottom: 4px; }
    .info-value { color: #6c757d; font-size: 13px; line-height: 1.4; }
    .file-btn {
      background: #28a745; color: white; border: none; padding: 6px 12px;
      border-radius: 4px; text-decoration: none; font-size: 12px;
      display: inline-flex; align-items: center; gap: 6px;
    }
    .file-btn:hover { background: #218838; color: white; transform: translateY(-1px); }
    .stats-row { background: #f8f9fa; border: 1px solid #dee2e6; border-radius: 6px; padding: 15px; margin-bottom: 20px; }
    .stat-box { text-align: center; padding: 10px; }
    .stat-number { font-size: 24px; font-weight: bold; color: #007bff; margin-bottom: 4px; }
    .stat-label { font-size: 12px; color: #6c757d; }
    .header-info { background: white; border: 1px solid #dee2e6; border-radius: 6px; padding: 20px; margin-bottom: 20px; }
    .files-section { border-top: 2px solid #f8f9fa; margin-top: 20px; padding-top: 15px; }
    .files-title { color: #495057; font-weight: 600; font-size: 14px; margin-bottom: 15px; display: flex; align-items: center; gap: 8px; }
    .no-data-alert { text-align: center; padding: 40px 20px; background: white; border: 1px solid #dee2e6; border-radius: 6px; }
    .no-data-icon { font-size: 48px; color: #6c757d; margin-bottom: 15px; }
    .dropdown-menu-custom { border: 1px solid #dee2e6; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); border-radius: 6px; }
    .dropdown-item-custom { padding: 8px 16px; font-size: 14px; display: flex; align-items: center; gap: 8px; }
    .dropdown-item-custom:hover { background-color: #f8f9fa; }
  </style>
@endsection

@section('page-header')
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <h2 class="main-content-title tx-24">بيانات المعهد</h2>
    </div>
    <div class="main-dashboard-header-right d-flex align-items-center">
      <div class="me-4">
        <label class="tx-13 fw-bold">التاريخ</label>
        <div class="main-star text-primary">
          <span class="text-dark">{{ now()->format('H:i A | d-m-Y') }}</span>
        </div>
      </div>
      <div>
        <label class="tx-13 fw-bold">الصفحة الرئيسية</label>
        <h5><a class="text-danger" href="{{ route('dashboard') }}"><i class="bi bi-house-fill"></i> الرئيسية</a></h5>
      </div>
    </div>
  </div>

  <!-- معلومات أساسية -->
  <div class="header-info">
    <div class="row">
      <div class="col-md-4">
        <div class="info-item">
          <div class="info-icon"><i class="bi bi-building"></i></div>
          <div class="info-content">
            <div class="info-label">اسم المعهد</div>
            <div class="info-value">{{ $getSetting->name }}</div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="info-item">
          <div class="info-icon"><i class="bi bi-eye"></i></div>
          <div class="info-content">
            <div class="info-label">رؤية المعهد</div>
            <div class="info-value">{{  $unitInstitutes->vision ?? 'غير محدد' }}</div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="info-item">
          <div class="info-icon"><i class="bi bi-envelope"></i></div>
          <div class="info-content">
            <div class="info-label">رسالة المعهد </div>
            <div class="info-value">{{ $unitInstitutes->message ?? 'غير محدد' }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- إحصائيات -->
  <div class="stats-row">
    <div class="row">
      <div class="col-6 col-md-3">
        <div class="stat-box">
          <div class="stat-number">{{ count($institutes) }}</div>
          <div class="stat-label">إجمالي المعاهد</div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="stat-box">
          <div class="stat-number">{{ $institutes->whereNotNull('academic_council')->count() }}</div>
          <div class="stat-label">مجالس أكاديمية</div>
        </div>
      </div>
      <div class="col-6 col-md-2">
        <div class="stat-box">
          <div class="stat-number">{{ $institutes->whereNotNull('structure')->count() }}</div>
          <div class="stat-label">هياكل تنظيمية</div>
        </div>
      </div>
      <div class="col-6 col-md-2">
        <div class="stat-box">
          <div class="stat-number">{{ $institutes->whereNotNull('strategy')->count() }}</div>
          <div class="stat-label">استراتيجيات</div>
        </div>
      </div>
      <div class="col-6 col-md-2">
        <div class="stat-box">
          <div class="stat-number">
            <a href="{{ route('institutes.create') }}" class="text-primary">إضافة <i class="bi bi-plus-circle-fill"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('content')
  <div class="row">
    @forelse($institutes as $item)
      <div class="col-md-6">
        <div class="card institute-card">
          <div class="card-header-custom d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="bi bi-building me-2"></i>{{ $item->name ?? 'بيانات المعهد' }}</h5>
            <div class="dropdown">
              <button class="btn btn-sm btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                <i class="bi bi-gear"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-custom dropdown-menu-end">
                <a class="dropdown-item dropdown-item-custom" href="{{ route('institutes.edit', $item->id) }}">
                  <i class="bi bi-pencil-square text-primary"></i> تعديل
                </a>
                <form action="{{ route('institutes.destroy', $item->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('delete')
                  <button type="submit" class="dropdown-item dropdown-item-custom delete_confirm text-danger">
                    <i class="bi bi-trash-fill"></i> حذف
                  </button>
                </form>
              </div>
            </div>
          </div>

          <div class="card-body-enhanced">
            <!-- بيانات -->
            <div class="info-item">
              <div class="info-icon"><i class="bi bi-chat-quote"></i></div>
              <div class="info-content"><div class="info-label">الكلمة</div><div class="info-value fw-bold">{{ $item->word ?: 'غير محدد' }}</div></div>
            </div>
            <div class="info-item">
              <div class="info-icon"><i class="bi bi-people"></i></div>
              <div class="info-content"><div class="info-label">عدد الطلاب</div><div class="info-value fw-bold  "> <span class="text-danger bg-warning text-white p-1 rounded-pill">{{ $item->number ?: 'غير محدد' }}</span></div></div>
            </div>
            <div class="info-item">
              <div class="info-icon"><i class="bi bi-person-gear"></i></div>
              <div class="info-content"><div class="info-label">عدد العاملين</div><div class="info-value fw-bold"> <span class="text-danger bg-warning text-white p-1 rounded-pill">{{ $item->employees ?: 'غير محدد' }}</span></div></div>
            </div>
            <div class="info-item">
              <div class="info-icon"><i class="bi bi-people"></i></div>
              <div class="info-content"><div class="info-label">عدد القاعات</div><div class="info-value fw-bold"> <span class="text-danger bg-warning text-white p-1 rounded-pill">{{ $item->classrooms ?: 'غير محدد' }}</span></div></div>
           
            </div>
            <div class="info-item">
              <div class="info-icon"><i class="bi bi-people"></i></div>
              <div class="info-content"><div class="info-label">عدد الخريجين</div><div class="info-value fw-bold"> <span class="text-danger bg-warning text-white p-1 rounded-pill">{{ $item->graduates ?: 'غير محدد' }}</span></div></div>
            </div>
            <div class="info-item">
              <div class="info-icon"><i class="bi bi-compass"></i></div>
              <div class="info-content"><div class="info-label">المحاور</div><div class="info-value fw-bold">{{ $item->muhadara ?: 'غير محدد' }}</div></div>
            </div>
            <div class="info-item">
              <div class="info-icon"><i class="bi bi-heart"></i></div>
              <div class="info-content"><div class="info-label">القيم</div><div class="info-value fw-bold">{{ $item->values ?: 'غير محدد' }}</div></div>
            </div>
            <div class="info-item">
              <div class="info-icon"><i class="bi bi-map"></i></div>
              <div class="info-content"><div class="info-label">الخطة</div><div class="info-value fw-bold">{{ $item->plan ?: 'غير محدد' }}</div></div>
            </div>
            <div class="info-item">
              <div class="info-icon"><i class="bi bi-target"></i></div>
              <div class="info-content"><div class="info-label">الأهداف</div><div class="info-value fw-bold">{{ $item->goals ?: 'غير محدد' }}</div></div>
            </div>

            <!-- الملفات -->
            <div class="files-section">
              <div class="files-title"><i class="bi bi-folder"></i> الملفات والوثائق</div>
              <div class="row">
                <div class="col-12 mb-2">
                  <div class="info-item">
                    <div class="info-icon"><i class="bi bi-people"></i></div>
                    <div class="info-content">
                      <div class="info-label">المجلس الأكاديمي</div>
                        <div class="info-value fw-bold">
                        @if($item->academic_council)
                          <a href="{{ asset('storage/' . $item->academic_council) }}" target="_blank" class="file-btn"><i class="bi bi-file-earmark-pdf"></i> فتح الملف</a>
                        @else <span class="text-muted">لا يوجد ملف</span> @endif
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-12 mb-2">
                  <div class="info-item">
                    <div class="info-icon"><i class="bi bi-diagram-3"></i></div>
                    <div class="info-content">
                      <div class="info-label">الهيكل التنظيمي</div>
                      <div class="info-value fw-bold">
                        @if($item->structure)
                          <a href="{{ asset('storage/' . $item->structure) }}" target="_blank" class="file-btn"><i class="bi bi-file-earmark-pdf"></i> فتح الملف</a>
                        @else <span class="text-muted">لا يوجد ملف</span> @endif
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-12 mb-2">
                  <div class="info-item">
                    <div class="info-icon"><i class="bi bi-lightbulb"></i></div>
                    <div class="info-content">
                      <div class="info-label">استراتيجية التعليم</div>
                      <div class="info-value fw-bold  ">
                        @if($item->strategy)
                          <a href="{{ asset('storage/' . $item->strategy) }}" target="_blank" class="file-btn"><i class="bi bi-file-earmark-pdf"></i> فتح الملف</a>
                        @else <span class="text-muted">لا يوجد ملف</span> @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    @empty
      <div class="col-12">
        <div class="no-data-alert">
          <div class="no-data-icon"><i class="bi bi-inbox"></i></div>
          <h4 class="mb-3">لا توجد بيانات معاهد</h4>
          <p class="text-muted mb-4">لم يتم العثور على أي معاهد في النظام حالياً</p>
          <a href="{{ route('institutes.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle me-2"></i> إضافة معهد جديد</a>
        </div>
      </div>
    @endforelse
  </div>
@endsection

@section('js')
  <!-- Bootstrap JS -->
  <!-- مكتبة Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- مكتبة jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- مكتبة SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    // تأكيد الحذف
    document.querySelectorAll('.delete_confirm').forEach(button => {
      button.addEventListener('click', function (e) {
        e.preventDefault();

        var form = $(this).closest("form");
        var name = $(this).data("name");

        Swal.fire({
          title: 'هل أنت متأكد؟',
          text: "لن تتمكن من التراجع عن هذا!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'نعم، احذف!',
          cancelButtonText: 'إلغاء',
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire({
              title: 'جاري الحذف...',
              text: 'يرجى الانتظار',
              icon: 'info',
              allowOutsideClick: false,
              showConfirmButton: false,
              didOpen: () => {
                Swal.showLoading()
              }
            });

            form.submit();
          }
        });
      });
    });
  });
</script>

@endsection

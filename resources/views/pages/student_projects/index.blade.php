@extends('layouts.master')
@section('title', 'المشاريع الطلابية')

@section('css')
  <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
  <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts - Tajawal -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  
  <style>
    .project-card {
      background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      border-radius: 0.75rem;
      padding: 1rem;
      margin-bottom: 0.75rem;
      box-shadow: 0 3px 10px rgba(0,0,0,0.06);
      transition: all 0.3s ease;
      border: 1px solid rgba(102, 126, 234, 0.1);
    }
    
    .project-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(0,0,0,0.12);
      border-color: rgba(102, 126, 234, 0.2);
    }
    
    .project-image {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #667eea;
      box-shadow: 0 3px 10px rgba(0,0,0,0.08);
    }
    
    .project-icon {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
      box-shadow: 0 3px 10px rgba(0,0,0,0.08);
    }
    
    .project-name {
      font-size: 1.1rem;
      font-weight: 600;
      color: #2c3e50;
      margin-bottom: 0.4rem;
      line-height: 1.3;
    }
    
    .project-info {
      color: #6c757d;
      font-size: 0.85rem;
      margin-bottom: 0.2rem;
      line-height: 1.2;
    }
    
    .project-badge {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      padding: 0.25rem 0.75rem;
      border-radius: 1rem;
      font-size: 0.8rem;
      font-weight: 500;
    }
    
    .action-buttons {
      gap: 0.5rem;
    }
    
    .btn-project {
      padding: 0.4rem 0.8rem;
      border-radius: 0.4rem;
      font-size: 0.8rem;
      transition: all 0.3s ease;
    }
    
    .btn-project:hover {
      transform: translateY(-1px);
      box-shadow: 0 3px 10px rgba(0,0,0,0.15);
    }
    
    .table-enhanced {
      border-radius: 1rem;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    
    .table-enhanced thead th {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      border: none;
      padding: 1rem;
      font-weight: 600;
    }
    
    .table-enhanced tbody tr {
      transition: all 0.3s ease;
    }
    
    .table-enhanced tbody tr:hover {
      background-color: rgba(102, 126, 234, 0.05);
      transform: scale(1.01);
    }
    
    .table-enhanced tbody td {
      padding: 1rem;
      border-color: #e9ecef;
      vertical-align: middle;
    }
    
    @media (max-width: 768px) {
      .project-card {
        padding: 0.8rem;
        margin-bottom: 0.5rem;
      }
      
      .project-image, .project-icon {
        width: 50px;
        height: 50px;
        font-size: 1.2rem;
      }
      
      .project-name {
        font-size: 1rem;
        margin-bottom: 0.3rem;
      }
      
      .project-info {
        font-size: 0.8rem;
      }
      
      .btn-project {
        padding: 0.3rem 0.6rem;
        font-size: 0.75rem;
      }
    }
  </style>
@endsection

@section('page-header')

  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div>
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> 🎓💡 جدول المشاريع الطلابية </h2>
        <p class="mg-b-0"> يعرض جدول المشاريع الطلابية </p>
      </div>
    </div>
    <div class="main-dashboard-header-right">
      <div>
        <label class="tx-13 font-weight-bold"> التاريخ </label>
        <div class="main-star">
          <span class="text-dark"> {{ now()->format('H:i A | d-m-Y') }} </span>
        </div>
      </div>
      <div>
        <label class="tx-13 font-weight-bold"> الصفحه الرئيسيه</label>
        <h5> <a class="text-danger" href="{{ route('dashboard') }}"> <i class="bi bi-house-fill"></i> الرئيسيه</a></h5>
      </div>
    </div>
  </div>
  <br>
  @include('include.success')

  <div class="container-fluid">
    <!-- Header Card -->
    <div class="card mb-4" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border-radius: 1rem; box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col-md-8">
            <div class="d-flex align-items-center">
              <div class="me-3" style="width: 60px; height: 60px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; backdrop-filter: blur(10px);">
                <i class="bi bi-lightbulb"></i>
              </div>
              <div>
                <h1 class="mb-2 fw-bold">المشاريع الطلابية</h1>
                <p class="mb-0 opacity-75">إدارة وعرض المشاريع الطلابية</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="d-flex justify-content-end gap-2">
              <a href="{{ route('studentProjects.create.page') }}" class="btn btn-light btn-lg">
                <i class="bi bi-plus-circle me-2"></i>إضافة مشروع جديد
              </a>
              <button type="button" class="btn btn-outline-light btn-lg" data-bs-toggle="modal" data-bs-target="#createModal">
                <i class="bi bi-plus-square me-2"></i>إضافة سريع
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Project Cards Grid -->
    <div class="row mb-4">
      @foreach($studentProjects as $project)
        <div class="col-lg-4 col-md-6 mb-3">
          <div class="project-card">
            <div class="d-flex align-items-start">
              <div class="me-3">
                @if($project->image_work)
                  <img src="{{ route('studentProjects.showImage', $project->id) }}" 
                       class="project-image" alt="{{ $project->project_name }}">
                @else
                  <div class="project-icon">
                    <i class="bi bi-lightbulb"></i>
                  </div>
                @endif
              </div>
              <div class="flex-grow-1">
                <h5 class="project-name">{{ $project->project_name }}</h5>
                <div class="project-info">
                  <i class="bi bi-person me-1"></i>{{ $project->doctor_name }}
                </div>
                <div class="project-info">
                  <i class="bi bi-building me-1"></i>{{ $project->department->name ?? 'غير محدد' }}
                </div>
                <div class="project-info">
                  <i class="bi bi-calendar me-1"></i>{{ $project->created_at->format('Y-m-d') }}
                </div>
                <span class="project-badge mt-2 d-inline-block">مشروع طلابي</span>
              </div>
            </div>
            <div class="d-flex action-buttons mt-3">
              <a href="{{ route('studentProjects.show', $project->id) }}" class="btn btn-info btn-project">
                <i class="bi bi-eye me-1"></i>عرض
              </a>
              <a href="{{ route('studentProjects.edit', $project->id) }}" class="btn btn-warning btn-project">
                <i class="bi bi-pencil me-1"></i>تعديل
              </a>
              <form action="{{ route('studentProjects.destroy', $project->id) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger btn-project delete_confirm">
                  <i class="bi bi-trash me-1"></i>حذف
                </button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <!-- Table View Toggle -->
    <div class="text-center mb-4">
      <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#tableView" aria-expanded="false">
        <i class="bi bi-table me-2"></i>عرض الجدول
      </button>
    </div>

    <!-- Table View -->
    <div class="collapse" id="tableView">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table id="example1" class="table table-enhanced text-center align-middle" dir="rtl">
              <thead>
                <tr>
                  <th><i class="bi bi-hash"></i> #</th>
                  <th><i class="bi bi-lightbulb"></i> اسم المشروع</th>
                  <th><i class="bi bi-person-fill"></i> اسم الدكتور</th>
                  <th><i class="bi bi-building"></i> القسم</th>
                  <th><i class="bi bi-image"></i> صورة العمل</th>
                  <th><i class="bi bi-file-earmark-pdf"></i> ملف PDF</th>
                  <th><i class="bi bi-calendar"></i> تاريخ الإضافة</th>
                  <th><i class="bi bi-gear"></i> الإجراءات</th>
                </tr>
              </thead>
              <tbody>
                @foreach($studentProjects as $project)
                  <tr>
                    <td><span class="badge bg-primary rounded-pill">{{ $loop->iteration }}</span></td>
                    <td class="fw-bold">{{ $project->project_name }}</td>
                    <td>{{ $project->doctor_name }}</td>
                    <td>
                      @if($project->department)
                        <span class="badge bg-info">{{ $project->department->name }}</span>
                      @else
                        <span class="text-muted">--</span>
                      @endif
                    </td>
                    <td>
                      @if($project->image_work)
                        <img src="{{ route('studentProjects.showImage', $project->id) }}" 
                             width="50" height="50" class="rounded-circle">
                      @else
                        <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center" 
                             style="width: 50px; height: 50px; color: white;">
                          <i class="bi bi-image"></i>
                        </div>
                      @endif
                    </td>
                    <td>
                      @if($project->project_pdf)
                        <a href="{{ route('studentProjects.showPdf', $project->id) }}" target="_blank" class="btn btn-outline-danger btn-sm">
                          <i class="bi bi-file-pdf"></i> PDF
                        </a>
                      @else
                        <span class="text-muted">--</span>
                      @endif
                    </td>
                    <td>{{ $project->created_at->format('Y-m-d') }}</td>
                    <td>
                      <div class="btn-group" role="group">
                        <a href="{{ route('studentProjects.show', $project->id) }}" class="btn btn-info btn-sm">
                          <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('studentProjects.edit', $project->id) }}" class="btn btn-warning btn-sm">
                          <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('studentProjects.destroy', $project->id) }}" method="POST" class="d-inline">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-danger btn-sm delete_confirm">
                            <i class="bi bi-trash"></i>
                          </button>
                        </form>
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
  </div>

  <!-- Create Modal -->
  @include('pages.student_projects.create')
@endsection

@section('js')
  <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <script>
    $(document).ready(function () {
      // Initialize DataTable
      $('#example1').DataTable({
        responsive: true,
        language: {
          url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/ar.json'
        },
        pageLength: 10,
        order: [[0, 'asc']],
        columnDefs: [
          { orderable: false, targets: [4, 5, 7] } // Disable ordering for action columns
        ]
      });
      
      // Add hover effects to project cards
      $('.project-card').hover(
        function() {
          $(this).css('transform', 'translateY(-8px)');
        },
        function() {
          $(this).css('transform', 'translateY(0)');
        }
      );
      
      // Smooth scroll for table toggle
      $('[data-bs-target="#tableView"]').on('click', function() {
        setTimeout(function() {
          $('html, body').animate({
            scrollTop: $('#tableView').offset().top - 100
          }, 500);
        }, 300);
      });
    });
  </script>
  
  @include('pages.student_projects._delete')
@endsection

@extends('layouts.master')
@section('title', 'أعضاء هيئة التدريس')

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
    .faculty-card {
      background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      border-radius: 1rem;
      padding: 1.5rem;
      margin-bottom: 1rem;
      box-shadow: 0 5px 15px rgba(0,0,0,0.08);
      transition: all 0.3s ease;
    }
    
    .faculty-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }
    
    .faculty-image {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      object-fit: cover;
      border: 4px solid #667eea;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .faculty-name {
      font-size: 1.25rem;
      font-weight: 700;
      color: #2c3e50;
      margin-bottom: 0.5rem;
    }
    
    .faculty-info {
      color: #6c757d;
      font-size: 0.9rem;
      margin-bottom: 0.25rem;
    }
    
    .faculty-badge {
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
    
    .btn-faculty {
      padding: 0.5rem 1rem;
      border-radius: 0.5rem;
      font-size: 0.875rem;
      transition: all 0.3s ease;
    }
    
    .btn-faculty:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.2);
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
      .faculty-card {
        padding: 1rem;
      }
      
      .faculty-image {
        width: 60px;
        height: 60px;
      }
      
      .faculty-name {
        font-size: 1.1rem;
      }
    }
  </style>
@endsection

@section('page-header')

  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div>
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> 📋🚀 جدول أعضاء هيئة التدريس </h2>
        <p class="mg-b-0"> يعرض جدول أعضاء هيئة التدريس </p>
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
        <label class="tx-13 font-weight-bold">الصفحه الرئيسيه</label>
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
                <i class="bi bi-people-fill"></i>
              </div>
              <div>
                <h1 class="mb-2 fw-bold">أعضاء هيئة التدريس</h1>
                <p class="mb-0 opacity-75">إدارة وعرض أعضاء هيئة التدريس</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="d-flex justify-content-end gap-2">
              <a href="{{ route('facultyMembers.create.page') }}" class="btn btn-light btn-lg">
                <i class="bi bi-plus-circle me-2"></i>إضافة عضو جديد
              </a>
              <button type="button" class="btn btn-outline-light btn-lg" data-bs-toggle="modal" data-bs-target="#createModal">
                <i class="bi bi-plus-square me-2"></i>إضافة سريع
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Faculty Cards Grid -->
    <div class="row mb-4">
      @foreach($facultyMembers as $item)
        <div class="col-lg-4 col-md-6 mb-3">
          <div class="faculty-card">
            <div class="d-flex align-items-start">
              <div class="me-3">
                @if($item->personal_image)
                  <img src="{{ asset('image/images_doctor/' . $item->personal_image) }}" 
                       class="faculty-image" alt="{{ $item->name }}">
                @else
                  <div class="faculty-image d-flex align-items-center justify-content-center" 
                       style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; font-size: 1.5rem;">
                    <i class="bi bi-person-fill"></i>
                  </div>
                @endif
              </div>
              <div class="flex-grow-1">
                <h5 class="faculty-name">{{ $item->name }}</h5>
                <div class="faculty-info">
                  <i class="bi bi-person me-1"></i>{{ $item->username }}
                </div>
                <div class="faculty-info">
                  <i class="bi bi-barcode me-1"></i>كود: {{ $item->faculty_code }}
                </div>
                <div class="faculty-info">
                  <i class="bi bi-envelope me-1"></i>{{ $item->email }}
                </div>
                @if($item->type)
                  <span class="faculty-badge mt-2 d-inline-block">{{ $item->type }}</span>
                @endif
              </div>
            </div>
            <div class="d-flex action-buttons mt-3">
              <a href="{{ route('facultyMembers.show', $item->id) }}" class="btn btn-info btn-faculty">
                <i class="bi bi-eye me-1"></i>عرض
              </a>
              <a href="{{ route('facultyMembers.edit', $item->id) }}" class="btn btn-warning btn-faculty">
                <i class="bi bi-pencil me-1"></i>تعديل
              </a>
              <form action="{{ route('facultyMembers.destroy', $item->id) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger btn-faculty delete_confirm">
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
                  <th><i class="bi bi-person-fill"></i> الاسم</th>
                  <th><i class="bi bi-person"></i> اسم المستخدم</th>
                  <th><i class="bi bi-file-earmark-text"></i> السيرة الذاتية</th>
                  <th><i class="bi bi-file-earmark-pdf"></i> الأبحاث</th>
                  <th><i class="bi bi-briefcase"></i> التعيين</th>
                  <th><i class="bi bi-image"></i> الصورة</th>
                  <th><i class="bi bi-barcode"></i> الكود</th>
                  <th><i class="bi bi-envelope"></i> البريد</th>
                  <th><i class="bi bi-phone"></i> الهاتف</th>
                  <th><i class="bi bi-gear"></i> الإجراءات</th>
                </tr>
              </thead>
              <tbody>
                @foreach($facultyMembers as $item)
                  <tr>
                    <td><span class="badge bg-primary rounded-pill">{{ $loop->iteration }}</span></td>
                    <td class="fw-bold">{{ $item->name }}</td>
                    <td>{{ $item->username }}</td>
                    <td>
                      @if($item->resume)
                        <a href="{{ route('resume.show', $item->id) }}" target="_blank" class="btn btn-outline-danger btn-sm">
                          <i class="bi bi-file-pdf"></i> CV
                        </a>
                      @else
                        <span class="text-muted">--</span>
                      @endif
                    </td>
                    <td>
                      @if($item->researches)
                        <a href="{{ route('researches.show', $item->id) }}" target="_blank" class="btn btn-outline-danger btn-sm">
                          <i class="bi bi-file-pdf"></i> أبحاث
                        </a>
                      @else
                        <span class="text-muted">--</span>
                      @endif
                    </td>
                    <td>
                      @if($item->type)
                        <span class="badge bg-info">{{ $item->type }}</span>
                      @else
                        <span class="text-muted">--</span>
                      @endif
                    </td>
                    <td>
                      @if($item->personal_image)
                        <img src="{{ asset('image/images_doctor/' . $item->personal_image) }}" 
                             width="50" height="50" class="rounded-circle">
                      @else
                        <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center" 
                             style="width: 50px; height: 50px; color: white;">
                          <i class="bi bi-person"></i>
                        </div>
                      @endif
                    </td>
                    <td><span class="badge bg-secondary">{{ $item->faculty_code }}</span></td>
                    <td><a href="mailto:{{ $item->email }}" class="text-decoration-none">{{ $item->email }}</a></td>
                    <td><a href="tel:{{ $item->phone }}" class="text-decoration-none">{{ $item->phone }}</a></td>
                    <td>
                      <div class="btn-group" role="group">
                        <a href="{{ route('facultyMembers.show', $item->id) }}" class="btn btn-info btn-sm">
                          <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('facultyMembers.edit', $item->id) }}" class="btn btn-warning btn-sm">
                          <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('facultyMembers.destroy', $item->id) }}" method="POST" class="d-inline">
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
  @include('pages.facultyMembe.create')
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
          { orderable: false, targets: [3, 4, 6, 10] } // Disable ordering for action columns
        ]
      });
      
      // Add hover effects to faculty cards
      $('.faculty-card').hover(
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
  
  @include('pages.facultyMembe._delete')
@endsection
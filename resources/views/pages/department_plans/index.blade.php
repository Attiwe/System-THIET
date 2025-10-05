@extends('layouts.master')
@section('title', 'خطط الأقسام')
@section('css')
  <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
  <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <style>
    .file-display {
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .file-icon {
      font-size: 1.2em;
    }
    .file-info {
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
  </style>
@endsection
@section('page-header')
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div class="breadcrumb-title">
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">خطط الأقسام</h2>
        <p class="mg-b-0">جدول خطط الأقسام والملفات المرتبطة بها</p>
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
        <div>
          <label class="tx-13 font-weight-bold">الصفحه الرئيسيه</label>
          <h5><a class="text-danger" href="{{ route('dashboard') }}"><i class="bi bi-house-fill"></i> الرئيسيه</a></h5>
        </div>
      </div>
    </div>
  </div>
  <br>
  @include('include.success')
  @include('pages.department_plans._create')
  <div class="accordion" id="facultyAccordion">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <i class="bi bi-plus-circle-fill text-success"></i> إضافة خطة قسم جديد
          </button>
        </h2>
      </div>
      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#facultyAccordion">
        <div class="card-body">
          <br>
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop">
            <i class="bi bi-plus-circle"></i> إضافة خطة قسم
          </button>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-xl-12">
      <div class="card mg-b-20">
        <div class="card-header pb-0">
          <div class="d-flex justify-content-between">
            <h4 class="card-title mg-b-0">جدول خطط الأقسام</h4>
            <i class="mdi mdi-dots-horizontal text-gray"></i>
          </div>
          <p class="tx-12 tx-gray-500 mb-2">جميع خطط الأقسام والملفات المرتبطة بها</p>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table   class="table key-buttons text-md-nowrap">
              <thead>
                <tr>
                  <th class="border-bottom-0">#</th>
                  <th class="border-bottom-0">اسم القسم</th>
                  <th class="border-bottom-0">خطة البحث</th>
                  <th class="border-bottom-0">اللائحة الداخلية</th>
                  <th class="border-bottom-0">كتاب القسم</th>
                  <th class="border-bottom-0">المجلس</th>
                  <th class="border-bottom-0">المقررات الدراسية</th>
                  <th class="border-bottom-0">الإجراءات</th>
                </tr>
              </thead>
              <tbody>
                @foreach($departmentPlans as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->department->name }}</td>
                    
                    <!-- خطة البحث -->
                    <td>
                      @if($item->research_plan)
                        <div class="d-flex align-items-center">
                          <i class="bi bi-file-earmark-pdf-fill text-danger me-2"></i>
                          <a href="{{ $item->research_plan_url }}" target="_blank" class="btn btn-outline-primary btn-sm" title="تحميل {{ $item->research_plan_name }}">
                            <i class="bi bi-download"></i> تحميل
                          </a>
                        </div>
                        <small class="text-muted d-block">خطة البحث</small>
                      @else
                        <span class="text-muted">
                          <i class="bi bi-file-earmark-x"></i> لا يوجد ملف
                        </span>
                      @endif
                    </td>
                    
                    <!-- اللائحة الداخلية -->
                    <td>
                      @if($item->law)
                        <div class="d-flex align-items-center">
                          <i class="bi bi-file-earmark-pdf-fill text-success me-2"></i>
                          <a href="{{ $item->law_url }}" target="_blank" class="btn btn-outline-success btn-sm" title="تحميل {{ $item->law_name }}">
                            <i class="bi bi-download"></i> تحميل
                          </a>
                        </div>
                        <small class="text-muted d-block">اللائحة الداخلية</small>
                      @else
                        <span class="text-muted">
                          <i class="bi bi-file-earmark-x"></i> لا يوجد ملف
                        </span>
                      @endif
                    </td>
                    
                    <!-- كتاب القسم -->
                    <td>
                      @if($item->department_book)
                        <div class="d-flex align-items-center">
                          <i class="bi bi-file-earmark-pdf-fill text-info me-2"></i>
                          <a href="{{ $item->department_book_url }}" target="_blank" class="btn btn-outline-info btn-sm" title="تحميل {{ $item->department_book_name }}">
                            <i class="bi bi-download"></i> تحميل
                          </a>
                        </div>
                        <small class="text-muted d-block">كتاب القسم</small>
                      @else
                        <span class="text-muted">
                          <i class="bi bi-file-earmark-x"></i> لا يوجد ملف
                        </span>
                      @endif
                    </td>
                    
                    <!-- المجلس -->
                    <td>
                      @if($item->council)
                        <div class="d-flex align-items-center">
                          <i class="bi bi-file-earmark-pdf-fill text-warning me-2"></i>
                          <a href="{{ $item->council_url }}" target="_blank" class="btn btn-outline-warning btn-sm" title="تحميل {{ $item->council_name }}">
                            <i class="bi bi-download"></i> تحميل
                          </a>
                        </div>
                        <small class="text-muted d-block">المجلس</small>
                      @else
                        <span class="text-muted">
                          <i class="bi bi-file-earmark-x"></i> لا يوجد ملف
                        </span>
                      @endif
                    </td>
                    
                    <!-- المقررات الدراسية -->
                    <td>
                      @if($item->courses)
                        <div class="d-flex align-items-center">
                          <i class="bi bi-file-earmark-pdf-fill text-danger me-2"></i>
                          <a href="{{ $item->courses_url }}" target="_blank" class="btn btn-outline-danger btn-sm">
                            <i class="bi bi-download"></i> تحميل
                          </a>
                        </div>
                        <small class="text-muted d-block">المقررات الدراسية</small>
                      @else
                        <span class="text-muted">
                          <i class="bi bi-file-earmark-x"></i> لا يوجد ملف
                        </span>
                      @endif
                    </td>
                    
                    <!-- الإجراءات -->
                    <td>
                      <div class="dropdown">
                        <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton{{ $item->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="bi bi-three-dots-vertical"></i> الإجراءات
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $item->id }}">
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editModal{{ $item->id }}">
                            <i class="bi bi-pencil-square text-primary"></i> تعديل
                          </a>
                          <div class="dropdown-divider"></div>
                          <form action="{{ route('department_plans.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item delete_confirm" style="border: none; background: none; width: 100%; text-align: right;">
                              <i class="bi bi-trash text-danger"></i> حذف
                            </button>
                          </form>
                        </div>
                      </div>
                    </td>
                  </tr>
                  
                  
                  <!-- Edit Modal -->
                  @include('pages.department_plans._edit', ['item' => $item])
                @endforeach
              </tbody>
            </table>
            
            <!-- Debug info -->
            <!-- <div class="alert alert-info">
                <strong>معلومات التصفح:</strong><br>
                إجمالي السجلات: {{ $departmentPlans->total() }}<br>
                الصفحة الحالية: {{ $departmentPlans->currentPage() }} من {{ $departmentPlans->lastPage() }}<br>
                السجلات في هذه الصفحة: {{ $departmentPlans->count() }}
            </div> -->
            
            {!! $departmentPlans->links() !!}
          </div> 
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @include('pages.department_plans._delete')
@endsection

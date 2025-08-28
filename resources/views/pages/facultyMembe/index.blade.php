@extends('layouts.master')
@section('title', 'أعضاء هيئة التدريس')

@section('css')
  <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
  <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endsection

@section('page-header')

  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div>
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Hi, welcome back!</h2>
        <p class="mg-b-0">Sales monitoring dashboard template.</p>
      </div>
    </div>
    <div class="main-dashboard-header-right">
      <div>
        <label class="tx-13 font-weight-bold">Customer Ratings</label>
        <div class="main-star">
          <i class="typcn typcn-star active"></i>
          <i class="typcn typcn-star active"></i>
          <i class="typcn typcn-star active"></i>
          <i class="typcn typcn-star active"></i>
          <i class="typcn typcn-star"></i>
          <span>(14,873)</span>
        </div>
      </div>
      <div>
        <label class="tx-13 font-weight-bold">Online Sales</label>
        <h5>563,275</h5>
      </div>
      <div>
        <label class="tx-13 font-weight-bold">Offline Sales</label>
        <h5>783,675</h5>
      </div>
    </div>
  </div>
  <br>
  @include('include.success')

  @include('pages.facultyMembe.create')

  <div class="accordion" id="facultyAccordion">
    <div class="card">
      <div class="card-header bg-primary text-white" id="headingOne">
        <h2 class="mb-0">
          <button class="btn btn-link text-white font-weight-bold" type="button" data-toggle="collapse"
            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <strong class="h3"> 📋🚀 جدول أعضاء هيئة التدريس </strong>
          </button>
        </h2>
      </div>

      <div id="collapseOne" class="collapse false " aria-labelledby="headingOne" data-parent="#facultyAccordion">
        <div class="table-responsive mt-3">
          <table id="example1" class="table table-bordered table-striped text-center align-middle" dir="rtl">
            <thead>
              <tr>
                <th>#</th>
                <th class="text-primary font-weight-bold "> <i class="bi bi-person-fill"></i> اسم العضو هيئة التدريس </th>
                <th class="text-primary font-weight-bold "> <i class="bi bi-person-fill"></i> اسم المستخدم </th>
                <th class="text-primary font-weight-bold"> <i class="bi bi-file-earmark-text-fill"></i> السيرة الذاتية
                </th>
                <th class="text-primary font-weight-bold"> <i class="bi bi-file-earmark-text-fill"></i> الاابحاث</th>
                <th class="text-primary font-weight-bold"> <i class="bi bi-linkedin"></i>لينكدإن</th>
                <th class="text-primary font-weight-bold"> <i class="bi bi-person-bounding-box"></i>الصورة الشخصية</th>
                <th class="text-primary font-weight-bold"> <i class="bi bi-barcode"></i>كود العضو</th>
                <th class="text-primary font-weight-bold"> <i class="bi bi-envelope"></i>البريد الإلكتروني</th>
                <th class="text-primary font-weight-bold"> <i class="bi bi-phone"></i>الهاتف</th>
                <th class="text-primary font-weight-bold"> <i class="bi bi-gear"></i>الاعدادت</th>
              </tr>
            </thead>
            <tbody>
              @foreach($facultyMembers as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->username }}</td>
                  <td>
                    @if($item->resume)
                      <a href="{{ route('resume.show', $item->id) }}" target="_blank" class="btn btn-outline-danger btn-sm">
                        <i class="bi bi-file-pdf"></i> عرض CV
                      </a>
                    @else
                      <span class="text-muted">لا يوجد ملف</span>
                    @endif
                  </td>
                  <td>
                    @if($item->researches)
                      <a href="{{ route('researches.show', $item->id) }}" target="_blank"
                        class="btn btn-outline-danger btn-sm">
                        <i class="fas fa-file-pdf"></i> عرض الاابحاث
                      </a>
                    @else
                      <span class="text-muted">لا يوجد ملف</span>
                    @endif
                  </td>

                  <td>{{ $item->linkedin ?? '--' }}</td>
                  <td>
                    @if($item->personal_image)
                      <img src="{{ asset('image/images_doctor/' . $item->personal_image) }}" width="100" class="img-thumbnail">
                    @else
                      <span class="text-muted">لا يوجد صورة</span>
                    @endif
                  </td>
                  <td class=" text-secondary">{{ $item->faculty_code }}</td>
                  <td><a href="mailto:{{ $item->email }}">{{ $item->email }}</a></td>
                  <td class=" text-danger">{{ $item->phone }}</td>
                  <td>
                    <!-- dropdown     -->
                    <div class="dropdown">
                      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-gear"></i> الاعدادت
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href=" {{ route('facultyMembers.edit', $item->id) }}">تعديل</a>
                        <form action="{{ route('facultyMembers.destroy', $item->id) }}" method="POST" class="d-inline">
                          @csrf
                          @method('delete')
                          <a type="submit" class="dropdown-item delete_confirm   ">
                            حذف
                          </a>
                        </form>
                      </div>
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
@endsection

@section('js')
  <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.min.js')}}"></script>
  <script>
    $(document).ready(function () {
      $('#example1').DataTable({
        responsive: true,
      });
    });
  </script>
  <!-- sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @include('pages.facultyMembe._delete')
@endsection
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

  @include('pages.detailsNews.create')

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
            <thead class=" ">
              <tr class="text-white bg-dark">
                <th style="font-size: 18px;">#</th>
                <th style="font-size: 18px;">الاسم الخبر </th>
                <th style="font-size: 18px;">العنوان</th>
                <th style="font-size: 18px;"> الناشر </th>
                <th style="font-size: 18px;"> التفاصيل </th>
                <th style="font-size: 18px;"> الصورة </th>
                <th style="font-size: 18px;">الإجراءات</th>
              </tr>
            </thead>
            <tbody>
              @foreach($detailsNews as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->title }}</td>
                  <td>{{ $item->description }}</td>
                  <td>{{ $item->publisher }}</td>
                  <td>{{ $item->newElement->name }}</td>
                  <td>
                    @if($item->image)
                      <figcaption class="figure-caption text-center">
                         <a href="{{ asset('image/details_news/' . $item->image) }}" target="_blank">
                          <i class="bi bi-eye-fill"></i> عرض الصوره
                        </a>
                      </figcaption>
                    @else
                      <span class="text-muted">لا يوجد صورة</span>
                    @endif
                  </td>
                  <td>
                    <div class="dropdown">
                      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-gear"></i> الاعدادت
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href=" {{ route('detailsNews.edit', $item->id) }}">تعديل</a>
                        <form action="{{ route('detailsNews.destroy', $item->id) }}" method="POST" class="d-inline">
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
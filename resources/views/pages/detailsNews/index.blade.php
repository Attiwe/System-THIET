@extends('layouts.master')
@section('title')
  عرض الاخبار
@endsection

@section('css')
  <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
  <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
  <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
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
        <label class="tx-13">Customer Ratings</label>
        <div class="main-star">
          <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i
            class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star"></i>
          <span>(14,873)</span>
        </div>
      </div>
      <div>
        <label class="tx-13">Online Sales</label>
        <h5>563,275</h5>
      </div>
      <div>
        <label class="tx-13">Offline Sales</label>
        <h5>783,675</h5>
      </div>
    </div>
  </div>
  <!-- success -->
  @include('include.success')
  <!-- contant -->
  <div class="row row-sm">
    <div class="col-xl-12">
      <div class="card mg-b-20">
        <div class="card-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped text-center align-middle" dir="rtl">
              <thead class="thead-dark">
                <tr class="text-white bg-dark">
                  <th style="font-size: 18px;">#</th>
                  <th style="font-size: 18px;">العنوان</th>
                  <th style="font-size: 18px;">الصورة الرئيسية</th>
                  <th style="font-size: 18px;">الوصف</th>
                  <th style="font-size: 18px;">الإجراءات</th>
                </tr>
              </thead>
              <tbody style="font-size: 16px; font-weight: 500;">
                @foreach ($detailsNews as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td class="text-center">{{ $item->title }}</td>

                    <td>
                      @if($item->image)
                        <img src="{{ asset('image/detail-news/' . $item->image) }}" class="img-thumbnail" width="80">
                      @endif
                    </td>

                    <td class="text-center" style="white-space: normal; word-wrap: break-word; max-width: 250px; text-align:right;">
                      {{ \Illuminate\Support\Str::limit($item->description, 200, ' ...') ?? '--' }}
                    </td>
                    <td>
                      <a href="{{ route('detailsNews.edit', $item->id) }}" class="btn btn-sm btn-primary  px-4 py-2">
                        تعديل
                      </a>

                      <form action="{{ route('detailsNews.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger delete_confirm px-4 py-2">
                          حذف
                        </button>
                      </form>
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


@endsection
@section('js')
  <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
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
  <!--Internal  Datatable js -->
  <script src="{{URL::asset('assets/js/table-data.js')}}"></script>

  <!-- sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @include('pages.detailsNews._delete')
@endsection
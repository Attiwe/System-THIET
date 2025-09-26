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
                  <th class="text-primary" style="font-size: 18px;">#</th>
                  <th class="text-primary" style="font-size: 18px;"> اسم المدير</th>
                  <th class="text-primary" style="font-size: 18px;">الوظيفه</th>
                  <th class="text-primary" style="font-size: 18px;">الصورة</th>
                  <th class="text-primary" style="font-size: 18px;">الوصف</th>
                  <th class="text-primary" style="font-size: 18px;">الإجراءات</th>
                </tr>
              </thead>
              <tbody style="font-size: 16px; font-weight: 500;">
                @foreach ($news as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td class="text-center">{{ $item->management->name }}</td>
                    <td class="text-center">{{ $item->title }}</td>

                    <td>
                      <img src="{{ asset('image/detail-news/' . $item->management->image) }}" class="img-thumbnail"
                        width="80">
                    </td>

                    <td style="white-space: normal; word-wrap: break-word; max-width: 250px; text-align:right;">
                      {{ \Illuminate\Support\Str::limit($item->management->description, 200, ' ...') }}
                    </td>
                    <td>
                      <a href="{{ route('dean_speech.edit', $item->id) }}"
                        class="btn btn-sm btn-primary font-weight-bold py-2 px-4 ">
                        تعديل
                      </a>
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


@endsection
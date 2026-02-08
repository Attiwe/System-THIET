@extends('layouts.master')
@section('css')
  <!--  Owl-carousel css-->
  <link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
  <!-- Maps css -->
  <link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
    <div>
      <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">
        مرحباً، {{ \App\Helpers\PermissionHelper::getCurrentUserName() ?? 'المستخدم' }}!
      </h2>
      <p class="mg-b-0">
        @if(\App\Helpers\PermissionHelper::isSuperAdmin())
          <strong class="text-success">مدير عام</strong> - جميع الصلاحيات
        @else
          المستخدم: <strong class="text-primary">{{ Auth::user()->email ?? 'غير محدد' }}</strong>
        @endif
      </p>
    </div>
    </div>
    <div class="main-dashboard-header-right">
    <div>
      <label class="tx-13">تقييم المنصة</label>
      <div class="main-star">
      <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i
        class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star"></i>
      <span>(128)</span>
      </div>
    </div>
    <div>
      <label class="tx-13">زيارات اليوم</label>
      <h5>2,845</h5>
    </div>
    <div>
      <label class="tx-13">تقارير هذا الشهر</label>
      <h5>36</h5>
    </div>
    </div>
  </div>
  <!-- /breadcrumb -->
@endsection
@section('content')
  <!-- row -->
  <div class="row row-sm">
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
    <div class="card overflow-hidden sales-card bg-primary-gradient">
      <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
      <div class="">
        <h6 class="mb-3 tx-12 text-white">طلبات تسجيل اليوم</h6>
      </div>
      <div class="pb-0 mt-0">
        <div class="d-flex">
        <div class="">
          <h4 class="tx-20 font-weight-bold mb-1 text-white">+48</h4>
          <p class="mb-0 tx-12 text-white op-7">مقارنة بالأسبوع الماضي</p>
        </div>
        <span class="float-right my-auto mr-auto">
          <i class="fas fa-arrow-circle-up text-white"></i>
          <span class="text-white op-7"> +12%</span>
        </span>
        </div>
      </div>
      </div>
      <span id="compositeline" class="pt-1">4,6,5,8,6,10,12,9,7,11,8,6,9,7,10,8,12,9,11,10</span>
    </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
    <div class="card overflow-hidden sales-card bg-danger-gradient">
      <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
      <div class="">
        <h6 class="mb-3 tx-12 text-white">ملفات مرفوعة اليوم</h6>
      </div>
      <div class="pb-0 mt-0">
        <div class="d-flex">
        <div class="">
          <h4 class="tx-20 font-weight-bold mb-1 text-white">132</h4>
          <p class="mb-0 tx-12 text-white op-7">مقارنة بالأسبوع الماضي</p>
        </div>
        <span class="float-right my-auto mr-auto">
          <i class="fas fa-arrow-circle-down text-white"></i>
          <span class="text-white op-7"> -5.6%</span>
        </span>
        </div>
      </div>
      </div>
      <span id="compositeline2" class="pt-1">6,7,5,9,12,10,8,9,11,13,10,8,7,6,8,9,10,8,9,7</span>
    </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
    <div class="card overflow-hidden sales-card bg-success-gradient">
      <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
      <div class="">
        <h6 class="mb-3 tx-12 text-white">إجمالي المشاريع</h6>
      </div>
      <div class="pb-0 mt-0">
        <div class="d-flex">
        <div class="">
          <h4 class="tx-20 font-weight-bold mb-1 text-white">214</h4>
          <p class="mb-0 tx-12 text-white op-7">منذ بداية العام</p>
        </div>
        <span class="float-right my-auto mr-auto">
          <i class="fas fa-arrow-circle-up text-white"></i>
          <span class="text-white op-7"> +18%</span>
        </span>
        </div>
      </div>
      </div>
      <span id="compositeline3" class="pt-1">8,9,10,12,14,13,12,15,17,16,14,13,15,14,16,18,17,16,15,14</span>
    </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
    <div class="card overflow-hidden sales-card bg-warning-gradient">
      <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
      <div class="">
        <h6 class="mb-3 tx-12 text-white">مشاريع مكتملة</h6>
      </div>
      <div class="pb-0 mt-0">
        <div class="d-flex">
        <div class="">
          <h4 class="tx-20 font-weight-bold mb-1 text-white">163</h4>
          <p class="mb-0 tx-12 text-white op-7">معدل الإنجاز</p>
        </div>
        <span class="float-right my-auto mr-auto">
          <i class="fas fa-arrow-circle-down text-white"></i>
          <span class="text-white op-7"> 76%</span>
        </span>
        </div>
      </div>
      </div>
      <span id="compositeline4" class="pt-1">7,8,7,9,10,12,13,12,11,13,12,10,11,12,13,12,14,13,12,11</span>
    </div>
    </div>
  </div>
  <!-- row closed -->

 

  <!-- row opened -->
  <div class="row row-sm">
    <div class="col-md-12 col-lg-12 col-xl-7">
    <div class="card">
      <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
      <div class="d-flex justify-content-between">
        <h4 class="card-title mb-0">حالة المشاريع</h4>
        <i class="mdi mdi-dots-horizontal text-gray"></i>
      </div>
      <p class="tx-12 text-muted mb-0">متابعة تقدم مشاريع التخرج والمهام البحثية من لحظة الإضافة حتى الإغلاق.</p>
      </div>
      <div class="card-body">
      <div class="total-revenue">
        <div>
        <h4>148</h4>
        <label><span class="bg-primary"></span>مكتمل</label>
        </div>
        <div>
        <h4>42</h4>
        <label><span class="bg-danger"></span>قيد المراجعة</label>
        </div>
        <div>
        <h4>24</h4>
        <label><span class="bg-warning"></span>متأخر</label>
        </div>
      </div>
      <div id="bar" class="sales-bar mt-4"></div>
      </div>
    </div>
    </div>
    <div class="col-lg-12 col-xl-5">
    <div class="card card-dashboard-map-one">
      <label class="main-content-label">توزيع المشاريع حسب الكلية</label>
      <span class="d-block mg-b-20 text-muted tx-12">إحصائية تقريبية لتوزيع المشاركات بين الأقسام</span>
      <div class="">
      <div class="vmap-wrapper ht-180" id="vmap2"></div>
      </div>
    </div>
    </div>
  </div>
  <!-- row closed -->

  <!-- row opened -->
  <div class="row row-sm">
    <div class="col-xl-4 col-md-12 col-lg-12">
    <div class="card">
      <div class="card-header pb-1">
      <h3 class="card-title mb-2">أحدث مشاريع الطلاب</h3>
      <p class="tx-12 mb-0 text-muted">آخر المشاريع التي تم رفعها أو تحديثها على المنصة</p>
      </div>
      <div class="card-body p-0 customers mt-1">
      <div class="list-group list-lg-group list-group-flush">
        <div class="list-group-item list-group-item-action" href="#">
        <div class="media mt-0">
          <img class="avatar-lg rounded-circle ml-3 my-auto" src="{{URL::asset('assets/img/faces/3.jpg')}}"
          alt="Image description">
          <div class="media-body">
          <div class="d-flex align-items-center">
            <div class="mt-0">
            <h5 class="mb-1 tx-15">مشروع الذكاء الاصطناعي</h5>
            <p class="mb-0 tx-13 text-muted">كلية الهندسة <span class="text-success ml-2">مكتمل</span></p>
            </div>
            <span class="mr-auto wd-45p fs-16 mt-2">
            <div id="spark1" class="wd-100p"></div>
            </span>
          </div>
          </div>
        </div>
        </div>
        <div class="list-group-item list-group-item-action" href="#">
        <div class="media mt-0">
          <img class="avatar-lg rounded-circle ml-3 my-auto" src="{{URL::asset('assets/img/faces/11.jpg')}}"
          alt="Image description">
          <div class="media-body">
          <div class="d-flex align-items-center">
            <div class="mt-1">
            <h5 class="mb-1 tx-15">منصة التوظيف الذكية</h5>
            <p class="mb-0 tx-13 text-muted">كلية الحاسبات <span class="text-danger ml-2">قيد المراجعة</span></p>
            </div>
            <span class="mr-auto wd-45p fs-16 mt-2">
            <div id="spark2" class="wd-100p"></div>
            </span>
          </div>
          </div>
        </div>
        </div>
        <div class="list-group-item list-group-item-action" href="#">
        <div class="media mt-0">
          <img class="avatar-lg rounded-circle ml-3 my-auto" src="{{URL::asset('assets/img/faces/17.jpg')}}"
          alt="Image description">
          <div class="media-body">
          <div class="d-flex align-items-center">
            <div class="mt-1">
            <h5 class="mb-1 tx-15">نظام إدارة المختبرات</h5>
            <p class="mb-0 tx-13 text-muted">كلية العلوم <span class="text-danger ml-2">قيد المراجعة</span></p>
            </div>
            <span class="mr-auto wd-45p fs-16 mt-2">
            <div id="spark3" class="wd-100p"></div>
            </span>
          </div>
          </div>
        </div>
        </div>
        <div class="list-group-item list-group-item-action" href="#">
        <div class="media mt-0">
          <img class="avatar-lg rounded-circle ml-3 my-auto" src="{{URL::asset('assets/img/faces/15.jpg')}}"
          alt="Image description">
          <div class="media-body">
          <div class="d-flex align-items-center">
            <div class="mt-1">
            <h5 class="mb-1 tx-15">تطبيق الإرشاد الأكاديمي</h5>
            <p class="mb-0 tx-13 text-muted">كلية التربية <span class="text-success ml-2">مكتمل</span></p>
            </div>
            <span class="mr-auto wd-45p fs-16 mt-2">
            <div id="spark4" class="wd-100p"></div>
            </span>
          </div>
          </div>
        </div>

        </div>
        <div class="list-group-item list-group-item-action br-br-7 br-bl-7" href="#">
        <div class="media mt-0">
          <img class="avatar-lg rounded-circle ml-3 my-auto" src="{{URL::asset('assets/img/faces/6.jpg')}}"
          alt="Image description">
          <div class="media-body">
          <div class="d-flex align-items-center">
            <div class="mt-1">
            <h5 class="mb-1 tx-15">بوابة الأنشطة الطلابية</h5>
            <p class="b-0 tx-13 text-muted mb-0">كلية الآداب <span class="text-success ml-2">مكتمل</span></p>
            </div>
            <span class="mr-auto wd-45p fs-16 mt-2">
            <div id="spark5" class="wd-100p"></div>
            </span>
          </div>
          </div>
        </div>
        </div>
      </div>
      </div>
    </div>
    </div>
    <div class="col-xl-4 col-md-12 col-lg-6">
    <div class="card">
      <div class="card-header pb-1">
      <h3 class="card-title mb-2">نشاط المنصة</h3>
      <p class="tx-12 mb-0 text-muted">آخر التحديثات والتنبيهات الخاصة بالمشاريع والملفات</p>
      </div>
      <div class="product-timeline card-body pt-2 mt-1">
      <ul class="timeline-1 mb-0">
        <li class="mt-0"> <i class="ti-pie-chart bg-primary-gradient text-white product-icon"></i> <span
          class="font-weight-semibold mb-4 tx-14 ">مشاريع مضافة</span> <a href="#"
          class="float-left tx-11 text-muted">قبل 3 أيام</a>
        <p class="mb-0 text-muted tx-12">12 مشروع جديد</p>
        </li>
        <li class="mt-0"> <i class="mdi mdi-cart-outline bg-danger-gradient text-white product-icon"></i> <span
          class="font-weight-semibold mb-4 tx-14 ">ملفات مرفوعة</span> <a href="#"
          class="float-left tx-11 text-muted">قبل 35 دقيقة</a>
        <p class="mb-0 text-muted tx-12">28 ملف مرفوع</p>
        </li>
        <li class="mt-0"> <i class="ti-bar-chart-alt bg-success-gradient text-white product-icon"></i> <span
          class="font-weight-semibold mb-4 tx-14 ">تقارير مكتملة</span> <a href="#"
          class="float-left tx-11 text-muted">قبل 50 دقيقة</a>
        <p class="mb-0 text-muted tx-12">6 تقارير مكتملة</p>
        </li>
        <li class="mt-0"> <i class="ti-wallet bg-warning-gradient text-white product-icon"></i> <span
          class="font-weight-semibold mb-4 tx-14 ">ملاحظات المشرفين</span> <a href="#"
          class="float-left tx-11 text-muted">قبل ساعة</a>
        <p class="mb-0 text-muted tx-12">14 ملاحظة جديدة</p>
        </li>
        <li class="mt-0"> <i class="si si-eye bg-purple-gradient text-white product-icon"></i> <span
          class="font-weight-semibold mb-4 tx-14 ">زيارات الصفحة</span> <a href="#"
          class="float-left tx-11 text-muted">قبل يوم</a>
        <p class="mb-0 text-muted tx-12">زيادة 9%</p>
        </li>
        <li class="mt-0 mb-0"> <i class="icon-note icons bg-primary-gradient text-white product-icon"></i> <span
          class="font-weight-semibold mb-4 tx-14 ">تقييمات المستخدمين</span> <a href="#"
          class="float-left tx-11 text-muted">قبل يوم</a>
        <p class="mb-0 text-muted tx-12">23 تقييم جديد</p>
        </li>
      </ul>
      </div>
    </div>
    </div>
    <div class="col-xl-4 col-md-12 col-lg-6">
    <div class="card">
      <div class="card-header pb-0">
      <h3 class="card-title mb-2">إنجازات الفترة الأخيرة</h3>
      <p class="tx-12 mb-0 text-muted">ملخص سريع لنشاط الطلبات والمراجعات خلال 6 أشهر</p>
      </div>
      <div class="card-body sales-info ot-0 pt-0 pb-0">
      <div id="chart" class="ht-150"></div>
      <div class="row sales-infomation pb-0 mb-0 mx-auto wd-100p">
        <div class="col-md-6 col">
        <p class="mb-0 d-flex"><span class="legend bg-primary brround"></span>مكتمل</p>
        <h3 class="mb-1">386</h3>
        <div class="d-flex">
          <p class="text-muted ">آخر 6 أشهر</p>
        </div>
        </div>
        <div class="col-md-6 col">
        <p class="mb-0 d-flex"><span class="legend bg-info brround"></span>مؤجل</p>
        <h3 class="mb-1">74</h3>
        <div class="d-flex">
          <p class="text-muted">آخر 6 أشهر</p>
        </div>
        </div>
      </div>
      </div>
    </div>
    <div class="card ">
      <div class="card-body">
      <div class="row">
        <div class="col-md-6">
        <div class="d-flex align-items-center pb-2">
          <p class="mb-0">معدل الالتزام</p>
        </div>
        <h4 class="font-weight-bold mb-2">82%</h4>
        <div class="progress progress-style progress-sm">
          <div class="progress-bar bg-primary-gradient wd-80p" role="progressbar" aria-valuenow="78"
          aria-valuemin="0" aria-valuemax="78"></div>
        </div>
        </div>
        <div class="col-md-6 mt-4 mt-md-0">
        <div class="d-flex align-items-center pb-2">
          <p class="mb-0">مستخدمون نشطون</p>
        </div>
        <h4 class="font-weight-bold mb-2">1,240</h4>
        <div class="progress progress-style progress-sm">
          <div class="progress-bar bg-danger-gradient wd-75" role="progressbar" aria-valuenow="45" aria-valuemin="0"
          aria-valuemax="45"></div>
        </div>
        </div>
      </div>
      </div>
    </div>
    </div>
  </div>
  <!-- row close -->

  <!-- row opened -->
  <div class="row row-sm row-deck">
    <div class="col-md-12 col-lg-4 col-xl-4">
    <div class="card card-dashboard-eight pb-2">
      <h6 class="card-title">أفضل الأقسام نشاطاً</h6><span class="d-block mg-b-10 text-muted tx-12">نِسَب تقريبية حسب القسم</span>
      <div class="list-group">
      <div class="list-group-item border-top-0">
        <i class="flag-icon flag-icon-us flag-icon-squared"></i>
        <p>قسم الحاسبات</p><span>26%</span>
      </div>
      <div class="list-group-item">
        <i class="flag-icon flag-icon-nl flag-icon-squared"></i>
        <p>قسم الهندسة</p><span>22%</span>
      </div>
      <div class="list-group-item">
        <i class="flag-icon flag-icon-gb flag-icon-squared"></i>
        <p>قسم العلوم</p><span>18%</span>
      </div>
      <div class="list-group-item">
        <i class="flag-icon flag-icon-ca flag-icon-squared"></i>
        <p>قسم التربية</p><span>14%</span>
      </div>
      <div class="list-group-item">
        <i class="flag-icon flag-icon-in flag-icon-squared"></i>
        <p>قسم الآداب</p><span>12%</span>
      </div>
      <div class="list-group-item border-bottom-0 mb-0">
        <i class="flag-icon flag-icon-au flag-icon-squared"></i>
        <p>قسم الإدارة</p><span>8%</span>
      </div>
      </div>
    </div>
    </div>
    <div class="col-md-12 col-lg-8 col-xl-8">
    <div class="card card-table-two">
      <div class="d-flex justify-content-between">
      <h4 class="card-title mb-1">أحدث التحديثات اليومية</h4>
      <i class="mdi mdi-dots-horizontal text-gray"></i>
      </div>
      <span class="tx-12 tx-muted mb-3 ">ملخص سريع لعمليات اليوم حسب التاريخ.</span>
      <div class="table-responsive country-table">
      <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
        <thead>
        <tr>
          <th class="wd-lg-25p">التاريخ</th>
          <th class="wd-lg-25p tx-right">المشاريع الجديدة</th>
          <th class="wd-lg-25p tx-right">التقارير المكتملة</th>
          <th class="wd-lg-25p tx-right">ملاحظات المشرفين</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>05 Feb 2026</td>
          <td class="tx-right tx-medium tx-inverse">6</td>
          <td class="tx-right tx-medium tx-inverse">4</td>
          <td class="tx-right tx-medium tx-danger">12</td>
        </tr>
        <tr>
          <td>06 Feb 2026</td>
          <td class="tx-right tx-medium tx-inverse">8</td>
          <td class="tx-right tx-medium tx-inverse">5</td>
          <td class="tx-right tx-medium tx-danger">9</td>
        </tr>
        <tr>
          <td>07 Feb 2026</td>
          <td class="tx-right tx-medium tx-inverse">4</td>
          <td class="tx-right tx-medium tx-inverse">6</td>
          <td class="tx-right tx-medium tx-danger">7</td>
        </tr>
        <tr>
          <td>08 Feb 2026</td>
          <td class="tx-right tx-medium tx-inverse">7</td>
          <td class="tx-right tx-medium tx-inverse">3</td>
          <td class="tx-right tx-medium tx-danger">11</td>
        </tr>
        <tr>
          <td>09 Feb 2026</td>
          <td class="tx-right tx-medium tx-inverse">5</td>
          <td class="tx-right tx-medium tx-inverse">2</td>
          <td class="tx-right tx-medium tx-danger">6</td>
        </tr>
        </tbody>
      </table>
      </div>
    </div>
    </div>
  </div>
  <!-- /row -->
  </div>
  </div>
  <!-- Container closed -->
@endsection
@section('js')
  <!--Internal  Chart.bundle js -->
  <script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
  <!-- Moment js -->
  <script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
  <!--Internal  Flot js-->
  <script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
  <script src="{{URL::asset('assets/js/dashboard.sampledata.js')}}"></script>
  <script src="{{URL::asset('assets/js/chart.flot.sampledata.js')}}"></script>
  <!--Internal Apexchart js-->
  <script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>
  <!-- Internal Map -->
  <script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
  <script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
  <!--Internal  index js -->
  <script src="{{URL::asset('assets/js/index.js')}}"></script>
  <script src="{{URL::asset('assets/js/jquery.vmap.sampledata.js')}}"></script>
@endsection@endsection

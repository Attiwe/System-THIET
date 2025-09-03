@extends('layouts.master')

@section('title', 'تعديل عضو هيئة تدريس')

@section('css')
  <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
  <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
  <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('vendor/file-input/css/fileinput.min.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css"
    crossorigin="anonymous">
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


  @include('include.error')
  @include('include.validation')

  <div class="row">
    <div class="col-xl-12">

      <div class="card shadow-sm">
        <div class="card-header d-flex  justify-content-between align-items-center ">
          <h2 class="main-content-title tx-24 font-weight-bold text-dark  "> 📰 تعديل عضو هيئة تدريس</h2>
          <a href="{{ route('facultyMembers.index') }}" class="btn btn-primary">
            <i class="bi bi-arrow-left"></i> رجوع
          </a>
        </div>

        <div class="card-body bg-white">
          <form action="{{ route('facultyMembers.update', $facultyMember->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
              <div class="form-group col-md-4">
                <label class="font-weight-bold lead text-primary"><i class="bi bi-person-fill"></i> الاسم</label>
                <input type="text" class="form-control" name="name" value="{{ $facultyMember->name }}">
              </div>

              <div class="form-group col-md-4">
                <label class="font-weight-bold lead text-primary"><i class="bi bi-person-badge"></i> النوع</label>
                <select name="type" class="form-control">
                  <option value="">اختر النوع</option>
                  <option value="دكتور" {{ $facultyMember->type == 'دكتور' ? 'selected' : '' }}>دكتور</option>
                  <option value="معيد" {{ $facultyMember->type == 'معيد' ? 'selected' : '' }}>معيد</option>
                </select>
              </div>

              <div class="form-group col-md-4">
                <label class="font-weight-bold lead text-primary"><i class="bi bi-calendar"></i> تاريخ التعيين</label>
                <input type="date" class="form-control" name="appointment_date"
                  value="{{ $facultyMember->appointment_date }}">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-4">
                <label class="font-weight-bold lead text-primary"><i class="bi bi-building"></i> القسم</label>
                <select name="department_id" class="form-control">
                  <option value="">اختر القسم</option>
                  @foreach ($departments as $department)
                    <option value="{{ $department->id }}" {{ $facultyMember->department_id == $department->id ? 'selected' : '' }}>
                      {{ $department->name }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="form-group col-md-4">
                <label class="font-weight-bold lead text-primary"><i class="bi bi-code-slash"></i> كود العضو</label>
                <input type="number" class="form-control" name="faculty_code" value="{{ $facultyMember->faculty_code }}">
              </div>

              <div class="form-group col-md-4">
                <label class="font-weight-bold lead text-primary"><i class="bi bi-briefcase"></i> نوع التعيين</label>
                <select name="appointment_type" class="form-control">
                  <option value="">اختر نوع التعيين</option>
                  <option value="معين" {{ $facultyMember->appointment_type == 'معين' ? 'selected' : '' }}>معين</option>
                  <option value="منتدب" {{ $facultyMember->appointment_type == 'منتدب' ? 'selected' : '' }}>منتدب جزئي
                  </option>
                  <option value="غير ذلك" {{ $facultyMember->appointment_type == 'غير ذلك' ? 'selected' : '' }}>غير ذلك
                  </option>
                </select>
              </div>
            </div>

            <div class="groud row">
              <div class="form-group col-md-4">
                <label for="username" class="font-weight-bold lead text-primary"> <i class="bi bi-person-circle"></i>
                  اسم المستخدم </label>
                <input type="text" class="form-control" id="username" name="username"
                  value="{{ $facultyMember->username }}" placeholder="أدخل اسم المستخدم">
              </div>

              <div class="form-group col-md-4">
                <label for="email" class="font-weight-bold lead text-primary"> <i class="bi bi-envelope"></i> البريد
                  الإلكتروني </label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $facultyMember->email }}"
                  placeholder="أدخل البريد الإلكتروني">
              </div>

              <div class="form-group col-md-4">
                <label for="password" class="font-weight-bold lead text-primary"> <i class="bi bi-lock"></i> كلمة المرور
                </label>
                <input type="password" class="form-control" id="password" name="password"
                  value="{{ $facultyMember->password }}" placeholder="أدخل كلمة المرور">
              </div>
            </div>

            <div class="groud row">
              <div class="form-group col-md-6">
                <label for="phone" class="font-weight-bold lead text-primary"> <i class="bi bi-phone"></i> رقم الهاتف
                </label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $facultyMember->phone }}"
                  placeholder="أدخل رقم الهاتف">
              </div>

              <div class="form-group col-md-6">
                <label for="facebook" class="font-weight-bold lead text-primary"> <i class="bi bi-facebook"></i> فيسبوك
                </label>
                <input type="text" class="form-control" id="facebook" name="facebook"
                  value="{{ $facultyMember->facebook ?? old('facebook') }}" placeholder="أدخل رابط فيسبوك">
              </div>
            </div>

             <div class="row">
              <div class="form-group col-md-4">
                <label class="font-weight-bold lead text-primary"><i class="bi bi-person-bounding-box"></i> الصورة
                  الشخصية</label>
                <input type="file" id="personal_image" name="personal_image" class="form-control-file" accept="image/*">
              </div>

              <div class="form-group col-md-4">
                <label class="font-weight-bold lead text-primary"><i class="bi bi-file-earmark-pdf"></i> السيرة
                  الذاتية</label>
                <input type="file" id="resume" name="resume" class="form-control-file" value="{{ $facultyMember->resume }}" accept="application/pdf">
                @if($facultyMember->resume)
                  <p class="text-muted">السيرة الذاتية الحالية:
                    <a href="{{ route('resume.show', $facultyMember->id) }}"
                      target="_blank">{{ $facultyMember->resume }}</a>
                  </p>
                @endif
              </div>

              <div class="form-group col-md-4">
                <label class="font-weight-bold lead text-primary"><i class="bi bi-journal-text"></i> قرارات البحث</label>
                <input type="file" id="researches" name="researches" class="form-control-file" value="{{ $facultyMember->researches }}" accept="application/pdf">
                @if($facultyMember->researches)
                  <p class="text-muted">قرارات البحث الحالية:
                    <a href="{{ route('researches.show', $facultyMember->id) }}"
                      target="_blank">{{ $facultyMember->researches }}</a>
                  </p>
                @endif
              </div>
            </div>

            <div class="d-flex justify-content-center mt-3">
              <button type="submit" class="btn btn-outline-primary font-weight-bold">✔ تحديث</button>
              <button type="reset" class="mr-3 btn btn-outline-danger font-weight-bold ml-3">❌ إلغاء</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script src="{{ asset('vendor/file-input/js/fileinput.min.js') }}"></script>
  <script src="{{ asset('vendor/file-input/themes/fa/theme.min.js') }}"></script>

  <script>
    $("#personal_image").fileinput({
      theme: "fa",
      showUpload: false,
      showRemove: true,
      initialPreview: [
        @if($facultyMember->personal_image)
          "{{ asset('image/images_doctor/' . $facultyMember->personal_image) }}"
        @endif
          ],
      initialPreviewAsData: true,
      initialPreviewFileType: 'image',
      overwriteInitial: true,
    });
  </script>
@endsection
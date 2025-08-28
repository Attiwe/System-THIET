<div class="accordion" id="facultyAccordion">
  <div class="card">
    <!--  accordion header -->
    <div class="card-header bg-dark text-white h3" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link text-white text-2xl font-weight-bold" type="button" data-toggle="collapse"
          data-target="#collapseCreate" aria-expanded="true" aria-controls="collapseCreate">
          <i class="bi bi-person-plus-fill"></i> ✨ <strong class=" h3">اضافة عضو هيئه تدريس </strong>
        </button>
      </h2>
    </div>
    <br>
    <!--  accordion content   -->
    <div id="collapseCreate" class="collapse show " aria-labelledby="headingOne" data-parent="#facultyAccordion">
      <div class="card-body bg-white">
        <br>
        <div class="text-danger font-weight-bold">
          @include('include.validation')
        </div>
        <br>
        <form action="{{ route('facultyMembers.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="groud row">
            <div class="form-group col-md-4">
              <label for="name" class="font-weight-bold lead text-primary"> <i class="bi bi-person-fill"></i>     اسم عضو هيئه تدريس
              </label>
              <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                placeholder="أدخل اسم العضو">
            </div>

            <div class="form-group col-md-4">
              <label for="type" class="font-weight-bold lead text-primary"> <i class="bi bi-person-badge"></i> النوع
              </label>
              <select name="type" id="type" class="form-control">
                <option value="" selected>اختر النوع</option>
                <option value="دكتور">دكتور</option>
                <option value="معيد">معيد</option>
              </select>
            </div>

            <div class="form-group col-md-4">
              <label for="appointment_date" class="font-weight-bold lead text-primary"> <i class="bi bi-calendar"></i>
                تاريخ التعيين </label>
              <input type="date" class="form-control" id="appointment_date" name="appointment_date"
                value="{{ old('appointment_date') }}">
            </div>
          </div>

          <div class="groud row">
            <div class="form-group col-md-4">
              <label for="department_id" class="font-weight-bold lead text-primary"> <i class="bi bi-building"></i>
                القسم </label>
              <select name="department_id" id="department_id" class="form-control">
                <option value="" selected>اختر القسم</option>
                @foreach ($departments as $department)
                  <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group col-md-4">
              <label for="faculty_code" class="font-weight-bold lead text-primary"> <i class="bi bi-code-slash"></i>
                كود العضو </label>
              <input type="number" class="form-control" id="faculty_code" name="faculty_code"
                value="{{  $facultyCode }}">
            </div>

            <div class="form-group col-md-4">
              <label for="appointment_type" class="font-weight-bold lead text-primary"> <i class="bi bi-briefcase"></i>
                نوع التعيين </label>
              <select name="appointment_type" id="appointment_type" class="form-control">
                <option value="" selected>اختر نوع التعيين</option>
                <option value="معين">معين</option>
                <option value="منتدب"> منتدب جزئي</option>
                <option value="غير ذلك">غير ذلك</option>
              </select>
            </div>
          </div>

          <div class="groud row">
            <div class="form-group col-md-4">
              <label for="username" class="font-weight-bold lead text-primary"> <i class="bi bi-person-circle"></i>
                اسم المستخدم </label>
              <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" placeholder="أدخل اسم المستخدم">
            </div>

            <div class="form-group col-md-4">
              <label for="email" class="font-weight-bold lead text-primary"> <i class="bi bi-envelope"></i> البريد
                الإلكتروني </label>
              <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="أدخل البريد الإلكتروني">
            </div>

            <div class="form-group col-md-4">
              <label for="password" class="font-weight-bold lead text-primary"> <i class="bi bi-lock"></i> كلمة المرور
              </label>
              <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="أدخل كلمة المرور">
            </div>
          </div>

          <div class="groud row">
            <div class="form-group col-md-6">
              <label for="phone" class="font-weight-bold lead text-primary"> <i class="bi bi-phone"></i> رقم الهاتف
              </label>
              <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}"
                placeholder="أدخل رقم الهاتف">
            </div>

            <div class="form-group col-md-6">
              <label for="facebook" class="font-weight-bold lead text-primary"> <i class="bi bi-facebook"></i> فيسبوك
              </label>
              <input type="text" class="form-control" id="facebook" name="facebook" value="{{ old('facebook') }}"
                placeholder="أدخل رابط فيسبوك">
            </div>
          </div>

          <div class="groud row">
            <div class="form-group col-md-4">
              <label for="personal_image" class="font-weight-bold lead text-primary"> <i
                  class="bi bi-person-bounding-box"></i> الصورة الشخصية </label>
              <input type="file" class="form-control-file" id="image_new1" name="personal_image" accept="image/*">
            </div>

            <div class="form-group col-md-4">
              <label for="resume" class="font-weight-bold lead text-primary"> <i class="bi bi-file-earmark-pdf"></i>
                السيرة الذاتية </label>
              <input type="file" class="form-control-file" id="resume" name="resume" accept="application/pdf">
            </div>

            <div class="form-group col-md-4">
              <label for="researches" class="font-weight-bold lead text-primary"> <i class="bi bi-journal-text"></i>
                قرارات البحث </label>
              <input type="file" class="form-control-file" id="researches" name="researches" accept="application/pdf">
            </div>
          </div>

          <div class="d-flex justify-content-center mt-3">
            <button type="submit" class="btn btn-outline-primary lead font-weight-bold ">✔ اضافة عضو</button>
            <button type="reset" class=" mr-3 btn btn-outline-danger lead font-weight-bold">❌ إلغاء البيانات</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
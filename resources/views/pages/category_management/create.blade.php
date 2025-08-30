<div class="accordion" id="facultyAccordion">
  <div class="card">
    <!--  accordion header -->
    <div class="card-header bg-dark text-white h3" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link text-white text-2xl font-weight-bold" type="button" data-toggle="collapse"
          data-target="#collapseCreate" aria-expanded="true" aria-controls="collapseCreate">
          <i class="bi bi-people-fill"></i> ✨ <strong class=" h3">اضافة بيانات الإدارة </strong>
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
        <form action="{{ route('category_management.store') }}" method="POST">
          @csrf
          <div class="groud row">
            <div class="form-group col-md-4">
              <label for="dean" class="font-weight-bold lead text-primary">
                <i class="bi bi-mortarboard-fill"></i> عميد المعهد
              </label>
              <input type="text" class="form-control" id="dean" name="dean" value="{{ old('dean') }}"
                placeholder="أدخل اسم عميد المعهد">
            </div>

            <div class="form-group col-md-4">
              <label for="vice_dean_students" class="font-weight-bold lead text-primary">
                <i class="bi bi-person-badge-fill"></i> وكيل المعهد لشئون الطلاب
              </label>
              <input type="text" class="form-control" id="vice_dean_students" name="vice_dean_students"
                value="{{ old('vice_dean_students') }}" placeholder="أدخل اسم وكيل المعهد لشئون الطلاب">
            </div>

            <div class="form-group col-md-4">
              <label for="secretary" class="font-weight-bold lead text-primary">
                <i class="bi bi-person-lines-fill"></i> أمين المعهد
              </label>
              <input type="text" class="form-control" id="secretary" name="secretary" value="{{ old('secretary') }}"
                placeholder="أدخل اسم أمين المعهد">
            </div>
          </div>

          <div class="groud row">
            <div class="form-group col-md-4">
              <label for="account_manager" class="font-weight-bold lead text-primary">
                <i class="bi bi-cash-coin"></i> مدير الحسابات
              </label>
              <input type="text" class="form-control" id="account_manager" name="account_manager"
                value="{{ old('account_manager') }}" placeholder="أدخل اسم مدير الحسابات">
            </div>

            <div class="form-group col-md-4">
              <label for="student_affairs_manager" class="font-weight-bold lead text-primary">
                <i class="bi bi-journal-check"></i> مدير شؤون الطلاب
              </label>
              <input type="text" class="form-control" id="student_affairs_manager" name="student_affairs_manager"
                value="{{ old('student_affairs_manager') }}" placeholder="أدخل اسم مدير شؤون الطلاب">
            </div>

            <div class="form-group col-md-4">
              <label for="hr_manager" class="font-weight-bold lead text-primary">
                <i class="bi bi-people-fill"></i> مدير الموارد البشرية
              </label>
              <input type="text" class="form-control" id="hr_manager" name="hr_manager" value="{{ old('hr_manager') }}"
                placeholder="أدخل اسم مدير الموارد البشرية">
            </div>
          </div>

          <div class="groud row">
            <div class="form-group col-md-4">
              <label for="it_manager" class="font-weight-bold lead text-primary">
                <i class="bi bi-pc-display"></i> مدير نظام التكنولوجيا
              </label>
              <input type="text" class="form-control" id="it_manager" name="it_manager" value="{{ old('it_manager') }}"
                placeholder="أدخل اسم مدير تكنولوجيا المعلومات">
            </div>

            <div class="form-group col-md-4">
              <label for="civil_head" class="font-weight-bold lead text-primary">
                <i class="bi bi-building"></i> رئيس قسم الهندسة المدنية
              </label>
              <input type="text" class="form-control" id="civil_head" name="civil_head" value="{{ old('civil_head') }}"
                placeholder="أدخل اسم رئيس قسم الهندسة المدنية">
            </div>
          </div>

          <div class="d-flex justify-content-center mt-3">
            <button type="submit" class="btn btn-outline-primary lead font-weight-bold ">
              <i class="bi bi-check-circle"></i> ✔ اضافة بيانات الإدارة
            </button>
            <button type="reset" class="mr-3 btn btn-outline-danger lead font-weight-bold">
              <i class="bi bi-x-circle"></i> ❌ إلغاء البيانات
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
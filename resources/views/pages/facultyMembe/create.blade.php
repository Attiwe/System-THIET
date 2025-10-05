<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content" style="border-radius: 1rem; border: none;">
      <div class="modal-header" style="background: linear-gradient(135deg, #667eea 0%,rgb(143, 185, 162) 100%); color: white; border-radius: 1rem 1rem 0 0;">
        <h5 class="modal-title fw-bold" id="createModalLabel">
          <i class="bi bi-plus-square me-2"></i>  إضافة سريع - عضو هيئة تدريس
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">
        @include('include.validation')
        <form action="{{ route('facultyMembers.store') }}" method="POST" enctype="multipart/form-data" id="createForm">
          @csrf
          <div class="row g-3">
            <div class="col-md-4">
              <label for="name" class="form-label fw-bold text-primary">
                <i class="bi bi-person-fill me-1"></i>  اسم عضو هيئة التدريس
              </label>
              <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                placeholder="أدخل اسم العضو" required>
            </div>

            <div class="col-md-4">
              <label for="type" class="form-label fw-bold text-primary">
                <i class="bi bi-person-badge me-1"></i>النوع
              </label>
              <select name="type" id="type" class="form-select" required>
                <option value="" selected>اختر النوع</option>
                <option value="دكتور" {{ old('type') == 'دكتور' ? 'selected' : '' }}>دكتور</option>
                <option value="معيد" {{ old('type') == 'معيد' ? 'selected' : '' }}>معيد</option>
              </select>
            </div>

            <div class="col-md-4">
              <label for="appointment_date" class="form-label fw-bold text-primary">
                <i class="bi bi-calendar me-1"></i>تاريخ التعيين
              </label>
              <input type="date" class="form-control" id="appointment_date" name="appointment_date"
                value="{{ old('appointment_date') }}">
            </div>
          </div>

          <br>

          <div class="row g-3">
            <div class="col-md-4">
              <label for="department_id" class="form-label fw-bold text-primary">
                <i class="bi bi-building me-1"></i>القسم
              </label>
              <select name="department_id" id="department_id" class="form-select" required>
                <option value="" selected>اختر القسم</option>
                @foreach ($departments as $department)
                  <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                    {{ $department->name }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="col-md-4">
              <label for="faculty_code" class="form-label fw-bold text-primary">
                <i class="bi bi-barcode me-1"></i>كود العضو
              </label>
              <input type="number" class="form-control" id="faculty_code" name="faculty_code"
                value="{{ $facultyCode }}" readonly>
            </div>

            <div class="col-md-4">
              <label for="appointment_type" class="form-label fw-bold text-primary">
                <i class="bi bi-briefcase me-1"></i>نوع التعيين
              </label>
              <select name="appointment_type" id="appointment_type" class="form-select">
                <option value="" selected>اختر نوع التعيين</option>
                <option value="معين" {{ old('appointment_type') == 'معين' ? 'selected' : '' }}>معين</option>
                <option value="منتدب" {{ old('appointment_type') == 'منتدب' ? 'selected' : '' }}>منتدب جزئي</option>
                <option value="غير ذلك" {{ old('appointment_type') == 'غير ذلك' ? 'selected' : '' }}>غير ذلك</option>
              </select>
            </div>
          </div>
          <br>
          <div class="row g-3">
            <div class="col-md-4">
              <label for="username" class="form-label fw-bold text-primary">
                <i class="bi bi-person-circle me-1"></i>اسم المستخدم
              </label>
              <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" 
                placeholder="أدخل اسم المستخدم" required>
            </div>

            <div class="col-md-4">
              <label for="email" class="form-label fw-bold text-primary">
                <i class="bi bi-envelope me-1"></i>البريد الإلكتروني
              </label>
              <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" 
                placeholder="أدخل البريد الإلكتروني" required>
            </div>

            <div class="col-md-4">
              <label for="password" class="form-label fw-bold text-primary">
                <i class="bi bi-lock me-1"></i>كلمة المرور
              </label>
              <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" 
                placeholder="أدخل كلمة المرور" required>
            </div>
          </div>
          <br>

          <div class="row g-3">
            <div class="col-md-6">
              
              <label for="phone" class="form-label fw-bold text-primary">
                <i class="bi bi-phone me-1"></i>رقم الهاتف
              </label> <small  class="text-danger"> يرجى ادخال رقم الهاتف بشكل صحيح </small>
              <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}"
                placeholder="أدخل رقم الهاتف">
            </div>
            <br>

            <div class="col-md-6 ">
              <br>
              <label for="facebook" class="form-label fw-bold text-primary">
                <i class="bi bi-facebook me-1"></i>فيسبوك
              </label>
              <input type="url" class="form-control" id="facebook" name="facebook" value="{{ old('facebook') }}"
                placeholder="https://facebook.com/username">
            </div>
          </div>
          <br>
          <br>
          <div class="row g-3">
            <div class="col-md-4">
              <label for="personal_image" class="form-label fw-bold text-primary">
                <i class="bi bi-person-bounding-box me-1"></i>الصورة الشخصية
              </label>
              <input type="file" class="form-control" id="personal_image" name="personal_image" accept="image/*">
              <div class="form-text">صيغ مقبولة: JPG, PNG, GIF</div>
            </div>
          <br>
            <div class="col-md-4">
              <label for="resume" class="form-label fw-bold text-primary">
                <i class="bi bi-file-earmark-pdf me-1"></i>السيرة الذاتية
              </label>
              <input type="file" class="form-control" id="resume" name="resume" accept="application/pdf">
              <div class="form-text">ملف PDF فقط</div>
            </div>

            <div class="col-md-4">
              <label for="researches" class="form-label fw-bold text-primary">
                <i class="bi bi-journal-text me-1"></i>الأبحاث
              </label>
              <input type="file" class="form-control" id="researches" name="researches" accept="application/pdf">
              <div class="form-text">ملف PDF فقط</div>
            </div>
          </div>

          <div class="d-flex justify-content-center gap-3 mt-4">
            <button type="submit" class="btn btn-success btn-lg px-4">
              <i class="bi bi-check-circle me-2"></i>إضافة عضو
            </button>
            <button type="reset" class="btn btn-outline-secondary btn-lg px-4">
              <i class="bi bi-arrow-clockwise me-2"></i>إعادة تعيين
            </button>
          </div>
          <br>
        </form>
      </div>
      <div class="modal-footer">
        <a href="{{ route('facultyMembers.create.page') }}" class="btn btn-outline-primary">
          <i class="bi bi-window me-2"></i>  فتح في صفحة منفصلة
        </a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          <i class="bi bi-x-circle me-2"></i>  إغلاق
        </button>
      </div>
    </div>
  </div>
</div>
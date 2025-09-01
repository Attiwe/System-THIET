<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <div class="modal-header text-white  ">
        <h3 class="modal-title text-dark font-weight-bold" id="staticBackdropLabel">
          <i class="bi bi-building"></i> إضافة إعدادات المؤسسة
        </h3>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Body -->
      <form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="name" class="form-label text-primary font-weight-bold">اسم المؤسسة</label>
              <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                placeholder="اسم المؤسسة" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="email" class="form-label text-primary font-weight-bold">الإيميل</label>
              <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"
                placeholder="الإيميل" required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="phone1" class="form-label text-primary font-weight-bold">رقم التليفون الأول</label>
              <input type="text" name="phone1" id="phone1" class="form-control" value="{{ old('phone1') }}"
                placeholder="رقم التليفون الأول" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="phone2" class="form-label text-primary font-weight-bold">رقم التليفون الثاني</label>
              <input type="text" name="phone2" id="phone2" class="form-control" value="{{ old('phone2') }}"
                placeholder="رقم التليفون الثاني">
            </div>
          </div>

          <div class="mb-3">
            <label for="address" class="form-label text-primary font-weight-bold">العنوان</label>
            <textarea name="address" id="address" class="form-control" rows="2" placeholder="العنوان"
              required>{{ old('address') }}</textarea>
          </div>

          <div class="mb-3">
            <label for="logo" class="form-label text-primary font-weight-bold">اللوجو</label>
            <input type="file" name="logo" id="logo" class="form-control" placeholder="اللوجو" required>
          </div>
          <br>
          <div class="text-center">
            <button type="submit" class="btn btn-success px-4 font-weight-bold">
              <i class="bi bi-save"></i> <strong>حفظ</strong>
            </button>
            <button type="button" class="btn btn-danger px-4 font-weight-bold" data-bs-dismiss="modal"> <i class="bi bi-x"></i> <strong>اغلاق</strong>
            </button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>
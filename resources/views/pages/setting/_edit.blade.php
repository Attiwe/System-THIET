<!-- Modal -->
 @include('include.validation')
<div class="modal fade" id="editModal-setting{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <div class="modal-header text-white  ">
        <h3 class="modal-title text-dark font-weight-bold" id="staticBackdropLabel">
          <i class="bi bi-building"></i> إضافة إعدادات المؤسسة
        </h3>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Body -->
      <form action="{{ route('setting.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $item->id }}">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="name" class="form-label text-primary font-weight-bold">اسم المؤسسة</label>
              <input type="text" name="name" id="name" class="form-control" value="{{ old('name',$item->name) }}"
                placeholder="اسم المؤسسة" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="email" class="form-label text-primary font-weight-bold">الإيميل</label>
              <input type="email" name="email" id="email" class="form-control" value="{{ old('email',$item->email) }}"
                placeholder="الإيميل" required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="phone1" class="form-label text-primary font-weight-bold">رقم التليفون الأول</label>
              <input type="text" name="phone1" id="phone1" class="form-control" value="{{ old('phone1',$item->phone1) }}"
                placeholder="رقم التليفون الأول" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="phone2" class="form-label text-primary font-weight-bold">رقم التليفون الثاني</label>
              <input type="text" name="phone2" id="phone2" class="form-control" value="{{ old('phone2',$item->phone2) }}"
                placeholder="رقم التليفون الثاني">
            </div>
          </div>

          <div class="mb-3">
            <label for="address" class="form-label text-primary font-weight-bold">العنوان</label>
            <textarea name="address" id="address" class="form-control" rows="2" placeholder="العنوان"
              required>{{ old('address',$item->address) }}</textarea>
          </div>

          <div class="mb-3">
            <label for="logo" class="form-label text-primary font-weight-bold">اللوجو</label>
            <input type="file" name="logo" value="{{ old('logo',$item->logo) }}"  id="logo" class="form-control" placeholder="اللوجو"  >
            <img src="{{ asset('image/setting-logo/' . $item->logo) }}" value="{{ old('logo',$item->logo) }}"    alt="Logo" class="img-fluid" width="50"
              height="50">
          </input>
          <br>
          <div class="text-center">
            <button type="submit" class="btn btn-outline-success px-4 py-2 font-weight-bold  ml-2">
              <i class="bi bi-save"></i> <strong>حفظ</strong>
            </button>
            <button type="button" class="btn btn-outline-danger px-4 py-2 font-weight-bold  ml-2"
              data-bs-dismiss="modal"> <i class="bi bi-x"></i> <strong>اغلاق</strong>
            </button>
          </div>
          <br>
          <br>
        </div>
      </form>

    </div>
  </div>
</div>
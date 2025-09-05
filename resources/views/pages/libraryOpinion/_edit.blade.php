<div class="modal fade" id="editModal{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <div class="modal-header  text-white">
        <h5 class="modal-title fw-bold" id="editModalLabel{{ $item->id }}">
          <i class="bi bi-calendar-week"></i> تعديل نشاط طلابي
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route('libraryOpinions.update', $item->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <input type="hidden" name="id" value="{{ $item->id }}">

          <div class="card-body">
            <div class="row">
               <div class="col-md-6 mb-3">
                <label for="number_library" class="form-label fw-bold">
                  <i class="bi bi-person-circle text-primary"></i> عدد القاعات والمدرجات
                </label>
                <input type="text" class="form-control form-control-lg" id="number_library"
                  name="number_library" value="{{ $item->number_library }}" required
                  placeholder="ادخل عدد القاعات والمدرجات">
              </div>

              <div class="col-md-6 mb-3">
                <label for="number_prizes" class="form-label fw-bold">
                  <i class="bi bi-pencil-square text-success"></i> عدد الجوائز
                </label>
                <input type="text" class="form-control form-control-lg" id="number_prizes"
                  name="number_prizes" value="{{ $item->number_prizes }}" required placeholder="ادخل عدد الجوائز">
              </div>
            </div>

             <div class="mb-3">
              <label for="image_student" class="form-label fw-bold">
                <i class="bi bi-image text-warning"></i> صورة الطالب
              </label>
              <input type="file" class="form-control form-control-lg" id="image_student"
                name="image_student" value="{{ $item->image_student }}">
              <small class="text-muted">اتركه فارغًا إذا لم ترغب في تغيير الصورة الحالية</small>
              <br>
              @if($item->image_student)
                <img src="{{ asset('image/libraryOpinions/' . $item->image_student) }}" alt="صورة الطالب"
                  class="figure-img img-fluid rounded mt-2" style="height: 60px; object-fit: cover;">
              @endif
            </div>

            <div class="mb-3">
              <label for="image_library" class="form-label fw-bold">
                <i class="bi bi-image text-warning"></i> صورة المكتبة
              </label>
              <input type="file" class="form-control form-control-lg" id="image_library"
                name="image_library" value="{{ $item->image_library }}">
              <small class="text-muted">اتركه فارغًا إذا لم ترغب في تغيير الصورة الحالية</small>
              <br>
              @if($item->image_library)
                <img src="{{ asset('image/libraryOpinions/' . $item->image_library) }}" alt="صورة المكتبة"
                  class="figure-img img-fluid rounded mt-2" style="height: 60px; object-fit: cover;">
              @endif
            </div>

          </div>

          <!-- أزرار الحفظ والإغلاق -->
          <div class="modal-footer border-top-0">
            <button type="submit" class="btn btn-success px-4">
              <i class="bi bi-save"></i> حفظ
            </button>
            <button type="button" class="btn btn-danger px-4" data-bs-dismiss="modal">
              <i class="bi bi-x-circle"></i> إغلاق
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
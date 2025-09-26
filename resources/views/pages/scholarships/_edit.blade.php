 @include('include.validation')
 <div class="modal fade" id="editModal{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <div class="modal-header text-white">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel">
          <i class="bi bi-calendar-week"></i> تعديل منح دراسية
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route('scholarships.update', $item->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')  
          <input type="hidden" name="id" value="{{ $item->id }}">

          <div class="mb-3">
            <label for="name" class="form-label fw-bold">
              <i class="bi bi-calendar-date text-primary"></i> الاسم
            </label>
            <input type="text" class="form-control form-control-lg text-dark " id="name" name="name" value="{{ $item->name }} "
              required>

          </div>

          <div class="mb-3">
            <label for="details" class="form-label fw-bold">
              <i class="bi bi-toggle-on text-dark"></i> التفاصيل
            </label>
            <textarea type="text" class="form-control form-control-lg text-dark" id="details" name="details"  
              required>{{ $item->details }}</textarea>

          </div>

        <div class="form-group">
          <label for="image_path">الصورة</label>
          <div>
            @if($item->image_path)
            <img src="{{ $item->image_path ? asset('image/scholarship/' . $item->image_path) : asset('image/no-image.png') }}" alt="scholarship image" width="120"
              class="mt-2">
            @endif
          </div>
          <input type="file" name="image_path" class="form-control form-control-lg">
          
        </div>
          <div class="modal-footer border-top-0">
            <button type="submit" class="btn btn-success px-4">
              <i class="bi bi-save"></i>  حفظ
            </button>
            <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
              <i class="bi bi-x-circle"></i> إغلاق
            </button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
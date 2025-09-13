 @include('include.validation')
 <div class="modal fade" id="editModal{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <div class="modal-header text-white">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel">
          <i class="bi bi-calendar-week"></i> تعديل رابط مهم
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route('important_link.update', $item->id) }}" method="POST">
          @csrf
          @method('PUT')  
          <input type="hidden" name="id" value="{{ $item->id }}">

          <div class="mb-3">
            <label for="title" class="form-label fw-bold">
              <i class="bi bi-calendar-date text-primary"></i> العنوان
            </label>
            <input type="text" class="form-control form-control-lg text-danger" id="title" name="title" value="{{ $item->title }} "
              required>

          </div>

          <div class="mb-3">
            <label for="url" class="form-label fw-bold">
              <i class="bi bi-toggle-on text-success"></i> الرابط
            </label>
             <input type="url" class="form-control form-control-lg" id="url" name="url" value="{{ $item->url }} " required>

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
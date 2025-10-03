@include('include.validation')
<div class="modal fade" id="editModal{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <div class="modal-header text-white">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel">
          <i class="bi bi-folder-check"></i> تعديل ملف اللائحه الداخليه 
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route('internal-permanencies.update', $item->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')  
          <input type="hidden" name="id" value="{{ $item->id }}">

          <div class="mb-3">
            <label for="unit_id" class="form-label fw-bold">
              <i class="bi bi-diagram-3 text-primary"></i> الوحدة
            </label>
            <select class="form-select form-select-lg" id="unit_id" name="unit_id" required>
              @foreach($units as $unit)
                <option value="{{ $unit->id }}" {{ $item->unit_id == $unit->id ? 'selected' : '' }}>{{ $unit->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label for="file_path" class="form-label fw-bold">
              <i class="bi bi-paperclip text-success"></i> الملف (اختياري للتعديل)
            </label>
            <input type="file" class="form-control form-control-lg" id="file_path" name="file_path">
            @if($item->file_path)
              <small class="text-muted">ملف حالي: <a href="{{ route('internal-permanencies.download', basename($item->file_path)) }}" target="_blank">عرض</a></small>
            @endif
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



@include('include.validation')
<div class="modal fade" id="editModal{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <div class="modal-header text-white">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel">
          <i class="bi bi-person-gear"></i> تعديل نائب مدير
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route('deputy-directors.update', $item->id) }}" method="POST">
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
            <label for="name" class="form-label fw-bold">
              <i class="bi bi-person text-success"></i> الاسم
            </label>
            <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{ $item->name }}" required>
          </div>

          <div class="mb-3">
            <label for="deputy_director" class="form-label fw-bold">
              <i class="bi bi-person-badge text-info"></i> النائب
            </label>
            <input type="text" class="form-control form-control-lg" id="deputy_director" name="deputy_director" value="{{ $item->deputy_director }}" required>
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



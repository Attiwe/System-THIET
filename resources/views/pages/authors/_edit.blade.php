<!-- Modal Edit Author -->
<div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel{{ $item->id }}">
          <i class="bi bi-pencil text-primary"></i> تعديل المؤلف
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('authors.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="name_edit{{ $item->id }}" class="form-label">
                  <i class="bi bi-person text-primary"></i> اسم المؤلف <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                       id="name_edit{{ $item->id }}" name="name" value="{{ old('name', $item->name) }}" 
                       placeholder="أدخل اسم المؤلف" required>
                @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          
          <div class="row mt-3">
            <div class="col-md-12">
              <div class="form-group">
                <label for="description_edit{{ $item->id }}" class="form-label">
                  <i class="bi bi-file-text text-primary"></i> وصف المؤلف
                </label>
                <textarea class="form-control @error('description') is-invalid @enderror" 
                          id="description_edit{{ $item->id }}" name="description" rows="4" 
                          placeholder="أدخل وصف المؤلف (اختياري)">{{ old('description', $item->description) }}</textarea>
                @error('description')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="bi bi-x-circle"></i> إلغاء
          </button>
          <button type="submit" class="btn btn-primary">
            <i class="bi bi-check-circle"></i> تحديث المؤلف
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

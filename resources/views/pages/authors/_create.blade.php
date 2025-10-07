<!-- Modal Create Author -->
<div class="modal fade" id="createAuthor" tabindex="-1" aria-labelledby="createAuthorLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createAuthorLabel">
          <i class="bi bi-plus-circle text-primary"></i> إضافة مؤلف جديد
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('authors.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="name" class="form-label">
                  <i class="bi bi-person text-primary"></i> اسم المؤلف <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                       id="name" name="name" value="{{ old('name') }}" 
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
                <label for="description" class="form-label">
                  <i class="bi bi-file-text text-primary"></i> وصف المؤلف
                </label>
                <textarea class="form-control @error('description') is-invalid @enderror" 
                          id="description" name="description" rows="4" 
                          placeholder="أدخل وصف المؤلف (اختياري)">{{ old('description') }}</textarea>
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
            <i class="bi bi-check-circle"></i> حفظ المؤلف
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

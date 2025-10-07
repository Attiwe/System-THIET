<!-- Modal Edit Publishing -->
<div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel{{ $item->id }}">
          <i class="bi bi-pencil text-primary"></i> تعديل دار النشر
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('publishings.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="publishing_name_edit{{ $item->id }}" class="form-label">
                  <i class="bi bi-building text-primary"></i> اسم دار النشر <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control @error('publishing_name') is-invalid @enderror" 
                       id="publishing_name_edit{{ $item->id }}" name="publishing_name" value="{{ old('publishing_name', $item->publishing_name) }}" 
                       placeholder="أدخل اسم دار النشر" required>
                @error('publishing_name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="phone_edit{{ $item->id }}" class="form-label">
                  <i class="bi bi-telephone text-primary"></i> رقم الهاتف <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                       id="phone_edit{{ $item->id }}" name="phone" value="{{ old('phone', $item->phone) }}" 
                       placeholder="أدخل رقم الهاتف" required>
                @error('phone')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          
          <div class="row mt-3">
            <div class="col-md-12">
              <div class="form-group">
                <label for="publishing_description_edit{{ $item->id }}" class="form-label">
                  <i class="bi bi-file-text text-primary"></i> وصف دار النشر
                </label>
                <textarea class="form-control @error('publishing_description') is-invalid @enderror" 
                          id="publishing_description_edit{{ $item->id }}" name="publishing_description" rows="4" 
                          placeholder="أدخل وصف دار النشر (اختياري)">{{ old('publishing_description', $item->publishing_description) }}</textarea>
                @error('publishing_description')
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
            <i class="bi bi-check-circle"></i> تحديث دار النشر
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

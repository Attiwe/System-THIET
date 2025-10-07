<!-- Modal Create Publishing -->
<div class="modal fade" id="createPublishing" tabindex="-1" aria-labelledby="createPublishingLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createPublishingLabel">
          <i class="bi bi-plus-circle text-primary"></i> إضافة دار نشر جديدة
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('publishings.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="publishing_name" class="form-label">
                  <i class="bi bi-building text-primary"></i> اسم دار النشر <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control @error('publishing_name') is-invalid @enderror" 
                       id="publishing_name" name="publishing_name" value="{{ old('publishing_name') }}" 
                       placeholder="أدخل اسم دار النشر" required>
                @error('publishing_name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="phone" class="form-label">
                  <i class="bi bi-telephone text-primary"></i> رقم الهاتف <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                       id="phone" name="phone" value="{{ old('phone') }}" 
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
                <label for="publishing_description" class="form-label">
                  <i class="bi bi-file-text text-primary"></i> وصف دار النشر
                </label>
                <textarea class="form-control @error('publishing_description') is-invalid @enderror" 
                          id="publishing_description" name="publishing_description" rows="4" 
                          placeholder="أدخل وصف دار النشر (اختياري)">{{ old('publishing_description') }}</textarea>
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
            <i class="bi bi-check-circle"></i> حفظ دار النشر
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

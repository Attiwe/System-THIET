<!-- Modal Create Unit Institute -->
<div class="modal fade" id="createUnitInstitute" tabindex="-1" aria-labelledby="createUnitInstituteLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createUnitInstituteLabel">
          <i class="bi bi-plus-circle text-primary"></i> إضافة عن المعهد  
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('unit_institutes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="vision" class="form-label">
                  <i class="bi bi-eye text-primary"></i> الرؤية <span class="text-danger">*</span>
                </label>
                <textarea class="form-control @error('vision') is-invalid @enderror" 
                          id="vision" name="vision" rows="6" 
                          placeholder="أدخل رؤية وحدة المعهد" required>{{ old('vision') }}</textarea>
                @error('vision')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="message" class="form-label">
                  <i class="bi bi-chat-dots text-primary"></i> الرسالة <span class="text-danger">*</span>
                </label>
                <textarea class="form-control @error('message') is-invalid @enderror" 
                          id="message" name="message" rows="6" 
                          placeholder="أدخل رسالة وحدة المعهد" required>{{ old('message') }}</textarea>
                @error('message')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="description" class="form-label">
                  <i class="bi bi-file-text text-primary"></i> الوصف <span class="text-danger">*</span>
                </label>
                <textarea class="form-control @error('description') is-invalid @enderror" 
                          id="description" name="description" rows="6" 
                          placeholder="أدخل وصف وحدة المعهد" required>{{ old('description') }}</textarea>
                @error('description')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          
           <div class="row mt-3">
             <div class="col-md-6">
               <div class="form-group">
                 <label for="image" class="form-label">
                   <i class="bi bi-image text-primary"></i> صورة وحدة المعهد <span class="text-danger">*</span>
                 </label>
                 <input type="file" class="form-control @error('image') is-invalid @enderror" 
                        id="image" name="image" accept="image/*" required>
                 <div class="form-text">أنواع الصور المسموحة: JPEG, PNG, JPG, GIF, WEBP (الحد الأقصى: 2 ميجابايت)</div>
                 @error('image')
                   <div class="invalid-feedback">{{ $message }}</div>
                 @enderror
               </div>
             </div>
             <div class="col-md-6">
               <div class="form-group">
                 <label for="status" class="form-label">
                   <i class="bi bi-toggle-on text-primary"></i> الحالة
                 </label>
                 <div class="form-check form-switch">
                   <input class="form-check-input @error('status') is-invalid @enderror" 
                          type="checkbox" id="status" name="status" value="1" checked>
                   <label class="form-check-label" for="status">
                     مفعل
                   </label>
                 </div>
                 @error('status')
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
            <i class="bi bi-check-circle"></i> حفظ وحدة المعهد
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit Unit Institute -->
<div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel{{ $item->id }}">
          <i class="bi bi-pencil text-primary"></i> تعديل عن المعهد
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('unit_institutes.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="vision_edit{{ $item->id }}" class="form-label">
                  <i class="bi bi-eye text-primary"></i> الرؤية <span class="text-danger">*</span>
                </label>
                <textarea class="form-control @error('vision') is-invalid @enderror" 
                          id="vision_edit{{ $item->id }}" name="vision" rows="6" 
                          placeholder="أدخل رؤية وحدة المعهد" required>{{ old('vision', $item->vision) }}</textarea>
                @error('vision')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="message_edit{{ $item->id }}" class="form-label">
                  <i class="bi bi-chat-dots text-primary"></i> الرسالة <span class="text-danger">*</span>
                </label>
                <textarea class="form-control @error('message') is-invalid @enderror" 
                          id="message_edit{{ $item->id }}" name="message" rows="6" 
                          placeholder="أدخل رسالة وحدة المعهد" required>{{ old('message', $item->message) }}</textarea>
                @error('message')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="description_edit{{ $item->id }}" class="form-label">
                  <i class="bi bi-file-text text-primary"></i> الوصف <span class="text-danger">*</span>
                </label>
                <textarea class="form-control @error('description') is-invalid @enderror" 
                          id="description_edit{{ $item->id }}" name="description" rows="6" 
                          placeholder="أدخل وصف وحدة المعهد" required>{{ old('description', $item->description) }}</textarea>
                @error('description')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          
           <div class="row mt-3">
             <div class="col-md-4">
               <div class="form-group">
                 <label for="image_edit{{ $item->id }}" class="form-label">
                   <i class="bi bi-image text-primary"></i> صورة وحدة المعهد
                 </label>
                 <input type="file" class="form-control @error('image') is-invalid @enderror" 
                        id="image_edit{{ $item->id }}" name="image" accept="image/*">
                 <div class="form-text">أنواع الصور المسموحة: JPEG, PNG, JPG, GIF, WEBP (الحد الأقصى: 2 ميجابايت)</div>
                 @error('image')
                   <div class="invalid-feedback">{{ $message }}</div>
                 @enderror
               </div>
             </div>
             <div class="col-md-4">
               <div class="form-group">
                 <label for="status_edit{{ $item->id }}" class="form-label">
                   <i class="bi bi-toggle-on text-primary"></i> الحالة
                 </label>
                 <div class="form-check form-switch">
                   <input class="form-check-input @error('status') is-invalid @enderror" 
                          type="checkbox" id="status_edit{{ $item->id }}" name="status" value="1" 
                          {{ old('status', $item->status) ? 'checked' : '' }}>
                   <label class="form-check-label" for="status_edit{{ $item->id }}">
                     مفعل
                   </label>
                 </div>
                 @error('status')
                   <div class="invalid-feedback">{{ $message }}</div>
                 @enderror
               </div>
             </div>
             <div class="col-md-4">
               @if($item->image)
                 <div class="form-group">
                   <label class="form-label">الصورة الحالية:</label>
                   <div class="text-center">
                     <img src="{{ Storage::url('unit_institutes/' . $item->image) }}" alt="الصورة الحالية" width="120" height="120" class="rounded border">
                     <br>
                     <a href="{{ Storage::url('unit_institutes/' . $item->image) }}" target="_blank" class="btn btn-sm btn-outline-info mt-2">
                       <i class="bi bi-eye-fill"></i> عرض الصورة
                     </a>
                   </div>
                 </div>
               @endif
             </div>
           </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="bi bi-x-circle"></i> إلغاء
          </button>
          <button type="submit" class="btn btn-primary">
            <i class="bi bi-check-circle"></i> تحديث وحدة المعهد
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

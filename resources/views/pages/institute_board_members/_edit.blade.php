@include('include.validation')
<div class="modal fade" id="editModal{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg border-0 rounded-3">
      <div class="modal-header text-white">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel">
          <i class="bi bi-calendar-week"></i> تعديل عضو مجلس اداره
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('institute_board_members.update', $item->id) }}" method="POST">
          @csrf
          @method('PUT')
          <input type="hidden" name="id" value="{{ $item->id }}">
          <div class="card-body">
            <div class="mb-3">
              <label for="faculty_members_id" class="form-label fw-bold">
                <i class="bi bi-calendar-date text-primary"></i> اسم العضو
              </label>
              <select class="form-select form-select-lg" id="faculty_members_id" name="faculty_members_id" required>
                <option value="" selected>اختر العضو</option>
                @foreach($facultyMembers as $facultyMember)
                  <option value="{{ $facultyMember->id }}" {{ $facultyMember->id == $item->faculty_members_id ? 'selected' : '' }}>
                    {{ $facultyMember->username }}
                  </option>
                @endforeach
              </select>
            </div>
            <br>
            <div class="mb-3">
              <label for="type" class="form-label fw-bold">
                <i class="bi bi-toggle-on text-success"></i> الدرجة
              </label>
              <select class="form-select form-select-lg" id="type" name="type" required>
                <option value="" selected>اختر الدرجة</option>
                <option value="عميد المعهد" {{ old('type') == 'عميد المعهد' ? 'selected' : '' }}>عميد المعهد</option>
                <option value="رئيس مجلس اداره" {{ old('type') == 'رئيس مجلس اداره' ? 'selected' : '' }}>رئيس مجلس اداره</option>
                <option value="وكيل المعهد لشؤون المجتمع" {{ old('type') == 'وكيل المعهد لشؤون المجتمع' ? 'selected' : '' }}>وكيل المعهد
                  لشؤون المجتمع</option>
              </select>

            </div>
            <br>
            <div class="mb-3">
              <label for="description" class="form-label fw-bold">
                <i class="bi bi-file-text text-info"></i> الوصف
              </label>
              <textarea class="form-control" id="description" name="description" rows="4" 
                        placeholder="أدخل وصفاً لعضو مجلس الإدارة...">{{ $item->description }}</textarea>
            </div>
            <div class="modal-footer border-top-0">
              <button type="submit" class="btn btn-success px-4">
                <i class="bi bi-save"></i> حفظ التعديلات
              </button>
              <button type="button" class="btn btn-outline-danger px-4" data-bs-dismiss="modal">
                <i class="bi bi-x-circle"></i> إغلاق
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
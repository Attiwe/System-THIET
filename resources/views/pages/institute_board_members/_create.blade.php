@include('include.validation')
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <div class="modal-header text-white">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel">
          <i class="bi bi-calendar-week"></i> إضافة عضو مجلس اداره
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route('institute_board_members.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="faculty_members_id" class="form-label fw-bold">
              <i class="bi bi-calendar-date text-primary"></i> اسم العضو
            </label>
            <select class="form-select form-select-lg" id="faculty_members_id" name="faculty_members_id" required>
              <option value="" selected>اختر العضو</option>
              @foreach($facultyMembers as $item)
                <option value="{{ $item->id }}" {{ old('faculty_members_id') == $item->username ? 'selected' : '' }}>
                  {{ $item->username }}
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
              <option value="العميد" {{ old('type') == 'العميد' ? 'selected' : '' }}>العميد</option>
              <option value="رئيس مجلس اداره" {{ old('type') == 'رئيس مجلس اداره' ? 'selected' : '' }}>رئيس مجلس اداره</option>
              <option value="دكتور" {{ old('type') == 'دكتور' ? 'selected' : '' }}>دكتور</option>
              <option value="معيد" {{ old('type') == 'معيد' ? 'selected' : '' }}>معيد</option>
            </select>
          </div>

          <div class="modal-footer border-top-0">
            <button type="submit" class="btn btn-success px-4">
              <i class="bi bi-save"></i> حفظ
            </button>
            <button type="button" class="btn btn-outline-danger px-4" data-bs-dismiss="modal">
              <i class="bi bi-x-circle"></i> إغلاق
            </button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
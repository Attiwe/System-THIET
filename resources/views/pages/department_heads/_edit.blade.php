@include('include.validation')
<div class="modal fade" id="editModal{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <div class="modal-header text-white">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel">
          <i class="bi bi-person-badge"></i> تعديل رئيس قسم
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route('department_heads.update', $item->id) }}" method="POST">
          @csrf
          @method('PUT')  
          <input type="hidden" name="id" value="{{ $item->id }}">

          <!-- القسم -->
          <div class="mb-3">
            <label for="department_id" class="form-label fw-bold">
              <i class="bi bi-building text-primary"></i> القسم
            </label>
            <select class="form-select form-select-lg" id="department_id" name="department_id" required>
              <option value="" selected>اختر القسم</option>
              @foreach($departments as $department)
                <option value="{{ $department->id }}" {{ $item->department_id == $department->id ? 'selected' : '' }}>
                  {{ $department->name }}
                </option>
              @endforeach
            </select>
          </div>

          <!-- عضو هيئة التدريس -->
          <div class="mb-3">
            <label for="faculty_members_id" class="form-label fw-bold">
              <i class="bi bi-person-badge text-success"></i> عضو هيئة التدريس
            </label>
            <select class="form-select form-select-lg" id="faculty_members_id" name="faculty_members_id" required>
              <option value="" selected>اختر عضو هيئة التدريس</option>
              @foreach($facultyMembers as $facultyMember)
                  <option value="{{ $facultyMember->id }}" {{ $item->faculty_members_id == $facultyMember->id ? 'selected' : '' }}>
                  {{ $facultyMember->name }}  
                </option>
              @endforeach
            </select>
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
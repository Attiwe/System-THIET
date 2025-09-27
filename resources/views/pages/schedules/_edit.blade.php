@include('include.validation')
<div class="modal fade" id="editModal{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <div class="modal-header text-white">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel">
          <i class="bi bi-calendar-week"></i> تعديل جدول دراسي
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     
      <div class="modal-body p-4">
        <form action="{{ route('schedules.update', $item->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <!-- النوع + السنة الدراسية -->
          <div class="row g-4">
            <div class="col-md-6">
              <label for="type" class="form-label fw-bold">
                <i class="bi bi-calendar-date text-primary"></i> النوع
              </label>
              <select name="type" id="type" class="form-select form-select-lg shadow-sm">
                 <option value="جداول الامتحانات" {{ $item->type == 'جداول الامتحانات' ? 'selected' : '' }}>جداول الامتحانات</option>
                <option value="جداول الدرسه" {{ $item->type == 'جداول الامتحانات' ? 'selected' : '' }}>جداول الدراسه</option>
                <option value="غير ذالك" {{ $item->type == 'غير ذالك' ? 'selected' : '' }}>غير ذالك</option>
              </select>
            </div>

            <div class="col-md-6">
              <label for="academic_year" class="form-label fw-bold">
                <i class="bi bi-calendar-date text-primary"></i> السنة الدراسية
              </label>
              <input type="date" class="form-control form-control-lg shadow-sm" id="academic_year" name="academic_year"
                required value="{{ $item->academic_year }}">
            </div>
          </div>

          <br>
          <br>

          <!-- القسم + المرحلة -->
          <div class="row g-4">
            <div class="col-md-6">
              <label for="department_id" class="form-label fw-bold">
                <i class="bi bi-building text-primary"></i> القسم
              </label>
              <select name="department_id" id="department_id" class="form-select form-select-lg shadow-sm">
                <option value="" {{ $item->department_id == '' ? 'selected' : '' }}>اختر القسم</option>
                @foreach ($departments as $department)
                  <option value="{{ $department->id }}" {{ $item->department_id == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-md-6">
              <label for="level_id" class="form-label fw-bold">
                <i class="bi bi-layers text-primary"></i> المرحلة
              </label>
              <select name="level_id" id="level_id" class="form-select form-select-lg shadow-sm">
                <option value="" {{ $item->level_id == '' ? 'selected' : '' }}>اختر المرحلة</option>
                @foreach ($levelAcademics as $levelAcademic)
                  <option value="{{ $levelAcademic->id }}" {{ $item->level_id == $levelAcademic->id ? 'selected' : '' }}>{{ $levelAcademic->level_name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <br>
          <br>

          <!-- file_path -->
          <div class="row g-4">
            <div class="col-md-12">
              <label for="file_path" class="form-label fw-bold">
                <i class="bi bi-file-earmark-text text-primary"></i> ملف الجدول الدراسي
              </label>
              <br>
              <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank">{{ $item->file_path }}</a>
              <br>
              <input type="file" class="form-control form-control-lg shadow-sm" id="file_path" name="file_path"
                  value="{{ $item->file_path }}" accept=".pdf">
            </div>
          </div>
      </div>
      <br>
      <br>
      <!-- Footer -->
      <div class="modal-footer border-0 d-flex justify-content-between px-4 pb-4">
        <button type="submit" class="btn btn-success px-5 fw-bold shadow-sm">
          <i class="bi bi-save"></i> حفظ
        </button>
        <button type="button" class="btn btn-outline-danger px-5 fw-bold shadow-sm" data-bs-dismiss="modal">
          <i class="bi bi-x-circle"></i> إغلاق
        </button>
      </div>
      </form>
    </div>
  </div>
</div>
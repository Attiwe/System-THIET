<!-- Edit Modal -->
<div class="modal fade" id="editModal{{ $trip->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="editModalLabel{{ $trip->id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <!-- Header -->
      <div class="modal-header text-white">
        <h5 class="modal-title fw-bold" id="editModalLabel{{ $trip->id }}">
          <i class="bi bi-pencil-square"></i> تعديل الرحلة العلمية
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Body -->
      <div class="modal-body">
        <form action="{{ route('scientific_trips.update', $trip->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <!-- القسم -->
          <div class="mb-3">
            <label for="department_id_edit{{ $trip->id }}" class="form-label fw-bold">
              <i class="bi bi-building text-primary"></i> القسم <span class="text-danger">*</span>
            </label>
            <select class="form-select form-select-lg" id="department_id_edit{{ $trip->id }}" name="department_id" required>
              <option value="">اختر القسم</option>
              @foreach($departments as $department)
                <option value="{{ $department->id }}" {{ $trip->department_id == $department->id ? 'selected' : '' }}>
                  {{ $department->name }}
                </option>
              @endforeach
            </select>
          </div>

          <!-- اسم الدكتور -->
          <div class="mb-3">
            <label for="doctor_name_edit{{ $trip->id }}" class="form-label fw-bold">
              <i class="bi bi-person-badge text-success"></i> اسم الدكتور <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control form-control-lg" id="doctor_name_edit{{ $trip->id }}" 
                   name="doctor_name" value="{{ $trip->doctor_name }}" required>
          </div>

          <!-- اسم الرحلة -->
          <div class="mb-3">
            <label for="trip_name_edit{{ $trip->id }}" class="form-label fw-bold">
              <i class="bi bi-geo-alt text-info"></i> اسم الرحلة العلمية <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control form-control-lg" id="trip_name_edit{{ $trip->id }}" 
                   name="trip_name" value="{{ $trip->trip_name }}" required>
          </div>

          <!-- وصف الرحلة -->
          <div class="mb-3">
            <label for="description_edit{{ $trip->id }}" class="form-label fw-bold">
              <i class="bi bi-file-text text-warning"></i> وصف الرحلة العلمية <span class="text-danger">*</span>
            </label>
            <textarea class="form-control form-control-lg" id="description_edit{{ $trip->id }}" 
                      name="description" rows="4" required>{{ $trip->description }}</textarea>
          </div>

          <!-- صورة الرحلة الحالية -->
          @if($trip->trip_image)
            <div class="mb-3">
              <label class="form-label fw-bold">
                <i class="bi bi-image text-primary"></i> الصورة الحالية
              </label>
              <div class="text-center">
                <img src="{{ asset('storage/scientific_trips/images/' . $trip->trip_image) }}" 
                     alt="صورة الرحلة العلمية" class="rounded" style="max-width: 200px; max-height: 150px; object-fit: cover;">
                <br>
                <button type="button" class="btn btn-sm btn-outline-primary mt-2" 
                        onclick="viewImage('{{ asset('storage/scientific_trips/images/' . $trip->trip_image) }}', '{{ $trip->trip_name }}')">
                  <i class="bi bi-eye"></i> عرض الصورة الحالية
                </button>
              </div>
            </div>
          @endif

          <!-- صورة الرحلة الجديدة -->
          <div class="mb-3">
            <label for="trip_image_edit{{ $trip->id }}" class="form-label fw-bold">
              <i class="bi bi-image text-primary"></i> 
              {{ $trip->trip_image ? 'تحديث صورة الرحلة العلمية' : 'صورة الرحلة العلمية' }}
            </label>
            <input type="file" class="form-control form-control-lg" id="trip_image_edit{{ $trip->id }}" 
                   name="trip_image" accept="image/*">
            <div class="form-text">يُسمح بالصور فقط (حد أقصى 2 ميجابايت)</div>
          </div>

          <!-- Footer -->
          <div class="modal-footer border-top-0">
            <button type="submit" class="btn btn-success px-4">
              <i class="bi bi-save"></i> حفظ التغييرات
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

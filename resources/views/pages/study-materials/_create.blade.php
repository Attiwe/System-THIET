<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl"  >
    <div class="modal-content shadow-lg border-0 rounded-4">

      <!-- Header -->
      <div class="modal-header bg-gradient text-white rounded-top-4">
        <h4 class="modal-title fw-bold" id="staticBackdropLabel">
          <i class="bi bi-journal-plus me-2"></i> إدارة المواد الدراسية
        </h4>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Body -->
      <div class="modal-body ">
        <form action="{{ route('study_materials.store') }}" method="POST">
          @csrf

          <!-- Accordion -->
          <div class="accordion" id="materialsAccordion">
            <!-- First Item -->
            <div class="accordion-item mb-3 border rounded-3 shadow-sm">
              <h2 class="accordion-header" id="heading0">
                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapse0" aria-expanded="true" aria-controls="collapse0">
                  <i class="bi bi-book me-2 text-primary"></i> المادة الدراسية 1
                </button>
              </h2>
              <div id="collapse0" class="accordion-collapse collapse show" aria-labelledby="heading0"
                data-bs-parent="#materialsAccordion">
                <div class="accordion-body">
                  <div class="row g-3">
                    <div class="col-md-6">
                      <label class="form-label fw-bold">المادة الدراسية</label>
                      <input type="text" class="form-control form-control-lg" name="study_material[0][study_material]"
                        required placeholder="ادخل اسم المادة">
                    </div>

                    <div class="col-md-3">
                      <label class="form-label fw-bold">القسم</label>
                      <select class="form-select form-select-lg" name="study_material[0][department_id]" required>
                        <option value="">اختر القسم</option>
                        @foreach($departments as $department)
                          <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="col-md-3">
                      <label class="form-label fw-bold">الفرقة الدراسية</label>
                      <select class="form-select form-select-lg" name="study_material[0][level_id]" required>
                        <option value="">اختر الفرقة</option>
                        @foreach($levels as $level)
                          <option value="{{ $level->id }}">{{ $level->level_name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Add More Materials -->
            <div class="accordion-item mb-3 border rounded-3 shadow-sm">
              <h2 class="accordion-header" id="heading1">
                <button class="accordion-button fw-bold collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                  <i class="bi bi-book me-2 text-primary"></i> المادة الدراسية 2
                </button>
              </h2>
              <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="heading1"
                data-bs-parent="#materialsAccordion">
                <div class="accordion-body">
                  <div class="row g-3">
                    <div class="col-md-6">
                      <label class="form-label fw-bold">المادة الدراسية</label>
                      <input type="text" class="form-control form-control-lg" name="study_material[1][study_material]"
                        required placeholder="ادخل اسم المادة">
                    </div>

                    <div class="col-md-3">
                      <label class="form-label fw-bold">القسم</label>
                      <select class="form-select form-select-lg" name="study_material[1][department_id]" required>
                        <option value="">اختر القسم</option>
                        @foreach($departments as $department)
                          <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="col-md-3">
                      <label class="form-label fw-bold">الفرقة الدراسية</label>
                      <select class="form-select form-select-lg" name="study_material[1][level_id]" required>
                        <option value="">اختر الفرقة</option>
                        @foreach($levels as $level)
                          <option value="{{ $level->id }}">{{ $level->level_name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <!-- زر إضافة مادة جديدة -->
          <div class="text-center my-4">
            <button type="button" class="btn btn-outline-primary btn-lg px-5 rounded-pill" id="addMaterial">
              <i class="bi bi-plus-circle"></i> إضافة مادة جديدة
            </button>
          </div>

          <!-- Footer -->
          <div class="modal-footer border-0 d-flex justify-content-between">
            <button type="submit" class="btn btn-success btn-lg px-5 rounded-pill shadow-sm">
              <i class="bi bi-save me-2"></i> حفظ البيانات
            </button>
            <button type="button" class="btn btn-outline-danger btn-lg px-5 rounded-pill shadow-sm" data-bs-dismiss="modal">
              <i class="bi bi-x-circle me-2"></i> إغلاق
            </button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

<!-- Script -->
<script>
  let materialIndex = 1;

  document.getElementById('addMaterial').addEventListener('click', function () {
    const accordion = document.getElementById('materialsAccordion');
    const newItem = document.createElement('div');
    newItem.classList.add('accordion-item', 'mb-3', 'border', 'rounded-3', 'shadow-sm');

    newItem.innerHTML = `
      <h2 class="accordion-header" id="heading${materialIndex}">
        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" 
                data-bs-target="#collapse${materialIndex}" aria-expanded="false" aria-controls="collapse${materialIndex}">
          <i class="bi bi-book me-2 text-primary"></i> المادة الدراسية ${materialIndex + 1}
        </button>
      </h2>
      <div id="collapse${materialIndex}" class="accordion-collapse collapse" aria-labelledby="heading${materialIndex}" data-bs-parent="#materialsAccordion">
        <div class="accordion-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label fw-bold">المادة الدراسية</label>
              <input type="text" class="form-control form-control-lg" name="study_material[${materialIndex}][study_material]" required placeholder="ادخل اسم المادة">
            </div>
            <div class="col-md-3">
              <label class="form-label fw-bold">القسم</label>
              <select class="form-select form-select-lg" name="study_material[${materialIndex}][department_id]" required>
                <option value="">اختر القسم</option>
                @foreach($departments as $department)
                  <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-3">
              <label class="form-label fw-bold">الفرقة الدراسية</label>
              <select class="form-select form-select-lg" name="study_materials[${materialIndex}][level_id]" required>
                <option value="">اختر الفرقة</option>
                @foreach($levels as $level)
                  <option value="{{ $level->id }}">{{ $level->level_name }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>
    `;

    accordion.appendChild(newItem);
    materialIndex++;
  });
</script>
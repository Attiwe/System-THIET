<!-- Modal -->
<div class="modal fade" id="createStudent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="createStudentLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <div class="modal-header text-white">
        <h3 class="modal-title text-dark font-weight-bold" id="createStudentLabel">
          <i class="bi bi-person-plus"></i> إضافة طالب مكتبه
        </h3>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('office_students.store') }}" method="POST">
        @csrf
        <div class="modal-body">

          <div class="row">
             <div class="col-md-6 mb-3">
              <label for="department_id" class="form-label text-primary font-weight-bold">القسم</label>
              <select name="department_id" id="department_id" class="form-control" required>
                <option value="" selected>اختر القسم</option>
                @foreach($departments as $department)
                  <option class="text-dark font-weight-bold" value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
              </select>
            </div>

             <div class="col-md-6 mb-3">
              <label for="level_id" class="form-label text-primary font-weight-bold">المرحل الدراسيه </label>
              <select name="level_id" id="level_id" class="form-control" required>
                <option value="" selected> المرحل الدراسيه </option>
                @foreach($levels as $level)
                  <option class=" text-2xl font-weight-bold" value="{{ $level->id }}">{{ $level->level_name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="row">
             <div class="col-md-6 mb-3">
              <label for="name" class="form-label text-primary font-weight-bold">اسم الطالب</label>
              <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                placeholder="اسم الطالب" required>
            </div>

             <div class="col-md-6 mb-3">
              <label for="ID" class="form-label text-primary font-weight-bold">رقم القومي</label>
              <input type="number" name="Ip" id="ID" class="form-control" value="{{ old('ID') }}" placeholder="رقم القومي"
                required>
            </div>
          </div>

          <div class="row">
             <div class="col-md-6 mb-3">
              <label for="email" class="form-label text-primary font-weight-bold">البريد الإلكتروني</label>
              <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"
                placeholder="البريد الإلكتروني" required>
            </div>

             <div class="col-md-6 mb-3">
              <label for="phone" class="form-label text-primary font-weight-bold">رقم التليفون</label>
              <input type="number" name="phone" id="phone" class="form-control" value="{{ old('phone') }}"
                placeholder="رقم التليفون" required>
            </div>
          </div>

          <br>
          <div class="text-center">
            <button type="submit" class="btn btn-success px-4 font-weight-bold">
              <i class="bi bi-save"></i> <strong>حفظ</strong>
            </button>
            <button type="button" class="btn btn-danger px-4 font-weight-bold" data-bs-dismiss="modal">
              <i class="bi bi-x"></i> <strong>إغلاق</strong>
            </button>
            
          </div>
          <br>
         </div>
      </form>

    </div>
  </div>
</div>
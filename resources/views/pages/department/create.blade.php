 <div class="accordion" id="facultyAccordion">
  <div class="card">
    <!--  accordion header -->
    <div class="card-header bg-dark text-white h3" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link text-white text-2xl font-weight-bold" type="button" data-toggle="collapse"
          data-target="#collapseCreate" aria-expanded="true" aria-controls="collapseCreate">
          <i class="bi bi-building"></i> ✨ <strong class=" h3">اضافة برنامج تعليمي جديد</strong>
        </button>
      </h2>
    </div>
    <br>

    <!--  accordion content   -->
    <div id="collapseCreate" class="collapse show " aria-labelledby="headingOne" data-parent="#facultyAccordion">
      <div class="card-body bg-white">
        <br>
        <div class="text-danger font-weight-bold">
          @include('include.validation')
        </div>
        <br>

        <form action="{{ route('departments.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="row">
             <div class="form-group col-md-6">
              <label for="name" class="font-weight-bold text-primary">
                <i class="bi bi-person-fill"></i> اسم البرنامج التعليمي
              </label>
              <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                placeholder="أدخل اسم البرنامج">
            </div>

             <div class="form-group col-md-6">
              <label for="description" class="font-weight-bold text-primary">
                <i class="bi bi-person-fill"></i> وصف البرنامج التعليمي
              </label>
              <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}"
                placeholder="أدخل وصف البرنامج">
            </div>
          </div>

          <div class="row">
             <div class="form-group col-md-6">
              <label for="requerd_file" class="font-weight-bold text-primary">
                <i class="bi bi-file-earmark-text-fill"></i> إضافة ملف البرنامج التعليمي
              </label>
              <input type="file" class="form-control-file" id="requerd_file" name="requerd_file" accept="application/pdf">
            </div>

             <div class="form-group col-md-6">
              <label for="dapart_image" class="font-weight-bold text-primary">
                <i class="bi bi-file-earmark-text-fill"></i> إضافة صورة البرنامج
              </label>
              <input type="file" class="form-control-file" id="dapart_image" name="dapart_image" accept="image/*">
            </div>
          </div>

           <div class="form-group">
            <label for="depart_vision" class="font-weight-bold text-primary">
              <i class="bi bi-person-bounding-box"></i> رؤية البرنامج
            </label>
            <textarea class="form-control" id="depart_vision" name="depart_vision" rows="3" placeholder="أدخل رؤية البرنامج">{{ old('depart_vision') }}</textarea>
          </div>

           <div class="form-group">
            <label for="depart_massage" class="font-weight-bold text-primary">
              <i class="bi bi-person-bounding-box"></i> رسالة البرنامج
            </label>
            <textarea class="form-control" id="depart_massage" name="depart_massage" rows="3" placeholder="أدخل رسالة البرنامج">{{ old('depart_massage') }}</textarea>
          </div>

           <div class="form-group">
            <label for="is_active" class="font-weight-bold text-primary">
              <i class="bi bi-barcode"></i> الحالة
            </label>
            <select name="is_active" id="is_active" class="form-control">
              <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>نشط</option>
              <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>غير نشط</option>
            </select>
          </div>

          <div class="d-flex justify-content-center mt-3">
            <button type="submit" class="btn btn-outline-primary font-weight-bold">✔ إضافة البرنامج</button>
            <button type="reset" class="ml-3 btn btn-outline-danger font-weight-bold">❌ إلغاء</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

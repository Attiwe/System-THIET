 @include('include.validation')
 <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <div class="modal-header text-white">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel">
          <i class="bi bi-calendar-week"></i> إضافة عناصر جوده
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route('quality_item.store') }}" method="POST">
          @csrf
         <div class="mb-3">
            <label for="name" class="form-label fw-bold">
              <i class="bi bi-calendar-date text-primary"></i> اسم العنصر
            </label>
            <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{ old('name') }} " required placeholder=" ادخل اسم العنصر ">
          </div>
           <div class="mb-3">
            <label for="quality_form_id" class="form-label fw-bold">
              <i class="bi bi-toggle-on text-success"></i> نموذج الجوده 
            </label>

            <select class="form-select form-select-lg" id="quality_form_id" name="quality_form_id" required>
              <option value="" selected>اختر نموذج الجوده</option>
              @foreach($qualityForms as $qualityForm)
                <option value="{{ $qualityForm->id }}">{{ $qualityForm->name }}</option>
              @endforeach
            </select>
          </div>
          
          <div class="modal-footer border-top-0">
            <button type="submit" class="btn btn-success px-4">
              <i class="bi bi-save"></i> حفظ
            </button>
            <button type="button" class="btn btn-danger px-4" data-bs-dismiss="modal">
              <i class="bi bi-x-circle"></i> إغلاق
            </button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
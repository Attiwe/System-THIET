 @include('include.validation')
 <div class="modal fade" id="editModal{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg border-0 rounded-3">

      <div class="modal-header text-white">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel">
          <i class="bi bi-calendar-week"></i> تعديل سؤال
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route('faqs.update', $item->id) }}" method="POST">
          @csrf
          @method('PUT')  
          <input type="hidden" name="id" value="{{ $item->id }}">

          <div class="mb-3">
            <label for="department_id" class="form-label fw-bold">
              <i class="bi bi-toggle-on text-success"></i> القسم
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

          <div class="mb-3">
            <label for="question" class="form-label fw-bold">
              <i class="bi bi-calendar-date text-primary"></i> السؤال
            </label>
            <textarea type="text" class="form-control form-control-lg" id="question" name="question"    required rows="3" placeholder="أدخل السؤال"> {{ $item->question }} </textarea>
          </div>

          <div class="mb-3">
            <label for="answer" class="form-label fw-bold">
              <i class="bi bi-toggle-on text-success"></i> الإجابة
            </label>
            <textarea type="text" class="form-control form-control-lg" id="answer" name="answer"  required rows="3" placeholder="أدخل الإجابة"> {{ $item->answer }} </textarea>
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
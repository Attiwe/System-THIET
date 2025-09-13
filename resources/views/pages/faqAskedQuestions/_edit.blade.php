 <div class="modal fade" id="editModal{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-xl border-0 rounded-3">

      <div class="modal-header text-white">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel">
          <i class="bi bi-calendar-week"></i> تعديل سؤال شائع
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route('faqAskedQuestions.update', $item->id) }}" method="POST">
          @csrf
          @method('PUT')  
          <input type="hidden" name="id" value="{{ $item->id }}">

          <div class="mb-3">
            <label for="faq_category_id" class="form-label fw-bold">
              <i class="bi bi-card-list text-info"></i> الأقسام
            </label>
            <select class="form-select form-select-lg" id="faq_category_id" name="faq_category_id" required>
              <option value="" selected>اختر القسم</option>
              @foreach($faqCategories as $faqCategory)
                <option value="{{ $faqCategory->id }}" {{ old('faq_category_id', $item->faq_category_id) == $faqCategory->id ? 'selected' : '' }}>{{ $faqCategory->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label for="question" class="form-label fw-bold">
              <i class="bi bi-question-circle text-primary"></i> السؤال
            </label>
            <input type="text" class="form-control form-control-lg text-danger" id="question" name="question" value="{{ $item->question }}"
              required>
          </div>

          <div class="mb-3">
            <label for="answer" class="form-label fw-bold">
              <i class="bi bi-question-circle-fill text-primary"></i> الإجابة
            </label>
            <textarea class="form-control form-control-lg" rows="4" id="answer" name="answer" placeholder="أدخل الإجابة" required>{{ $item->answer }}</textarea>
          </div>

          <div class="modal-footer border-top-0">
            <button type="submit" class="btn btn-success px-4">
              <i class="bi bi-save"></i>  حفظ
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
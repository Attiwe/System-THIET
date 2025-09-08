<!-- Modal -->
<div class="modal fade" id="createArticle" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="createArticleLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content border-0 rounded-3">

      <div class="modal-header  text-white">
        <h3 class="modal-title text-dark font-weight-bold" id="createArticleLabel">
          <i class="bi bi-person-plus"></i> إضافة مقال
        </h3>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-4">

          <div class="form-group">
            <label for="title" class="form-label text-primary font-weight-bold">العنوان</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}"
              placeholder="العنوان" required>
          </div>
          <br>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="date" class="form-label text-primary font-weight-bold">تاريخ النشر</label>
              <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}"
                placeholder="تاريخ النشر" required>
            </div>

            <div class="form-group col-md-6">
              <label for="is_active" class="form-label text-primary font-weight-bold">الحالة</label>
              <select name="is_active" id="is_active" class="form-control" required>
                <option value="1">مفعل</option>
                <option value="0">غير مفعل</option>
              </select>
            </div>
          </div>
          <br>  
          <div class="form-group">
            <label for="description" class="form-label text-primary font-weight-bold">التفاصيل</label>
            <textarea name="description" id="description" class="form-control" style="height: 100px"
              required></textarea>
          </div>
          <br>  
          <div class="form-group">
            <label for="image_article" class="form-label text-primary font-weight-bold">الصوره</label>
            <input type="file" name="image_article" id="image_article" class="form-control" value="{{ old('image_article') }}"
              placeholder="الصوره" required>
          </div>
          <br>
          <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success px-4 font-weight-bold me-2">
              <i class="bi bi-save"></i> <strong>حفظ</strong>
            </button>
            <button type="button" class="btn btn-danger px-4 font-weight-bold me-2" data-bs-dismiss="modal">
              <i class="bi bi-x"></i> <strong>إغلاق</strong>
            </button>
          </div>

        </div>
      </form>

    </div>
  </div>
</div>
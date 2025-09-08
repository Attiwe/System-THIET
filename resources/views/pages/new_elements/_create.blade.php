<!-- Modal -->
<div class="modal fade" id="createArticle" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="createArticleLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 rounded-3">

      <div class="modal-header  text-white">
        <h3 class="modal-title text-dark font-weight-bold" id="createArticleLabel">
          <i class="bi bi-person-plus"></i> إضافة عنصر  خبر 
        </h3>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('new_elements.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-4">

          <div class="form-group">
            <label for="name" class="form-label text-primary font-weight-bold"> <i class="bi bi-newspaper"></i>   اسم العنصر  الخبر </label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
              placeholder="اسم العنصر" required>
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
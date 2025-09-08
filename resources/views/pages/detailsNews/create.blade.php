<div class="accordion" id="facultyAccordion">
  <div class="card">
    <!--  accordion header -->
    <div class="card-header bg-dark text-white h3" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link text-white text-2xl font-weight-bold" type="button" data-toggle="collapse"
          data-target="#collapseCreate" aria-expanded="true" aria-controls="collapseCreate">
          <i class="bi bi-person-plus-fill"></i> <strong class=" h3">اضافة خبر جديد </strong>
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
        <form action="{{ route('detailsNews.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="row">
            <div class="form-group col-md-6 mb-3">
              <label for="title" class="font-weight-bold lead mb-0"> اسم الخبر </label>
              <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required
                placeholder="أدخل اسم الخبر">
            </div>

            <div class="form-group col-md-6 mb-3">
              <label for="publisher" class="font-weight-bold lead mb-0">الناشر</label>
              <input type="text" class="form-control" id="publisher" name="publisher" value="{{ old('publisher') }}"
                required placeholder="أدخل اسم الناشر">
            </div>

          </div>

          <div class="form-group  ">
            <label for="new_element_id" class="font-weight-bold lead"> اسم العنصر </label>
            <select name="new_element_id" id="new_element_id" class="form-control" required>
              <option value="" selected>اختر العنصر</option>
              @foreach ($newElements as $newElement)
                <option value="{{ $newElement->id }}">{{ $newElement->name }}</option>
              @endforeach
            </select>
          </div>


          <div class="form-group">
            <label for="description" class="font-weight-bold lead">الوصف</label>
            <textarea class="form-control" id="description" name="description" rows="4" required
              placeholder="أدخل وصف الخبر ان امكن"></textarea>
          </div>

          <div class="form-group">
            <label for="image" class="font-weight-bold lead"> الصورة </label>
            <input type="file" class="form-control-file" id="image" name="image" value="{{ old('image') }}"
              accept="image/*" required>
          </div>
          <br>
          <div class="d-flex justify-content-center mt-3">
            <button type="submit" class="btn btn-success mb-3 lead">✔ اضافة الخبر</button>
            <br>
            <button type="reset" class="btn btn-outline-danger mb-3 lead mr-2 ">❌ إلغاء البيانات</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@extends('layouts.master')
@section('title', '   حقوق الطلابه')

@section('css')
  <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
  <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('page-header')
 <!-- breadcrumb -->
 <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div>
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> حقوق الطلاب </h2>
        <p class="mg-b-0"> يعرض جدول حقوق الطلاب </p>
      </div>
    </div>
    <div class="main-dashboard-header-right">
      <div>
        <label class="tx-13 font-weight-bold"> التاريخ </label>
        <div class="main-star text-primary">
          <span class="text-dark"> {{ now()->format('H:i A | d-m-Y') }} </span>
        </div>
      </div>
      <div>
        <label class="tx-13 font-weight-bold"> الصفحه الرئيسيه </label>
        <h5> <a class="text-danger" href="{{ route('dashboard') }}"> <i class="bi bi-house-fill"></i> الرئيسيه</a></h5>
      </div>

    </div>
  </div>
  <br>
  <br>
  <br>
  <br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">عرض حقوق الطلاب</h3>
                        <div>
                            <a href="{{ route('student-rights.edit', $studentRight) }}" class="btn btn-warning">
                                <i class="fa fa-edit"></i> تعديل
                            </a>
                            <a href="{{ route('student-rights.index') }}" class="btn btn-secondary">
                                <i class="fa fa-arrow-right"></i> العودة للقائمة
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label font-weight-bold">تفاصيل حقوق الطلاب:</label>
                                <div class="border rounded p-3 bg-light">
                                    <div style="white-space: pre-wrap; line-height: 1.8; font-size: 16px;">
                                        {{ $studentRight->details }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label font-weight-bold">تاريخ الإنشاء:</label>
                                <div class="border rounded p-2 bg-light">
                                    {{ $studentRight->created_at->format('Y-m-d H:i:s') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label font-weight-bold">آخر تحديث:</label>
                                <div class="border rounded p-2 bg-light">
                                    {{ $studentRight->updated_at->format('Y-m-d H:i:s') }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label font-weight-bold">معرف السجل:</label>
                                <div class="border rounded p-2 bg-light">
                                    #{{ $studentRight->id }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label font-weight-bold">عدد الأحرف:</label>
                                <div class="border rounded p-2 bg-light">
                                    {{ strlen($studentRight->details) }} حرف
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('student-rights.edit', $studentRight) }}" class="btn btn-primary">
                        <i class="fa fa-edit"></i> تعديل حقوق الطلاب
                    </a>
                    <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $studentRight->id }})">
                        <i class="fa fa-trash"></i> حذف حقوق الطلاب
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">تأكيد الحذف</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                هل أنت متأكد من حذف حقوق الطلاب هذه؟ هذا الإجراء لا يمكن التراجع عنه.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">حذف</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete(id) {
    document.getElementById('deleteForm').action = '{{ route("student-rights.destroy", ":id") }}'.replace(':id', id);
    $('#deleteModal').modal('show');
}
</script>
@endsection

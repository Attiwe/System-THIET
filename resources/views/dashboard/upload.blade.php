@extends('layouts.master')

@section('page-header')
<div class="breadcrumb-header justify-content-between">
    <div class="left-content">
        <div>
            <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">رفع ملف Excel</h2>
            <p class="mg-b-0">رفع ملف Excel لعرضه وتخزينه في قاعدة البيانات</p>
        </div>
    </div>
    <div class="main-dashboard-header-right">
        <a href="{{ route('excel.data') }}" class="btn btn-info">
            <i class="fa fa-list"></i> عرض البيانات
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <h4 class="card-title mg-b-0">رفع ملف Excel</h4>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('excel.preview') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                    @csrf
                    <div class="form-group">
                        <label for="file">اختر ملف Excel</label>
                        <input type="file" class="form-control-file" id="file" name="file" accept=".xlsx,.xls,.csv" required>
                        <small class="form-text text-muted">الملفات المدعومة: .xlsx, .xls, .csv</small>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-eye"></i> معاينة البيانات
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
$(document).ready(function() {
    $('#uploadForm').on('submit', function() {
        var fileInput = $('#file')[0];
        if(fileInput.files.length === 0) {
            alert('الرجاء اختيار ملف');
            return false;
        }
        $(this).find('button[type="submit"]').prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> جاري المعاينة...');
    });
});
</script>
@endsection

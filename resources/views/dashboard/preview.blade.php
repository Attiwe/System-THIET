@extends('layouts.master')

@section('page-header')
<div class="breadcrumb-header justify-content-between">
    <div class="left-content">
        <div>
            <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">معاينة بيانات Excel</h2>
            <p class="mg-b-0">راجع البيانات قبل الحفظ في قاعدة البيانات</p>
        </div>
    </div>
    <div class="main-dashboard-header-right">
        <a href="{{ route('excel.upload.form') }}" class="btn btn-secondary">
            <i class="fa fa-arrow-right"></i> رجوع
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <h4 class="card-title mg-b-0">معاينة البيانات</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('excel.import') }}" method="POST" id="importForm">
                    @csrf
                    <input type="hidden" name="sheetData" value="{{ json_encode($sheetData) }}">
                    <input type="hidden" name="columns" value="{{ json_encode($columns) }}">

                    <div class="table-responsive mb-3">
                        <table class="table table-bordered table-striped table-hover text-center">
                            <thead class="bg-primary text-white">
                                <tr>
                                    @foreach($columns as $col)
                                        <th>{{ $col }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sheetData as $row)
                                    <tr>
                                        @foreach($columns as $col)
                                            <td>{{ $row[$col] ?? '' }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="alert alert-info">
                        <i class="fa fa-info-circle"></i> 
                        سيتم حفظ <strong>{{ count($sheetData) }}</strong> صف في قاعدة البيانات
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('excel.upload.form') }}" class="btn btn-secondary">
                            <i class="fa fa-times"></i> إلغاء
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-save"></i> حفظ في قاعدة البيانات
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
$(document).ready(function() {
    $('#importForm').on('submit', function() {
        $(this).find('button[type="submit"]').prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> جاري الحفظ...');
    });
});
</script>
@endsection

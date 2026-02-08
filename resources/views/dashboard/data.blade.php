@extends('layouts.master')

@section('page-header')
<div class="breadcrumb-header justify-content-between">
    <div class="left-content">
        <div>
            <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">بيانات المكتبة</h2>
            <p class="mg-b-0">إدارة بيانات ملفات Excel</p>
        </div>
    </div>
    <div class="main-dashboard-header-right">
        <a href="{{ route('excel.upload.form') }}" class="btn btn-primary">
            <i class="fa fa-upload"></i> رفع ملف Excel جديد
        </a>
    </div>
</div>
@endsection

@section('content')
<!-- إحصائيات -->
@if(count($allData) > 0)
<div class="row row-sm">
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden sales-card bg-primary-gradient">
            <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                <div class="">
                    <h6 class="mb-3 tx-12 text-white">إجمالي السجلات</h6>
                </div>
                <div class="pb-0 mt-0">
                    <div class="d-flex">
                        <div class="">
                            <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ count($allData) }}</h4>
                            <p class="mb-0 tx-12 text-white op-7">سجل</p>
                        </div>
                        <span class="float-right my-auto mr-auto">
                            <i class="fas fa-book text-white"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden sales-card bg-success-gradient">
            <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                <div class="">
                    <h6 class="mb-3 tx-12 text-white">عدد الأعمدة</h6>
                </div>
                <div class="pb-0 mt-0">
                    <div class="d-flex">
                        <div class="">
                            <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ count($columns) }}</h4>
                            <p class="mb-0 tx-12 text-white op-7">عمود</p>
                        </div>
                        <span class="float-right my-auto mr-auto">
                            <i class="fas fa-columns text-white"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden sales-card bg-info-gradient">
            <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                <div class="">
                    <h6 class="mb-3 tx-12 text-white">آخر تحديث</h6>
                </div>
                <div class="pb-0 mt-0">
                    <div class="d-flex">
                        <div class="">
                            <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ date('Y-m-d') }}</h4>
                            <p class="mb-0 tx-12 text-white op-7">تاريخ</p>
                        </div>
                        <span class="float-right my-auto mr-auto">
                            <i class="fas fa-calendar text-white"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden sales-card bg-warning-gradient">
            <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                <div class="">
                    <h6 class="mb-3 tx-12 text-white">حالة البيانات</h6>
                </div>
                <div class="pb-0 mt-0">
                    <div class="d-flex">
                        <div class="">
                            <h4 class="tx-20 font-weight-bold mb-1 text-white">نشط</h4>
                            <p class="mb-0 tx-12 text-white op-7">جاهز للاستخدام</p>
                        </div>
                        <span class="float-right my-auto mr-auto">
                            <i class="fas fa-check-circle text-white"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title mg-b-0">قائمة البيانات</h4>
                    @if(count($allData) > 0)
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-success" id="exportBtn">
                            <i class="fa fa-download"></i> تصدير Excel
                        </button>
                    </div>
                    @endif
                </div>
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <i class="fa fa-check-circle"></i> {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        <i class="fa fa-exclamation-circle"></i> {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
            <div class="card-body">
                @if(count($allData) > 0)
                <!-- شريط البحث والتصفية -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" id="searchInput" placeholder="ابحث في البيانات...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control" id="columnFilter">
                            <option value="">جميع الأعمدة</option>
                            @foreach($columns as $col)
                                <option value="{{ $col }}">{{ $col }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-secondary btn-block" id="clearSearch">
                            <i class="fa fa-refresh"></i> إعادة تعيين
                        </button>
                    </div>
                </div>

                <!-- معلومات البحث -->
                <div class="alert alert-info mb-3" id="searchInfo" style="display: none;">
                    <i class="fa fa-info-circle"></i> <span id="searchCount">0</span> نتيجة للبحث
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center" id="dataTable">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th style="width: 60px;">#</th>
                                @foreach($columns as $col)
                                    <th class="sortable" data-column="{{ $col }}">
                                        {{ $col }}
                                        <i class="fa fa-sort float-left"></i>
                                    </th>
                                @endforeach
                                <th style="width: 150px;">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach($allData as $index => $row)
                                <tr id="row-{{ $row['id'] }}" data-index="{{ $index }}">
                                    <td>{{ $index + 1 }}</td>
                                    @foreach($columns as $col)
                                        <td class="col-{{ $col }}" data-col="{{ $col }}">{{ $row[$col] ?? '' }}</td>
                                    @endforeach
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-info edit-btn" data-id="{{ $row['id'] }}" data-toggle="modal" data-target="#editModal" title="تعديل">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $row['id'] }}" title="حذف">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- رسالة عدم وجود نتائج -->
                <div class="alert alert-warning text-center" id="noResults" style="display: none;">
                    <i class="fa fa-exclamation-triangle"></i> لا توجد نتائج مطابقة للبحث
                </div>
                @else
                <div class="alert alert-info text-center">
                    <i class="fa fa-info-circle fa-3x mb-3"></i>
                    <h5>لا توجد بيانات</h5>
                    <p>لم يتم رفع أي ملفات Excel بعد</p>
                    <a href="{{ route('excel.upload.form') }}" class="btn btn-primary">
                        <i class="fa fa-upload"></i> رفع ملف Excel
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Modal للتعديل -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="editModalLabel">
                    <i class="fa fa-edit"></i> تعديل البيانات
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="id" id="edit_id">
                <div class="modal-body">
                    <div id="editFields"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fa fa-times"></i> إلغاء
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> حفظ التغييرات
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script>
$(document).ready(function() {
    // الحصول على CSRF token
    var csrfToken = $('meta[name="csrf-token"]').attr('content') || $('input[name="_token"]').val();
    var columns = @json($columns);
    var allData = @json($allData);
    var sortDirection = {};
    
    // البحث في الجدول
    $('#searchInput').on('keyup', function() {
        var searchText = $(this).val().toLowerCase();
        var columnFilter = $('#columnFilter').val();
        var visibleRows = 0;
        
        $('#tableBody tr').each(function() {
            var row = $(this);
            var found = false;
            
            if(columnFilter) {
                // البحث في عمود محدد
                var cellText = row.find('.col-' + columnFilter).text().toLowerCase();
                found = cellText.includes(searchText);
            } else {
                // البحث في جميع الأعمدة
                row.find('td').each(function() {
                    if($(this).text().toLowerCase().includes(searchText)) {
                        found = true;
                        return false;
                    }
                });
            }
            
            if(found || searchText === '') {
                row.show();
                visibleRows++;
            } else {
                row.hide();
            }
        });
        
        // عرض/إخفاء رسالة البحث
        if(searchText !== '') {
            $('#searchInfo').show();
            $('#searchCount').text(visibleRows);
            if(visibleRows === 0) {
                $('#noResults').show();
            } else {
                $('#noResults').hide();
            }
        } else {
            $('#searchInfo').hide();
            $('#noResults').hide();
        }
    });
    
    // إعادة تعيين البحث
    $('#clearSearch').on('click', function() {
        $('#searchInput').val('');
        $('#columnFilter').val('');
        $('#searchInfo').hide();
        $('#noResults').hide();
        $('#tableBody tr').show();
    });
    
    // ترتيب الأعمدة
    $('.sortable').on('click', function() {
        var column = $(this).data('column');
        var direction = sortDirection[column] || 'asc';
        sortDirection[column] = direction === 'asc' ? 'desc' : 'asc';
        
        // تحديث الأيقونات
        $('.sortable i').removeClass('fa-sort-up fa-sort-down').addClass('fa-sort');
        $(this).find('i').removeClass('fa-sort').addClass(direction === 'asc' ? 'fa-sort-up' : 'fa-sort-down');
        
        // ترتيب الصفوف
        var rows = $('#tableBody tr').toArray();
        rows.sort(function(a, b) {
            var aVal = $(a).find('.col-' + column).text().trim();
            var bVal = $(b).find('.col-' + column).text().trim();
            
            // محاولة تحويل إلى رقم
            var aNum = parseFloat(aVal);
            var bNum = parseFloat(bVal);
            
            if(!isNaN(aNum) && !isNaN(bNum)) {
                return direction === 'asc' ? aNum - bNum : bNum - aNum;
            }
            
            // ترتيب نصي
            if(direction === 'asc') {
                return aVal.localeCompare(bVal, 'ar');
            } else {
                return bVal.localeCompare(aVal, 'ar');
            }
        });
        
        $('#tableBody').empty().append(rows);
        
        // إعادة ترقيم الصفوف
        $('#tableBody tr').each(function(index) {
            $(this).find('td:first').text(index + 1);
        });
    });
    
    // عند النقر على زر التعديل
    $(document).on('click', '.edit-btn', function() {
        var id = $(this).data('id');
        var row = $('#row-' + id);
        
        // ملء الحقول في الـ Modal
        var fieldsHtml = '';
        columns.forEach(function(col) {
            var value = row.find('.col-' + col).text().trim();
            fieldsHtml += '<div class="form-group">';
            fieldsHtml += '<label for="edit_' + col + '"><strong>' + col + '</strong></label>';
            fieldsHtml += '<input type="text" class="form-control" id="edit_' + col + '" name="data[' + col + ']" value="' + $('<div>').text(value).html() + '">';
            fieldsHtml += '</div>';
        });
        
        $('#editFields').html(fieldsHtml);
        $('#edit_id').val(id);
    });

    // عند إرسال نموذج التعديل
    $('#editForm').on('submit', function(e) {
        e.preventDefault();
        var id = $('#edit_id').val();
        var formData = {
            _token: csrfToken,
            _method: 'PUT',
            data: {}
        };
        
        // جمع البيانات من الحقول
        $('#editFields input').each(function() {
            var name = $(this).attr('name');
            if(name && name.startsWith('data[')) {
                var key = name.match(/data\[(.+)\]/)[1];
                formData.data[key] = $(this).val();
            }
        });
        
        var submitBtn = $(this).find('button[type="submit"]');
        submitBtn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> جاري الحفظ...');
        
        $.ajax({
            url: '/dashboard/data/' + id,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: formData,
            success: function(response) {
                if(response.success) {
                    $('#editModal').modal('hide');
                    location.reload();
                } else {
                    alert('حدث خطأ: ' + (response.message || 'خطأ غير معروف'));
                    submitBtn.prop('disabled', false).html('<i class="fa fa-save"></i> حفظ التغييرات');
                }
            },
            error: function(xhr) {
                var errorMsg = 'حدث خطأ أثناء التحديث';
                if(xhr.responseJSON && xhr.responseJSON.message) {
                    errorMsg = xhr.responseJSON.message;
                }
                alert(errorMsg);
                submitBtn.prop('disabled', false).html('<i class="fa fa-save"></i> حفظ التغييرات');
            }
        });
    });

    // عند النقر على زر الحذف
    $(document).on('click', '.delete-btn', function() {
        if(!confirm('هل أنت متأكد من حذف هذا السجل؟\nلا يمكن التراجع عن هذه العملية.')) {
            return;
        }
        
        var id = $(this).data('id');
        var row = $('#row-' + id);
        var btn = $(this);
        
        btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i>');
        
        $.ajax({
            url: '/dashboard/data/' + id,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: {
                _token: csrfToken,
                _method: 'DELETE'
            },
            success: function(response) {
                if(response.success) {
                    row.fadeOut(300, function() {
                        $(this).remove();
                        // إعادة ترقيم الصفوف
                        $('#tableBody tr').each(function(index) {
                            $(this).find('td:first').text(index + 1);
                        });
                        // إذا لم يعد هناك صفوف، إعادة تحميل الصفحة
                        if($('#tableBody tr').length === 0) {
                            location.reload();
                        }
                    });
                } else {
                    alert('حدث خطأ: ' + (response.message || 'خطأ غير معروف'));
                    btn.prop('disabled', false).html('<i class="fa fa-trash"></i>');
                }
            },
            error: function(xhr) {
                var errorMsg = 'حدث خطأ أثناء الحذف';
                if(xhr.responseJSON && xhr.responseJSON.message) {
                    errorMsg = xhr.responseJSON.message;
                }
                alert(errorMsg);
                btn.prop('disabled', false).html('<i class="fa fa-trash"></i>');
            }
        });
    });
    
    // تصدير إلى Excel
    $('#exportBtn').on('click', function() {
        var wb = XLSX.utils.book_new();
        var wsData = [];
        
        // إضافة رأس الجدول
        var headers = ['#'].concat(columns);
        wsData.push(headers);
        
        // إضافة البيانات
        $('#tableBody tr:visible').each(function(index) {
            var row = [index + 1];
            var $row = $(this);
            columns.forEach(function(col) {
                var value = $row.find('.col-' + col).text().trim();
                row.push(value);
            });
            wsData.push(row);
        });
        
        var ws = XLSX.utils.aoa_to_sheet(wsData);
        XLSX.utils.book_append_sheet(wb, ws, "بيانات المكتبة");
        
        // تصدير الملف
        var fileName = 'بيانات_المكتبة_' + new Date().toISOString().split('T')[0] + '.xlsx';
        XLSX.writeFile(wb, fileName);
    });
});
</script>
@endsection

@section('css')
<style>
.sortable {
    cursor: pointer;
    user-select: none;
}
.sortable:hover {
    background-color: rgba(255, 255, 255, 0.1) !important;
}
.sortable i {
    opacity: 0.5;
    transition: opacity 0.3s;
}
.sortable:hover i {
    opacity: 1;
}
#dataTable th {
    position: relative;
}
#dataTable th i {
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
}
.btn-group .btn {
    margin: 0 2px;
}
.table-responsive {
    max-height: 600px;
    overflow-y: auto;
}
</style>
@endsection

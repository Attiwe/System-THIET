@extends('layouts.master')

@section('page-header')

<br>
<br>
<br>
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">استيراد ملف (Excel/CSV)</div>
        <div class="card-body">
            <form action="{{ route('imported-books.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <input type="file" name="file" class="form-control" accept=".xlsx,.xls,.csv,.txt" required>
                </div>
                <button type="submit" class="btn btn-primary">رفع واستيراد</button>
            </form>
            <small class="text-muted d-block mt-2">الأعمدة المتوقعة بالترتيب: تاريخ الاصدار، رقم الصف، اسم الكتاب، المولف، الرقم العام، الموضيع. أو استخدم صف عناوين مطابق.</small>
        </div>
    </div>

    <div class="card">
        <div class="card-header">البيانات المستوردة</div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th>تاريخ الاصدار</th>
                            <th>رقم الصف</th>
                            <th>اسم الكتاب</th>
                            <th>المولف</th>
                            <th>الرقم العام</th>
                            <th>الموضيع</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($books as $book)
                            <tr>
                                <td>{{ $book->issue_date }}</td>
                                <td>{{ $book->row_number }}</td>
                                <td>{{ $book->book_name }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->general_number }}</td>
                                <td>{{ $book->topics }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center p-4">لا توجد بيانات بعد</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $books->links() }}
        </div>
    </div>
</div>
@endsection



<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\ApiResponse;
use Illuminate\Support\Facades\DB;

class LibraryBooksController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of all library books.
     */
    public function index()
    {
        try {
            $data = DB::table('excel_data')->orderBy('id', 'desc')->get();
            $allData = [];
            $columns = [];

            foreach($data as $row){
                $decoded = json_decode($row->data, true);
                if($decoded){
                    $bookData = array_merge([
                        'id' => $row->id,
                        'created_at' => $row->created_at,
                        'updated_at' => $row->updated_at,
                    ], $decoded);
                    $allData[] = $bookData;
                    
                    // جمع جميع الأعمدة من جميع الصفوف
                    foreach(array_keys($decoded) as $col){
                        if(!in_array($col, $columns)){
                            $columns[] = $col;
                        }
                    }
                }
            }

            if (empty($allData)) {
                return $this->errorResponse('لا توجد كتب في المكتبة', 404);
            }

            $response = [
                'books' => $allData,
                'total' => count($allData),
                'columns' => $columns,
                'meta' => [
                    'total_books' => count($allData),
                    'total_columns' => count($columns),
                    'last_updated' => $data->first()->updated_at ?? null,
                ]
            ];

            return $this->successResponse($response, 'تم جلب الكتب بنجاح', 200);
        } catch (\Exception $e) {
            return $this->errorResponse('حدث خطأ أثناء جلب البيانات: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Display a specific book by ID.
     */
    public function show($id)
    {
        try {
            $row = DB::table('excel_data')->where('id', $id)->first();
            
            if(!$row){
                return $this->errorResponse('الكتاب غير موجود', 404);
            }

            $decoded = json_decode($row->data, true);
            if(!$decoded){
                return $this->errorResponse('خطأ في بيانات الكتاب', 500);
            }

            $bookData = array_merge([
                'id' => $row->id,
                'created_at' => $row->created_at,
                'updated_at' => $row->updated_at,
            ], $decoded);

            return $this->successResponse($bookData, 'تم جلب الكتاب بنجاح', 200);
        } catch (\Exception $e) {
            return $this->errorResponse('حدث خطأ أثناء جلب البيانات: ' . $e->getMessage(), 500);
        }
    }
}

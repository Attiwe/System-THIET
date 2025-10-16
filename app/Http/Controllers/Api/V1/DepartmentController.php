<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Resources\DepartmentCollection;
 use App\ApiResponse;
 

class DepartmentController extends Controller
{
    use ApiResponse;
    public function index()
    {
        $department = Department::get();
      
        if($department === null){
            return $this->errorResponse([
                'message' => 'No Data Found',
            ], 404);
        }

        $department = DepartmentCollection::make($department);

        return $this->successResponse($department, 'The department fetched successfully' ,200);
    }
}

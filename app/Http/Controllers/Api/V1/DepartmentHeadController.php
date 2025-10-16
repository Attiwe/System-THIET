<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\DepartmentHeadResource;
use App\Models\DepartmentHead;
use Illuminate\Http\Request;
use App\ApiResponse;

class DepartmentHeadController extends Controller
{
    use ApiResponse;
    public function index()
    {
        $departmentHeads = DepartmentHead::with('department','facultyMembers')->get();
       
         if(is_null($departmentHeads)){
            return $this->errorResponse('Department heads not found', 404);
        }

        $departmentHeads = DepartmentHeadResource::collection($departmentHeads);
        
        return $this->successResponse($departmentHeads, 'The department heads fetched successfully');
      }
}

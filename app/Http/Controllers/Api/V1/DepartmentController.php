<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Resources\DepartmentCollection;
use App\Http\Resources\DepartmentResource;
 use App\ApiResponse;
 

class DepartmentController extends Controller
{
    use ApiResponse;
    // public function index()
    // {
    //     $department = Department::get();
      
    //     if($department === null){
    //         return $this->errorResponse([
    //             'message' => 'No Data Found',
    //         ], 404);
    //     }

    //     $department = DepartmentCollection::make($department);

    //     return $this->successResponse($department, 'The department fetched successfully' ,200);
    // }

    // Basic Sciences department
    public function BasicSciences()
    {
        $department = Department::where('id', 1)->first();

        if (is_null($department)) {
            return $this->errorResponse('Department not found', 404);
        }

        return $this->successResponse(DepartmentResource::make($department), 'The Department fetched successfully', 200);
    }

    // Computer Engineering department
    public function ComputerEngineering()
    {
        $department = Department::where('id', 4)->first();

        if (is_null($department)) {
            return $this->errorResponse('Department not found', 404);
        }

        return $this->successResponse(DepartmentResource::make($department), 'The Department fetched successfully', 200);
    }

    // Construction and Building Engineering department
    public function ConstructionAndBuildingEngineering()
    {
        $department = Department::where('id', 2)->first();

        if (is_null($department)) {
            return $this->errorResponse('Department not found', 404);
        }

        return $this->successResponse(DepartmentResource::make($department), 'The Department fetched successfully', 200);
    }

    // Chemical Engineering department
    public function ChemicalEngineering()
    {
        $department = Department::where('id', 3)->first();

        if (is_null($department)) {
            return $this->errorResponse('Department not found', 404);
        }

        return $this->successResponse(DepartmentResource::make($department), 'The Department fetched successfully', 200);
    }
}

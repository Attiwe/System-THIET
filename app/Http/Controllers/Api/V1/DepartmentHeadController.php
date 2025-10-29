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

    // Basic Sciences department head
    public function BasicSciences()
    {
        $head = DepartmentHead::where('department_id', 1)
            ->with(['department', 'facultyMembers'])
            ->latest()
            ->first();

        if (is_null($head)) {
            return $this->errorResponse('Department head not found', 404);
        }

        return $this->successResponse(DepartmentHeadResource::make($head), 'The department head fetched successfully', 200);
    }

    // Computer Engineering department head
    public function ComputerEngineering()
    {
        $head = DepartmentHead::where('department_id', 4)
            ->with(['department', 'facultyMembers'])
            ->latest()
            ->first();

        if (is_null($head)) {
            return $this->errorResponse('Department head not found', 404);
        }

        return $this->successResponse(DepartmentHeadResource::make($head), 'The department head fetched successfully', 200);
    }

    // Construction and Building Engineering department head
    public function ConstructionAndBuildingEngineering()
    {
        $head = DepartmentHead::where('department_id', 2)
            ->with(['department', 'facultyMembers'])
            ->latest()
            ->first();

        if (is_null($head)) {
            return $this->errorResponse('Department head not found', 404);
        }

        return $this->successResponse(DepartmentHeadResource::make($head), 'The department head fetched successfully', 200);
    }

    // Chemical Engineering department head
    public function ChemicalEngineering()
    {
        $head = DepartmentHead::where('department_id', 3)
            ->with(['department', 'facultyMembers'])
            ->latest()
            ->first();

        if (is_null($head)) {
            return $this->errorResponse('Department head not found', 404);
        }

        return $this->successResponse(DepartmentHeadResource::make($head), 'The department head fetched successfully', 200);
    }
}

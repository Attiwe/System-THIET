<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Lab;
use App\ApiResponse;

class LabController extends Controller
{
    use ApiResponse;

    // Basic Sciences department labs
    public function BasicSciences()
    {
        $lab = Lab::where('department_id', 1)
            ->with('department:id,name')
            ->select('id', 'lab_pdf', 'department_id')
            ->latest()
            ->first();

        if (is_null($lab)) {
            return $this->errorResponse('Lab not found data not found', 404);
        }

        $departmentName = $lab->department?->name ?? 'Unknown Department';

        $data = [
            'department_name' => $departmentName,
             'lab_pdf' => $lab->lab_pdf ? asset('storage/labs/' . $lab->lab_pdf) : null,
         ];

        return $this->successResponse($data, 'The Lab fetched successfully', 200);
    }

    // Computer Engineering department labs
    public function ComputerEngineering()
    {
        $lab = Lab::where('department_id', 4)
            ->with('department:id,name')
            ->select('id', 'lab_pdf', 'department_id')
            ->latest()
            ->first();

        if (is_null($lab)) {
            return $this->errorResponse('Lab not found data not found', 404);
        }

        $departmentName = $lab->department?->name ?? 'Unknown Department';

        $data = [
            'department_name' => $departmentName,
            'lab_pdf' => $lab->lab_pdf ? asset('storage/labs/' . $lab->lab_pdf) : null,
        ];

        return $this->successResponse($data, 'The Lab fetched successfully', 200);
    }

    // Construction and Building Engineering department labs
    public function ConstructionAndBuildingEngineering()
    {
        $lab = Lab::where('department_id', 2)
            ->with('department:id,name')
            ->select('id', 'lab_pdf', 'department_id')
            ->latest()
            ->first();

        if (is_null($lab)) {
            return $this->errorResponse('Lab not found data not found', 404);
        }

        $departmentName = $lab->department?->name ?? 'Unknown Department';

        $data = [
            'department_name' => $departmentName,
            'lab_pdf' => $lab->lab_pdf ? asset('storage/labs/' . $lab->lab_pdf) : null,
        ];

        return $this->successResponse($data, 'The Lab fetched successfully', 200);
    }

    // Chemical Engineering department labs
    public function ChemicalEngineering()
    {
        $lab = Lab::where('department_id', 3)
            ->with('department:id,name')
            ->select('id', 'lab_pdf', 'department_id')
            ->latest()
            ->first();

        if (is_null($lab)) {
            return $this->errorResponse('Lab not found data not found', 404);
        }

        $departmentName = $lab->department?->name ?? 'Unknown Department';

        $data = [
            'department_name' => $departmentName,
            'lab_pdf' => $lab->lab_pdf ? asset('storage/labs/' . $lab->lab_pdf) : null,
        ];

        return $this->successResponse($data, 'The Lab fetched successfully', 200);
    }
}



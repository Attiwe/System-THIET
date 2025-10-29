<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\ClassTraining;
use App\ApiResponse;

class ClassTrainingController extends Controller
{
    use ApiResponse;

    // Basic Sciences department class trainings
    public function BasicSciences()
    {
        $classTraining = ClassTraining::where('department_id', 1)
            ->with('department:id,name')
            ->select('id', 'class_name', 'class_image', 'department_id')
            ->latest()
            ->first();

        if (is_null($classTraining)) {
            return $this->errorResponse('ClassTraining not found data not found', 404);
        }

        $departmentName = $classTraining->department?->name ?? 'Unknown Department';

        $data = [
            'department_name' => $departmentName,
            'class_name' => $classTraining->class_name,
            'class_image' => $classTraining->class_image ? asset('storage/class_trainings/images/' . $classTraining->class_image) : null,
        ];

        return $this->successResponse($data, 'The ClassTraining fetched successfully', 200);
    }

    // Computer Engineering department class trainings
    public function ComputerEngineering()
    {
        $classTraining = ClassTraining::where('department_id', 4)
            ->with('department:id,name')
            ->select('id', 'class_name', 'class_image', 'department_id')
            ->latest()
            ->first();

        if (is_null($classTraining)) {
            return $this->errorResponse('ClassTraining not found data not found', 404);
        }

        $departmentName = $classTraining->department?->name ?? 'Unknown Department';

        $data = [
            'department_name' => $departmentName,
            'class_name' => $classTraining->class_name,
            'class_image' => $classTraining->class_image ? asset('storage/class_trainings/images/' . $classTraining->class_image) : null,
        ];

        return $this->successResponse($data, 'The ClassTraining fetched successfully', 200);
    }

    // Construction and Building Engineering department class trainings
    public function ConstructionAndBuildingEngineering()
    {
        $classTraining = ClassTraining::where('department_id', 2)
            ->with('department:id,name')
            ->select('id', 'class_name', 'class_image', 'department_id')
            ->latest()
            ->first();

        if (is_null($classTraining)) {
            return $this->errorResponse('ClassTraining not found data not found', 404);
        }

        $departmentName = $classTraining->department?->name ?? 'Unknown Department';

        $data = [
            'department_name' => $departmentName,
            'class_name' => $classTraining->class_name,
            'class_image' => $classTraining->class_image ? asset('storage/class_trainings/images/' . $classTraining->class_image) : null,
        ];

        return $this->successResponse($data, 'The ClassTraining fetched successfully', 200);
    }

    // Chemical Engineering department class trainings
    public function ChemicalEngineering()
    {
        $classTraining = ClassTraining::where('department_id', 3)
            ->with('department:id,name')
            ->select('id', 'class_name', 'class_image', 'department_id')
            ->latest()
            ->first();

        if (is_null($classTraining)) {
            return $this->errorResponse('ClassTraining not found data not found', 404);
        }

        $departmentName = $classTraining->department?->name ?? 'Unknown Department';

        $data = [
            'department_name' => $departmentName,
            'class_name' => $classTraining->class_name,
            'class_image' => $classTraining->class_image ? asset('storage/class_trainings/images/' . $classTraining->class_image) : null,
        ];

        return $this->successResponse($data, 'The ClassTraining fetched successfully', 200);
    }
}

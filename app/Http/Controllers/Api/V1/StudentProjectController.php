<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\StudentProject;
use App\ApiResponse;

class StudentProjectController extends Controller
{
    use ApiResponse;

    // Basic Sciences department student projects
    public function BasicSciences()
    {
        $studentProject = StudentProject::where('department_id', 1)
            ->with('department:id,name')
            ->select('id', 'doctor_name', 'project_name', 'description', 'image_work', 'project_pdf', 'department_id')
            ->latest()
            ->first();

        if (is_null($studentProject)) {
            return $this->errorResponse('StudentProject not found data not found', 404);
        }

        $departmentName = $studentProject->department?->name ?? 'Unknown Department';

        $data = [
            'department_name' => $departmentName,
            'doctor_name' => $studentProject->doctor_name,
            'project_name' => $studentProject->project_name,
            'description' => $studentProject->description,
            'image_work' => $studentProject->image_work ? asset('storage/student_projects/images/' . $studentProject->image_work) : null,
            'project_pdf' => $studentProject->project_pdf ? asset('storage/student_projects/pdfs/' . $studentProject->project_pdf) : null,
        ];

        return $this->successResponse($data, 'The StudentProject fetched successfully', 200);
    }

    // Computer Engineering department student projects
    public function ComputerEngineering()
    {
        $studentProject = StudentProject::where('department_id', 4)
            ->with('department:id,name')
            ->select('id', 'doctor_name', 'project_name', 'description', 'image_work', 'project_pdf', 'department_id')
            ->latest()
            ->first();

        if (is_null($studentProject)) {
            return $this->errorResponse('StudentProject not found data not found', 404);
        }

        $departmentName = $studentProject->department?->name ?? 'Unknown Department';

        $data = [
            'department_name' => $departmentName,
            'doctor_name' => $studentProject->doctor_name,
            'project_name' => $studentProject->project_name,
            'description' => $studentProject->description,
            'image_work' => $studentProject->image_work ? asset('storage/student_projects/images/' . $studentProject->image_work) : null,
            'project_pdf' => $studentProject->project_pdf ? asset('storage/student_projects/pdfs/' . $studentProject->project_pdf) : null,
        ];

        return $this->successResponse($data, 'The StudentProject fetched successfully', 200);
    }

    // Construction and Building Engineering department student projects
    public function ConstructionAndBuildingEngineering()
    {
        $studentProject = StudentProject::where('department_id', 2)
            ->with('department:id,name')
            ->select('id', 'doctor_name', 'project_name', 'description', 'image_work', 'project_pdf', 'department_id')
            ->latest()
            ->first();

        if (is_null($studentProject)) {
            return $this->errorResponse('StudentProject not found data not found', 404);
        }

        $departmentName = $studentProject->department?->name ?? 'Unknown Department';

        $data = [
            'department_name' => $departmentName,
            'doctor_name' => $studentProject->doctor_name,
            'project_name' => $studentProject->project_name,
            'description' => $studentProject->description,
            'image_work' => $studentProject->image_work ? asset('storage/student_projects/images/' . $studentProject->image_work) : null,
            'project_pdf' => $studentProject->project_pdf ? asset('storage/student_projects/pdfs/' . $studentProject->project_pdf) : null,
        ];

        return $this->successResponse($data, 'The StudentProject fetched successfully', 200);
    }

    // Chemical Engineering department student projects
    public function ChemicalEngineering()
    {
        $studentProject = StudentProject::where('department_id', 3)
            ->with('department:id,name')
            ->select('id', 'doctor_name', 'project_name', 'description', 'image_work', 'project_pdf', 'department_id')
            ->latest()
            ->first();

        if (is_null($studentProject)) {
            return $this->errorResponse('StudentProject not found data not found', 404);
        }

        $departmentName = $studentProject->department?->name ?? 'Unknown Department';

        $data = [
            'department_name' => $departmentName,
            'doctor_name' => $studentProject->doctor_name,
            'project_name' => $studentProject->project_name,
            'description' => $studentProject->description,
            'image_work' => $studentProject->image_work ? asset('storage/student_projects/images/' . $studentProject->image_work) : null,
            'project_pdf' => $studentProject->project_pdf ? asset('storage/student_projects/pdfs/' . $studentProject->project_pdf) : null,
        ];

        return $this->successResponse($data, 'The StudentProject fetched successfully', 200);
    }
}

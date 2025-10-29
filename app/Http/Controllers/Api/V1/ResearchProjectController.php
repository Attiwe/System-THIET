<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\ResearchProject;
use App\ApiResponse;

class ResearchProjectController extends Controller
{
    use ApiResponse;

    // Basic Sciences department research projects
    public function BasicSciences()
    {
        $researchProject = ResearchProject::where('department_id', 1)
            ->with('department:id,name')
            ->select('id', 'doctor_name', 'research_name', 'research_title', 'research_summary', 'file_path', 'image', 'department_id')
            ->latest()
            ->first();

        if (is_null($researchProject)) {
            return $this->errorResponse('ResearchProject not found data not found', 404);
        }

        $departmentName = $researchProject->department?->name ?? 'Unknown Department';

        $data = [
            'department_name' => $departmentName,
            'doctor_name' => $researchProject->doctor_name,
            'research_name' => $researchProject->research_name,
            'research_title' => $researchProject->research_title,
            'research_summary' => $researchProject->research_summary,
            'file_path' => $researchProject->file_path ? asset('storage/research_projects/' . $researchProject->file_path) : null,
            'image' => $researchProject->image ? asset('storage/research_projects/images/' . $researchProject->image) : null,
        ];

        return $this->successResponse($data, 'The ResearchProject fetched successfully', 200);
    }

    // Computer Engineering department research projects
    public function ComputerEngineering()
    {
        $researchProject = ResearchProject::where('department_id', 4)
            ->with('department:id,name')
            ->select('id', 'doctor_name', 'research_name', 'research_title', 'research_summary', 'file_path', 'image', 'department_id')
            ->latest()
            ->first();

        if (is_null($researchProject)) {
            return $this->errorResponse('ResearchProject not found data not found', 404);
        }

        $departmentName = $researchProject->department?->name ?? 'Unknown Department';

        $data = [
            'department_name' => $departmentName,
            'doctor_name' => $researchProject->doctor_name,
            'research_name' => $researchProject->research_name,
            'research_title' => $researchProject->research_title,
            'research_summary' => $researchProject->research_summary,
            'file_path' => $researchProject->file_path ? asset('storage/research_projects/' . $researchProject->file_path) : null,
            'image' => $researchProject->image ? asset('storage/research_projects/images/' . $researchProject->image) : null,
        ];

        return $this->successResponse($data, 'The ResearchProject fetched successfully', 200);
    }

    // Construction and Building Engineering department research projects
    public function ConstructionAndBuildingEngineering()
    {
        $researchProject = ResearchProject::where('department_id', 2)
            ->with('department:id,name')
            ->select('id', 'doctor_name', 'research_name', 'research_title', 'research_summary', 'file_path', 'image', 'department_id')
            ->latest()
            ->first();

        if (is_null($researchProject)) {
            return $this->errorResponse('ResearchProject not found data not found', 404);
        }

        $departmentName = $researchProject->department?->name ?? 'Unknown Department';

        $data = [
            'department_name' => $departmentName,
            'doctor_name' => $researchProject->doctor_name,
            'research_name' => $researchProject->research_name,
            'research_title' => $researchProject->research_title,
            'research_summary' => $researchProject->research_summary,
            'file_path' => $researchProject->file_path ? asset('storage/research_projects/' . $researchProject->file_path) : null,
            'image' => $researchProject->image ? asset('storage/research_projects/images/' . $researchProject->image) : null,
        ];

        return $this->successResponse($data, 'The ResearchProject fetched successfully', 200);
    }

    // Chemical Engineering department research projects
    public function ChemicalEngineering()
    {
        $researchProject = ResearchProject::where('department_id', 3)
            ->with('department:id,name')
            ->select('id', 'doctor_name', 'research_name', 'research_title', 'research_summary', 'file_path', 'image', 'department_id')
            ->latest()
            ->first();

        if (is_null($researchProject)) {
            return $this->errorResponse('ResearchProject not found data not found', 404);
        }

        $departmentName = $researchProject->department?->name ?? 'Unknown Department';

        $data = [
            'department_name' => $departmentName,
            'doctor_name' => $researchProject->doctor_name,
            'research_name' => $researchProject->research_name,
            'research_title' => $researchProject->research_title,
            'research_summary' => $researchProject->research_summary,
            'file_path' => $researchProject->file_path ? asset('storage/research_projects/' . $researchProject->file_path) : null,
            'image' => $researchProject->image ? asset('storage/research_projects/images/' . $researchProject->image) : null,
        ];

        return $this->successResponse($data, 'The ResearchProject fetched successfully', 200);
    }
}

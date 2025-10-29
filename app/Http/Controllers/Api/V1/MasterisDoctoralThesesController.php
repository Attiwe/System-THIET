<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\MasterisDoctoralTheses;
use App\ApiResponse;

class MasterisDoctoralThesesController extends Controller
{
    use ApiResponse;

    // Collect all theses across departments
    public function index()
    {
        $theses = MasterisDoctoralTheses::with('department:id,name')
            ->select('id', 'department_id', 'thesis_pdf', 'doctor_name', 'title_thesis', 'type')
            ->latest()
            ->get();

        if ($theses->isEmpty()) {
            return $this->errorResponse('No theses found', 404);
        }

        $data = $theses->map(function ($thesis) {
            return [
                'id' => $thesis->id,
                'department_name' => $thesis->department?->name ?? 'Unknown Department',
                'doctor_name' => $thesis->doctor_name,
                'title_thesis' => $thesis->title_thesis,
                'type' => $thesis->type,
                'thesis_pdf' => $thesis->thesis_pdf ? asset('storage/theses/' . $thesis->thesis_pdf) : null,
            ];
        });

        return $this->successResponse($data, 'Theses fetched successfully', 200);
    }

    // Basic Sciences department theses
    public function BasicSciences()
    {
        $theses = MasterisDoctoralTheses::where('department_id', 1)
            ->with('department:id,name')
            ->select('id', 'department_id', 'thesis_pdf', 'doctor_name', 'title_thesis', 'type')
            ->latest()
            ->get();

        if ($theses->isEmpty()) {
            return $this->errorResponse('No theses found', 404);
        }

        $data = $theses->map(function ($thesis) {
            return [
                'id' => $thesis->id,
                'department_name' => $thesis->department?->name ?? 'Unknown Department',
                'doctor_name' => $thesis->doctor_name,
                'title_thesis' => $thesis->title_thesis,
                'type' => $thesis->type,
                'thesis_pdf' => $thesis->thesis_pdf ? asset('storage/theses/' . $thesis->thesis_pdf) : null,
            ];
        });

        return $this->successResponse($data, 'Theses fetched successfully', 200);
    }

    // Computer Engineering department theses
    public function ComputerEngineering()
    {
        $theses = MasterisDoctoralTheses::where('department_id', 4)
            ->with('department:id,name')
            ->select('id', 'department_id', 'thesis_pdf', 'doctor_name', 'title_thesis', 'type')
            ->latest()
            ->get();

        if ($theses->isEmpty()) {
            return $this->errorResponse('No theses found', 404);
        }

        $data = $theses->map(function ($thesis) {
            return [
                'id' => $thesis->id,
                'department_name' => $thesis->department?->name ?? 'Unknown Department',
                'doctor_name' => $thesis->doctor_name,
                'title_thesis' => $thesis->title_thesis,
                'type' => $thesis->type,
                'thesis_pdf' => $thesis->thesis_pdf ? asset('storage/theses/' . $thesis->thesis_pdf) : null,
            ];
        });

        return $this->successResponse($data, 'Theses fetched successfully', 200);
    }

    // Construction and Building Engineering department theses
    public function ConstructionAndBuildingEngineering()
    {
        $theses = MasterisDoctoralTheses::where('department_id', 2)
            ->with('department:id,name')
            ->select('id', 'department_id', 'thesis_pdf', 'doctor_name', 'title_thesis', 'type')
            ->latest()
            ->get();

        if ($theses->isEmpty()) {
            return $this->errorResponse('No theses found', 404);
        }

        $data = $theses->map(function ($thesis) {
            return [
                'id' => $thesis->id,
                'department_name' => $thesis->department?->name ?? 'Unknown Department',
                'doctor_name' => $thesis->doctor_name,
                'title_thesis' => $thesis->title_thesis,
                'type' => $thesis->type,
                'thesis_pdf' => $thesis->thesis_pdf ? asset('storage/theses/' . $thesis->thesis_pdf) : null,
            ];
        });

        return $this->successResponse($data, 'Theses fetched successfully', 200);
    }

    // Chemical Engineering department theses
    public function ChemicalEngineering()
    {
        $theses = MasterisDoctoralTheses::where('department_id', 3)
            ->with('department:id,name')
            ->select('id', 'department_id', 'thesis_pdf', 'doctor_name', 'title_thesis', 'type')
            ->latest()
            ->get();

        if ($theses->isEmpty()) {
            return $this->errorResponse('No theses found', 404);
        }

        $data = $theses->map(function ($thesis) {
            return [
                'id' => $thesis->id,
                'department_name' => $thesis->department?->name ?? 'Unknown Department',
                'doctor_name' => $thesis->doctor_name,
                'title_thesis' => $thesis->title_thesis,
                'type' => $thesis->type,
                'thesis_pdf' => $thesis->thesis_pdf ? asset('storage/theses/' . $thesis->thesis_pdf) : null,
            ];
        });

        return $this->successResponse($data, 'Theses fetched successfully', 200);
    }
}



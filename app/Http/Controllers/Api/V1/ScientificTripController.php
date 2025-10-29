<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\ScientificTrip;
use App\ApiResponse;

class ScientificTripController extends Controller
{
    use ApiResponse;

    // Basic Sciences department scientific trips
    public function BasicSciences()
    {
        $scientificTrip = ScientificTrip::where('department_id', 1)
            ->with('department:id,name')
            ->select('id', 'doctor_name', 'trip_name', 'description', 'trip_image', 'department_id')
            ->latest()
            ->first();

        if (is_null($scientificTrip)) {
            return $this->errorResponse('ScientificTrip not found data not found', 404);
        }

        $departmentName = $scientificTrip->department?->name ?? 'Unknown Department';

        $data = [
            'department_name' => $departmentName,
            'doctor_name' => $scientificTrip->doctor_name,
            'trip_name' => $scientificTrip->trip_name,
            'description' => $scientificTrip->description,
            'trip_image' => $scientificTrip->trip_image ? asset('storage/scientific_trips/images/' . $scientificTrip->trip_image) : null,
        ];

        return $this->successResponse($data, 'The ScientificTrip fetched successfully', 200);
    }

    // Computer Engineering department scientific trips
    public function ComputerEngineering()
    {
        $scientificTrip = ScientificTrip::where('department_id', 4)
            ->with('department:id,name')
            ->select('id', 'doctor_name', 'trip_name', 'description', 'trip_image', 'department_id')
            ->latest()
            ->first();

        if (is_null($scientificTrip)) {
            return $this->errorResponse('ScientificTrip not found data not found', 404);
        }

        $departmentName = $scientificTrip->department?->name ?? 'Unknown Department';

        $data = [
            'department_name' => $departmentName,
            'doctor_name' => $scientificTrip->doctor_name,
            'trip_name' => $scientificTrip->trip_name,
            'description' => $scientificTrip->description,
            'trip_image' => $scientificTrip->trip_image ? asset('storage/scientific_trips/images/' . $scientificTrip->trip_image) : null,
        ];

        return $this->successResponse($data, 'The ScientificTrip fetched successfully', 200);
    }

    // Construction and Building Engineering department scientific trips
    public function ConstructionAndBuildingEngineering()
    {
        $scientificTrip = ScientificTrip::where('department_id', 2)
            ->with('department:id,name')
            ->select('id', 'doctor_name', 'trip_name', 'description', 'trip_image', 'department_id')
            ->latest()
            ->first();

        if (is_null($scientificTrip)) {
            return $this->errorResponse('ScientificTrip not found data not found', 404);
        }

        $departmentName = $scientificTrip->department?->name ?? 'Unknown Department';

        $data = [
            'department_name' => $departmentName,
            'doctor_name' => $scientificTrip->doctor_name,
            'trip_name' => $scientificTrip->trip_name,
            'description' => $scientificTrip->description,
            'trip_image' => $scientificTrip->trip_image ? asset('storage/scientific_trips/images/' . $scientificTrip->trip_image) : null,
        ];

        return $this->successResponse($data, 'The ScientificTrip fetched successfully', 200);
    }

    // Chemical Engineering department scientific trips
    public function ChemicalEngineering()
    {
        $scientificTrip = ScientificTrip::where('department_id', 3)
            ->with('department:id,name')
            ->select('id', 'doctor_name', 'trip_name', 'description', 'trip_image', 'department_id')
            ->latest()
            ->first();

        if (is_null($scientificTrip)) {
            return $this->errorResponse('ScientificTrip not found data not found', 404);
        }

        $departmentName = $scientificTrip->department?->name ?? 'Unknown Department';

        $data = [
            'department_name' => $departmentName,
            'doctor_name' => $scientificTrip->doctor_name,
            'trip_name' => $scientificTrip->trip_name,
            'description' => $scientificTrip->description,
            'trip_image' => $scientificTrip->trip_image ? asset('storage/scientific_trips/images/' . $scientificTrip->trip_image) : null,
        ];

        return $this->successResponse($data, 'The ScientificTrip fetched successfully', 200);
    }
}

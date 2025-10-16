<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ApiResponse;
use App\Models\AcademicCouncil;
use App\Http\Resources\AcademicCouncilResource;

class AcademicCouncilController extends Controller
{
    use ApiResponse;
    

    public function index()
    {
        $academicCouncils = AcademicCouncil::latest()->first();
        if(is_null($academicCouncils)){
            return $this->errorResponse(' Not found data', 404);
        }

        $academicCouncils = AcademicCouncilResource::make($academicCouncils);

        return $this->successResponse($academicCouncils, 'The academic councils fetched successfully' ,200);
    }
    
}

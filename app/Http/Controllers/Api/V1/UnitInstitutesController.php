<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UnitInstitutes;
use App\Http\Resources\UnitInstitutesResource;
use App\ApiResponse;
use Illuminate\Support\Facades\Log;

class UnitInstitutesController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $unitInstitutes = UnitInstitutes::select('id', 'vision', 'message', 'description', 'image')
            ->active()
            ->first();
     
        if (is_null($unitInstitutes)) {  
            Log::error('Unit institutes not found');
            return $this->errorResponse('Unit institutes not found', 404);
        }
    
        $unitInstitutes = UnitInstitutesResource::make($unitInstitutes);
    
        return $this->successResponse($unitInstitutes, 'The unit institutes fetched successfully');
    }
    
}

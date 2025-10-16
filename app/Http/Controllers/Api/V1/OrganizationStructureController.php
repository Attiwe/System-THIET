<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrganizationStructure;
use App\ApiResponse;
use App\Http\Resources\OrganizationStructureResource;

class OrganizationStructureController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $organizationStructures = OrganizationStructure::select('id', 'file_path')
        ->first();

        if(is_null($organizationStructures)){
            return $this->errorResponse('Organization structures not found', 404);
        }

        $organizationStructures = OrganizationStructureResource::make($organizationStructures);
        
        return $this->successResponse($organizationStructures, 'The organization structures fetched successfully');
    }
}

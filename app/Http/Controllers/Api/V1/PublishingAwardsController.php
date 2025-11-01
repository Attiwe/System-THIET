<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\ApiResponse;
use App\Models\PublishingAwards;
use App\Http\Resources\PublishingAwardsResource;

class PublishingAwardsController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of the publishing awards.
     */
    public function index()
    {
        $publishingAwards = PublishingAwards::orderBy('created_at', 'desc')->get();
        
        if ($publishingAwards->isEmpty()) {
            return $this->errorResponse('No publishing awards found', 404);
        }

        $publishingAwards = PublishingAwardsResource::collection($publishingAwards);

        return $this->successResponse($publishingAwards, 'The publishing awards fetched successfully', 200);
    }

   
}


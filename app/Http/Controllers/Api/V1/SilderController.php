<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SlidersServices;
use App\ApiResponse;
use App\Http\Resources\SliderCollection;

class SilderController extends Controller
{
    use ApiResponse;
    

    protected $sliders;
    public function __construct(SlidersServices $sliders)
    {
        $this->sliders = $sliders;
    }

    public function index()
    {
        $sliders = $this->sliders->getAll()->active()->paginate(4);
        
        $sliders = new SliderCollection($sliders);
        
        return $this->successResponse($sliders, ' The sliders fetched successfully' ,200);
    }

    
}

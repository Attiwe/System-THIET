<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class UnitInstitutesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return  [
            'description' => $this->description ,
            'vision' => $this->vision,
            'message' => $this->message,
            'image' => asset( Storage::url('/unit_institutes/' . $this->image)   ),
         ];
        
    }
}

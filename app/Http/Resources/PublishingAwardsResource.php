<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class PublishingAwardsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'doctor_name' => $this->doctor_name,
            'award_name' => $this->award_name,
            'award_date' => $this->award_date,
            'project_file' => $this->project_file ? asset('storage/publishing_awards/' . $this->project_file) : null,
            'filename' => $this->project_file,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}


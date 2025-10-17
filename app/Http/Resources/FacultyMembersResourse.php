<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FacultyMembersResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'department_name' => $this->department->name,
            'appointment_type' => $this->appointment_type,
                    'personal_image' => asset('image/images_doctor/' . $this->personal_image),
                    'resume' => asset('image/resume/' . $this->resume),
                    'researches' => asset('image/researches/' . $this->researches),
                    'type' => $this->type,
               
        ];
    }
}

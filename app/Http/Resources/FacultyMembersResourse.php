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
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'faculty_code' => $this->faculty_code,
            'email' => $this->email,
            'username' => $this->username,
            'phone' => $this->phone,
            'facebook' => $this->facebook,
            'appointment_type' => $this->appointment_type,
            'appointment_date' => $this->appointment_date,
            'department_name' => $this->department ? $this->department->name : null,
            'personal_image' => $this->personal_image ? asset('image/images_doctor/' . $this->personal_image) : null,
            'resume' => $this->resume ? asset('image/resume/' . $this->resume) : null,
            'researches' => $this->researches ? asset('image/researches/' . $this->researches) : null,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

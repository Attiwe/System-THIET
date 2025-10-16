<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentHeadResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return  [
            'department_id' => $this->department->name,
            'faculty_members_id' => $this->facultyMembers->name,
            'scientific_experiences' => $this->scientific_experiences,
            'achievements' => $this->achievements,
            'department_head' => $this->name,
            'personal_image' => asset('image/images_doctor/' . $this->facultyMembers->personal_image),
            'resume' => asset('image/resume/' . $this->facultyMembers->resume),
            'name'  => $this->facultyMembers->name,
         ];
    }
    
}

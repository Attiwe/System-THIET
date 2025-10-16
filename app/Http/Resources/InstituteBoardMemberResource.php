<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InstituteBoardMemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
         
        return  [
            'username' => $this->facultyMembers->username,
            'personal_image' => asset('image/images_doctor/' . $this->facultyMembers->personal_image),
            'resume' => asset('image/resume/' . $this->facultyMembers->resume),
            'researches' => asset('image/researches/' . $this->facultyMembers->researches),
            'type' => $this->type,
            'description' => $this->description,
        ];
    }
}

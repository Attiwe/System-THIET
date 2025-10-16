<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return  [
            'name' => $this->name,
            'description' => $this->description,
            'requerd_file' => asset('image/department-file/' . $this->requerd_file) ,
            'dapart_image' => asset('image/department-image/' . $this->dapart_image),
            'depart_vision' => $this->depart_vision,
            'depart_massage' => $this->depart_massage,
            
        ];
    }

}

<?php

namespace App\Repositories;

use App\Models\Slider;

class SlidersRepository
{
    
    public function getAll()
    {
        return Slider::query()->latest();
    }

    public function checkId($id)
    {
        return Slider::find($id);
    }

    public function store($data)
    {
        return Slider::create($data);
    }

    public function update($id,  $data)
    {
        $slider = $this->checkId($id);
        $slider->update($data);
        return $slider;
    }

    public function delete($slider){
        return $slider->delete();
    }

}

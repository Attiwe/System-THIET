<?php

namespace App\Repositories;

use App\Models\FeaturedWork;

class FeaturedWorkRepository
{
    public function getAll()
    {
        return FeaturedWork::latest()->get();
    }
    public function checkId($id)
    {
        return Department::find($id);
    }

    public function store($data)
    {
        return Department::create($data);
    }

    public function update($id, array $data)
    {
        $department = $this->checkId($id);
        $department->update($data);
        return $department;
    }

    public function delete($department){
        return $department->delete();
    }

}

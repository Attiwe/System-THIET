<?php

namespace App\Repositories;

use App\Models\Department;

class DepartmentRepository
{
    public function getAll()
    {
        return Department::latest()->get();
    }
    public function checkId($id)
    {
        return Department::find($id);
    }

    public function store($data)
    {
        return Department::create($data);
    }

    public function update($data, $department)
    {
        return $department->update($data);
    }

}

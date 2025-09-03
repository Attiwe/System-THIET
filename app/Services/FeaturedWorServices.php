<?php

namespace App\Services;

use App\Repositories\DepartmentRepository;

class FeaturedWorServices
{
    protected $department ;
 
    public function __construct(DepartmentRepository $department)
    {
        $this->department = $department;
    }

    public function checkId($id)
    {
        return $this->department->checkId($id);
    }

    public function getAll()
    {
        return $this->department->getAll();
    }
    
    public function store($data){
        return $this->department->store($data);
    }

    public function update($id, array $data)
    {
        $department = $this->checkId($id);
        $department->update($data);
        return $department;
    }


    public function delete($id)
    {
        $department = $this->department->checkId($id);

        if (!$department) {
            abort(404);
        }

        $departmentData = clone $department;

        $department->delete();

        return $departmentData;
    }

    
}

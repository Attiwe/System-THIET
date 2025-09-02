<?php

namespace App\Services;

use App\Repositories\DepartmentRepository;

class DepartmentServices
{
    protected $department ;
 
    public function __construct(DepartmentRepository $department)
    {
        $this->department = $department;
    }

    public function getAll()
    {
        return $this->department->getAll();
    }
    
    public function store($data){
        return $this->department->store($data);
    }

    public function update($data){
        $id = $this->department->checkId($data['id']);
        if(!$id){
            abort(404);
        }
        return $this->department->update($data , $id);
    }

    public function delete($id){
        $id = $this->department->checkId($id);
        if(!$id){
            abort(404);
        }
        return $id->delete();
    }

    
}

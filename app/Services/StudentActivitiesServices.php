<?php

namespace App\Services;

use App\Repositories\StudentActivitiesRepository;

class StudentActivitiesServices
{
    protected $studentActivities ;
 
    public function __construct(StudentActivitiesRepository $studentActivities)
    {
        $this->studentActivities = $studentActivities;        
    }

    public function getNewElements()
    {
        return $this->studentActivities->getNewElements();
    }


    public function checkId($id)
    {
        return $this->studentActivities->checkId($id);
    }

    public function getAll()
    {
        return $this->studentActivities->getAll();
    }
    
    public function store($data){
        return $this->studentActivities->store($data);
    }   

    public function update($id, array $data)
    {
         return $this->studentActivities->update($id, $data);
    }


    public function delete($id)
    {
        $studentActivities = $this->studentActivities->checkId($id);
        if (!$studentActivities) {
            abort(404);
        }
        $studentActivitiesData = clone $studentActivities;
        $studentActivities->delete();
        return $studentActivitiesData;
    }

    
}

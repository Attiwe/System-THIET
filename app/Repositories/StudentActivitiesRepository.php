<?php

namespace App\Repositories;

use App\Models\StudentActivities;

class StudentActivitiesRepository
{
    public function getAll()
    {
        return StudentActivities::latest()->get();
    }
    public function checkId($id)
    {
        return StudentActivities::find($id);
    }

    public function store($data)
    {
        return StudentActivities::create($data);
    }

    public function update($id, array $data)
    {
        $studentActivities = $this->checkId($id);
        $studentActivities->update($data);
        return $studentActivities;
    }

    public function delete($studentActivities){
        return $studentActivities->delete();
    }

}

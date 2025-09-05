<?php

namespace App\Repositories;

use App\Models\StudentOpinions;

class StudentOpinionsRepository
{
    public function getAll()
    {
        return StudentOpinions::latest()->get();
    }
    public function checkId($id)
    {
        return StudentOpinions::find($id);
    }

    public function store($data)
    {
        return StudentOpinions::create($data);
    }

    public function update($id, array $data)
    {
        $studentOpinions = $this->checkId($id);
        $studentOpinions->update($data);
        return $studentOpinions;
    }

    public function delete($studentOpinions){
        return $studentOpinions->delete();
    }

}

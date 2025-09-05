<?php

namespace App\Services;

use App\Repositories\StudentOpinionsRepository;

class StudentOpinionsServices
{
    protected $studentOpinions;

    public function __construct(StudentOpinionsRepository $studentOpinions)
    {
        $this->studentOpinions = $studentOpinions;
    }

    public function checkId($id)
    {
        return $this->studentOpinions->checkId($id);
    }

    public function getAll()
    {
        return $this->studentOpinions->getAll();
    }

    public function store($data)
    {
        return $this->studentOpinions->store($data);
    }

    public function update($id, array $data)
    {
        $studentOpinions = $this->checkId($id);
        $studentOpinions->update($data);
        return $studentOpinions;
    }


    public function delete($id)
    {
        $studentOpinions = $this->studentOpinions->checkId($id);

        if (!$studentOpinions) {
            abort(404);
        }

        $studentOpinions = clone $studentOpinions;

        $studentOpinions->delete();

        return $studentOpinions;
    }


}

<?php

namespace App\Repositories;

use App\Models\Institute;

class InstituteRepository
{
    public function getAll()
    {
        return Institute::latest()->get();
    }

    public function checkId($id)
    {
        return Institute::find($id);
    }

    public function store($data)
    {
        return Institute::create($data);
    }

    public function update($id, array $data)
    {
        $institute = $this->checkId($id);
        $institute->update($data);
        return $institute;
    }

    public function delete($institute)
    {
        return $institute->delete();
    }
}

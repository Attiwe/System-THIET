<?php

namespace App\Repositories;

use App\Models\Unit;

class UnitRepository
{
    public function getAll()
    {
        return Unit::latest()->get();
    }
    public function checkId($id)
    {
        return Unit::find($id);
    }

    public function store($data)
    {
        return Unit::create($data);
    }

    public function update($id, array $data)
    {
        $unit = $this->checkId($id);
        $unit->update($data);
        return $unit;
    }

    public function delete($unit){
        return $unit->delete();
    }

}

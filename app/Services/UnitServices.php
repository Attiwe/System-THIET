<?php

namespace App\Services;

use App\Repositories\UnitRepository;

class UnitServices
{
    protected $unit ;
 
    public function __construct(UnitRepository $unit)
    {
        $this->unit = $unit;
    }

    public function getNewElements()
    {
        return $this->unit->getNewElements();
    }


    public function checkId($id)
    {
        return $this->unit->checkId($id);
    }

    public function getAll()
    {
        return $this->unit->getAll();
    }
    
    public function store($data){
        return $this->unit->store($data);
    }

    public function update($id, array $data)
    {
         return $this->unit->update($id, $data);
    }


    public function delete($id)
    {
        $unit = $this->unit->checkId($id);
        if (!$unit) {
            abort(404);
        }
        $unitData = clone $unit;
        $unit->delete();
        return $unitData;
    }

    
}

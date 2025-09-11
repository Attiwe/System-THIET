<?php

namespace App\Services;

use App\Repositories\SlidersRepository;

class SlidersServices
{
    protected $sliders;

    public function __construct(SlidersRepository $sliders)
    {
        $this->sliders = $sliders;
    }


    public function checkId($id)
    {
        return $this->sliders->checkId($id);
    }

    public function getAll()
    {
        return $this->sliders->getAll();
    }

    public function store($data)
    {
        return $this->sliders->store($data);
    }

    public function update($id, array $data)
    {
        return $this->sliders->update($id, $data);  
    }

    public function delete($id)
    {
        $sliders = $this->sliders->checkId($id);

        if (!$sliders) {
            abort(404);
        }

        $slidersData = clone $sliders;

        $sliders->delete();

        return $slidersData;
    }


}

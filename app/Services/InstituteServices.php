<?php

namespace App\Services;

use App\Repositories\InstituteRepository;

class InstituteServices
{
    protected $institute;

    public function __construct(InstituteRepository $institute)
    {
        $this->institute = $institute;
    }

    public function getAll()
    {
        return $this->institute->getAll();
    }

    public function checkId($id)
    {
        return $this->institute->checkId($id);
    }

    public function store(array $data)
    {
        return $this->institute->store($data);
    }

    public function update($id, array $data)
    {
        return $this->institute->update($id, $data);
    }

    public function delete($id)
    {
        $institute = $this->institute->checkId($id);
        if (!$institute) {
            abort(404);
        }
        $copy = clone $institute;
        $institute->delete();
        return $copy;
    }
}

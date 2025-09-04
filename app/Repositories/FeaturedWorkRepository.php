<?php

namespace App\Repositories;

use App\Models\FeaturedWork;

class FeaturedWorkRepository
{
    public function getAll()
    {
        return FeaturedWork::latest()->get();
    }
    public function checkId($id)
    {
        return FeaturedWork::find($id);
    }

    public function store($data)
    {
        return FeaturedWork::create($data);
    }

    public function update($id, array $data)
    {
        $featuredWork = $this->checkId($id);
        $featuredWork->update($data);
        return $featuredWork;
    }

    public function delete($featuredWork){
        return $featuredWork->delete();
    }

}

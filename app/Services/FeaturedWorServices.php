<?php

namespace App\Services;

use App\Repositories\FeaturedWorkRepository;

class FeaturedWorServices
{
    protected $featuredWork ;
 
    public function __construct(FeaturedWorkRepository $featuredWork)
    {
        $this->featuredWork = $featuredWork;
    }

    public function checkId($id)
    {
        return $this->featuredWork->checkId($id);
    }

    public function getAll()
    {
        return $this->featuredWork->getAll();
    }
    
    public function store($data){
        return $this->featuredWork->store($data);
    }

    public function update($id, array $data)
    {
        $featuredWork = $this->checkId($id);
        $featuredWork->update($data);
        return $featuredWork;
    }


    public function delete($id)
    {
        $featuredWork = $this->featuredWork->checkId($id);

        if (!$featuredWork) {
            abort(404);
        }

        $featuredWorkData = clone $featuredWork;

        $featuredWork->delete();

        return $featuredWorkData;
    }
    
}

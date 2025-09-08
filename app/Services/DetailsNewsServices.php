<?php

namespace App\Services;

use App\Repositories\DetailsNewsRepesitory;

class DetailsNewsServices
{
    protected $detailsNews ;
 
    public function __construct(DetailsNewsRepesitory $detailsNews)
    {
        $this->detailsNews = $detailsNews;
    }

    public function getNewElements()
    {
        return $this->detailsNews->getNewElements();
    }


    public function checkId($id)
    {
        return $this->detailsNews->checkId($id);
    }

    public function getAll()
    {
        return $this->detailsNews->getAll();
    }
    
    public function store($data){
        return $this->detailsNews->store($data);
    }

    public function update($id, array $data)
    {
        $detailsNews = $this->checkId($id);
        $detailsNews->update($data);
        return $detailsNews;
    }


    public function delete($id)
    {
        $detailsNews = $this->detailsNews->checkId($id);

        if (!$detailsNews) {
            abort(404);
        }

        $detailsNewsData = clone $detailsNews;

        $detailsNews->delete();

        return $detailsNewsData;
    }

    
}

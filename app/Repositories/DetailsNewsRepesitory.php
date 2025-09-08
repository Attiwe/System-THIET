<?php

namespace App\Repositories;

use App\Models\Details_news;
use App\Models\NewElements;

class DetailsNewsRepesitory
{

    public function getNewElements()
    {
        return NewElements::select('id', 'name')->get();
    }
    public function getAll()
    {
        return Details_news::with('newElement')->latest()->get();
    }
    public function checkId($id)
    {
        return Details_news::find($id);
    }

    public function store($data)
    {
        return Details_news::create($data);
    }

    public function update($id, array $data)
    {
        $detailsNews = $this->checkId($id);
        $detailsNews->update($data);
        return $detailsNews;
    }

    public function delete($detailsNews){
        return $detailsNews->delete();
    }

   

}

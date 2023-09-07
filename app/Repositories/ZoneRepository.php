<?php

namespace App\Repositories;

use App\Interfaces\BasicRepositoryInterface;
use App\Models\Zone;

class ZoneRepository implements BasicRepositoryInterface
{
    public function getAll()
    {
        return Zone::get();
    }

    public function find($id)
    {
        return Zone::findOrFail($id);
    }

    public function create($request)
    {
        $zone = new Zone();
        $zone->setTranslation('name','ar',$request->name_ar);
        $zone->setTranslation('name','en',$request->name_en);
        $zone->country_id = 1;
        $zone->save();
    }

    public function update($request, $id)
    {
        $zone = Zone::findOrFail($id);
        $zone->setTranslation('name','ar',$request->name_ar);
        $zone->setTranslation('name','en',$request->name_en);
        $zone->save();
    }

    public function delete($id)
    {
        $zone = Zone::findOrFail($id);
        $zone->delete();
    }

}

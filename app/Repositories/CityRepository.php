<?php

namespace App\Repositories;

use App\Interfaces\BasicRepositoryInterface;
use App\Models\City;

class CityRepository implements BasicRepositoryInterface
{
    public function getAll()
    {
        return City::get();
    }

    public function find($id)
    {
        return City::findOrFail($id);
    }

    public function create($request)
    {
        $city = new City();
        $city->setTranslation('name','ar',$request->name_ar);
        $city->setTranslation('name','en',$request->name_en);
        $city->zone_id = $request->zone_id;
        $city->save();
    }

    public function update($request, $id)
    {
        $city = City::findOrFail($id);
        $city->setTranslation('name','ar',$request->name_ar);
        $city->setTranslation('name','en',$request->name_en);
        $city->zone_id = $request->zone_id;
        $city->save();
    }

    public function delete($id)
    {
        $zone = City::findOrFail($id);
        $zone->delete();
    }

}

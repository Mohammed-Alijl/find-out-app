<?php

namespace App\Repositories;

use App\Interfaces\BasicRepositoryInterface;
use App\Models\CategoryType;

class CategoryTypeRepository implements BasicRepositoryInterface
{
    public function getAll()
    {
        return CategoryType::get();
    }

    public function find($id)
    {
        return CategoryType::findOrFail($id);
    }

    public function create($request)
    {
        $type = new CategoryType();
        $type->setTranslation('name','ar',$request->name_ar);
        $type->setTranslation('name','en',$request->name_en);
        $type->save();
    }

    public function update($request, $id)
    {
        $type = CategoryType::findOrFail($id);
        $type->setTranslation('name','ar',$request->name_ar);
        $type->setTranslation('name','en',$request->name_en);
        $type->save();
    }

    public function delete($id)
    {
        $zone = CategoryType::findOrFail($id);
        $zone->delete();
    }

}

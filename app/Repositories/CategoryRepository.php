<?php

namespace App\Repositories;

use App\Interfaces\BasicRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements BasicRepositoryInterface
{
    public function getAll()
    {
        return Category::get();
    }

    public function find($id)
    {
        return Category::findOrFail($id);
    }

    public function create($request)
    {
        $category = new Category();
        $category->setTranslation('name','ar',$request->name_ar);
        $category->setTranslation('name','en',$request->name_en);
        $category->category_type_id = $request->category_type_id;
        $category->save();
    }

    public function update($request, $id)
    {
        $category = Category::findOrFail($id);
        $category->setTranslation('name','ar',$request->name_ar);
        $category->setTranslation('name','en',$request->name_en);
        $category->category_type_id = $request->category_type_id;
        $category->save();
    }

    public function delete($id)
    {
        $zone = Category::findOrFail($id);
        $zone->delete();
    }

}

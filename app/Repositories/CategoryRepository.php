<?php

namespace App\Repositories;

use App\Interfaces\BasicRepositoryInterface;
use App\Models\Category;
use App\Models\CategoryType;

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
        $category->setTranslation('name', 'ar', $request->name_ar);
        $category->setTranslation('name', 'en', $request->name_en);
        $category->category_type_id = $request->category_type_id;
        if ($request->filled('parent_category_id'))
            $category->parent_category_id = $request->parent_category_id;
        $category->save();
    }

    public function update($request, $id)
    {
        $category = Category::findOrFail($id);
        $category->setTranslation('name', 'ar', $request->name_ar);
        $category->setTranslation('name', 'en', $request->name_en);
        $this->updateTypeRecursively($category, $request->category_type_id);
        if ($request->filled('parent_category_id')) {
            $category->parent_category_id = $request->parent_category_id;
            $this->updateTypeRecursively($category, $this->find($request->parent_category_id)->category_type_id);
        }
        $category->save();
    }

    public function delete($id)
    {
        $zone = Category::findOrFail($id);
        $zone->delete();
    }

    public function getParentsCategories()
    {
        return Category::where('parent_category_id', null)->get();
    }

    public function getChildCategories($id)
    {
        return Category::where('parent_category_id', $id)->get();
    }

    public function getNonChildCategory($id)
    {
        $descendantIds = $this->getAllDescendantIds($id);

        return Category::whereNotIn('id', $descendantIds)->get();
    }


    public function getAllDescendantIds($parentId)
    {
        $descendantIds = Category::where('parent_category_id', $parentId)->pluck('id')->toArray();

        foreach ($descendantIds as $descendantId) {
            $descendantIds = array_merge($descendantIds, $this->getAllDescendantIds($descendantId));
        }

        return $descendantIds;
    }

    public function updateTypeRecursively($category, $typeId)
    {
        $category->category_type_id = $typeId;
        $category->save();

        $childCategories = $this->getChildCategories($category->id);

        foreach ($childCategories as $childCategory) {
            $this->updateTypeRecursively($childCategory, $typeId);
        }
    }
}

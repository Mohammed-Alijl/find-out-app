<?php

namespace App\Repositories;

use App\Interfaces\BasicRepositoryInterface;
use App\Models\Page;
use Illuminate\Support\Facades\Storage;

class PageRepository implements BasicRepositoryInterface
{
    public function getAll()
    {
        return Page::get();
    }

    public function find($id)
    {
        return Page::findOrFail($id);
    }

    public function create($request)
    {
        $page = new Page();
        $page->setTranslation('name', 'ar', $request->name_ar);
        $page->setTranslation('name', 'en', $request->name_en);
        $page->content = $request->content;
        $path = $request->file('image')->store('pages', 'image');
        $page->image_path = $path;
        $page->save();
    }

    public function update($request, $id)
    {
        $page = Page::findOrFail($id);
        $page->setTranslation('name', 'ar', $request->name_ar);
        $page->setTranslation('name', 'en', $request->name_en);
        $page->content = $request->content;
        if ($request->file('image')) {
            Storage::disk('image')->delete($page->image_path);
            $path = $request->file('image')->store('pages', 'image');
            $page->image_path = $path;
        }
        $page->save();
    }

    public function delete($id)
    {
        $page = $this->find($id);
        $page->delete();
    }

}

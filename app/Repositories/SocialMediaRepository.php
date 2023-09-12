<?php

namespace App\Repositories;

use App\Interfaces\BasicRepositoryInterface;
use App\Models\SocialMedia;

class SocialMediaRepository implements BasicRepositoryInterface
{
    public function getAll()
    {
        return SocialMedia::get();
    }

    public function find($id)
    {
        return SocialMedia::findOrFail($id);
    }

    public function create($request)
    {
        $social = new SocialMedia();
        $social->setTranslation('name', 'ar', $request->name_ar);
        $social->setTranslation('name', 'en', $request->name_en);
        $social->link = $request->link;
        $social->save();
    }

    public function update($request, $id)
    {
        $social = $this->find($id);
        $social->link = $request->link;
        $social->save();
    }

    public function delete($id)
    {
        $social = $this->find($id);
        $social->delete();
    }

}

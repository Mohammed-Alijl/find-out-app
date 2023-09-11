<?php

namespace App\Repositories;

use App\Interfaces\BasicRepositoryInterface;
use App\Models\Advertisement;
use App\Models\AdvertisementImage;
use Illuminate\Support\Facades\Storage;

class AdvertisementRepository implements BasicRepositoryInterface
{
    public function getAll()
    {
        return Advertisement::where('status', 1)->get();
    }

    public function getCustomerAdvertisement()
    {
        return Advertisement::where('status', 0)->get();
    }

    public function find($id)
    {
        return Advertisement::findOrFail($id);
    }

    public function create($request)
    {
        //Create The Advertisement
        $advertisement = new Advertisement();
        $advertisement->setTranslation('name', 'ar', $request->name_ar);
        $advertisement->setTranslation('name', 'en', $request->name_en);
        $advertisement->category_type_id = $request->category_type_id;
        $advertisement->service_id = $request->service_id;
        $advertisement->display_place = $request->display_place;
        if ($request->display_place === 'city' || $request->display_place === 'both')
            $advertisement->city_id = $request->city_id;
        if ($request->filled('status'))
            $advertisement->status = 1;
        $advertisement->save();

        //Create The Advertisement Images
        foreach ($request->file('images') as $image) {
            $path = $image->store('advertisement', 'image');
            $image = new AdvertisementImage();
            $image->advertisement_id = $advertisement->id;
            $image->path = $path;
            $image->save();
        }
    }

    public function update($request, $id)
    {
        //Create The Advertisement
        $advertisement = $this->find($id);
        $advertisement->setTranslation('name', 'ar', $request->name_ar);
        $advertisement->setTranslation('name', 'en', $request->name_en);
        $advertisement->category_type_id = $request->category_type_id;
        $advertisement->service_id = $request->service_id;
        $advertisement->display_place = $request->display_place;
        if ($request->display_place === 'city' || $request->display_place === 'both')
            $advertisement->city_id = $request->city_id;
        $advertisement->save();

        //Update The Service Images
        if ($request->filled('images')) {
            foreach ($advertisement->images as $image) { //delete old images
                Storage::disk('image')->delete('advertisement/' . $advertisement->path);
                $image->delete();
            }
            foreach ($request->file('image') as $image) {
                $path = $image->store('services', 'image');
                $image = new AdvertisementImage();
                $image->advertisement_id = $advertisement->id;
                $image->path = $path;
                $image->save();
            }
        }
    }

    public function delete($id)
    {
        $advertisement = Advertisement::findOrFail($id);


        //Delete The Advertisement Images
        foreach ($advertisement->images as $image) {
            Storage::disk('image')->delete('advertisement/' . $advertisement->path);
            $image->delete();
        }

        //Delete The Advertisement
        $advertisement->delete();
    }

    public function approve($id){
        $advertisement = $this->find($id);
        $advertisement->status = 1;
        $advertisement->save();
    }
}

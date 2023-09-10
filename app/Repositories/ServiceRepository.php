<?php

namespace App\Repositories;

use App\Interfaces\BasicRepositoryInterface;
use App\Models\Service;
use App\Models\ServiceImage;
use Illuminate\Support\Facades\Storage;

class ServiceRepository implements BasicRepositoryInterface
{
    public function getAll()
    {
        return Service::get();
    }

    public function find($id)
    {
        return Service::findOrFail($id);
    }

    public function create($request)
    {
        //Create The Service
        $service = new Service();
        $service->name = $request->name;
        $service->category_id = $request->category_id;

        if ($request->filled('start_at')) {
            $service->start_at = $request->start_at;
            $service->end_at = $request->end_at;
        }
        if ($request->filled('facebook_link'))
            $service->facebook_link = $request->facebook_link;
        if ($request->filled('instagram_link'))
            $service->instagram_link = $request->instagram_link;
        if ($request->filled('twitter_link'))
            $service->twitter_link = $request->twitter_link;
        if ($request->filled('fixing_place'))
            $service->fixing_place = $request->fixing_place;
        if ($request->filled('details'))
            $service->details = $request->details;
        if ($request->filled('sub_category_id'))
            $service->sub_category_id = $request->sub_category_id;
        $service->save();

        //Create The Services Images
        foreach ($request->file('image') as $image) {
            $path = $image->store('services', 'image');
            $image = new ServiceImage();
            $image->service_id = $service->id;
            $image->path = $path;
            $image->save();
        }
        //Detected The Zones Of Services
        $service->zones()->attach($request->zone_id);

        //Detected The Cities Of Services
        foreach ($request->city_id as $index => $cityId) {
            $mobileNumber = $request->mobile_number[$index];
            $service->cities()->attach($cityId, ['mobile_number' => $mobileNumber]);
        }


    }

    public function update($request, $id)
    {
        $service = new Service();
        $service->name = $request->name;
        if ($request->filled('start_at')) {
            $service->start_at = $request->start_at;
            $service->end_at = $request->end_at;
        }else{
            $service->start_at = '';
            $service->end_at = '';
        }
        if ($request->filled('facebook_link'))
            $service->facebook_link = $request->facebook_link;
        else
            $service->facebook_link = '';

        if ($request->filled('instagram_link'))
            $service->instagram_link = $request->instagram_link;
        else
            $service->instagram_link = '';

        if ($request->filled('twitter_link'))
            $service->twitter_link = $request->twitter_link;
        else
            $service->twitter_link = '';

        $service->category_id = $request->category_id;
        if ($request->filled('fixing_place'))
            $service->fixing_place = $request->fixing_place;

        if ($request->filled('details'))
            $service->details = $request->details;
        else
            $service->details = '';

        if ($request->filled('sub_category_id'))
            $service->sub_category_id = $request->sub_category_id;
        else
            $service->sub_category_id = '';

        $service->save();

        //Update The Service Images
        if ($request->filled('images')) {
            foreach ($service->images as $image) { //delete old images
                Storage::disk('image')->delete('services/' . $service->path);
                $image->delete();
            }
            foreach ($request->file('image') as $image) {
                $path = $image->store('services', 'image');
                $image = new ServiceImage();
                $image->service_id = $service->id;
                $image->path = $path;
                $image->save();
            }

            //Update Detected Zones
            $service->zones()->sync($request->zone_id);

            //Update Detected Cities
            $service->cities()->detach();
            foreach ($request->city_id as $index => $cityId) {
                $mobileNumber = $request->mobile_number[$index];
                $service->cities()->attach($cityId, ['mobile_number' => $mobileNumber]);
            }

        }
    }

    public function delete($id)
    {
        $service = Service::findOrFail($id);

        //Remove Detected Zones For The Service
        $service->zones()->detach();

        //Remove Detected Cities For The Service
        $service->cities()->detach();

        //Delete The Service Images
        foreach ($service->images as $image) {
            Storage::disk('image')->delete('services/' . $service->path);
            $image->delete();
        }

        //Delete The Service
        $service->delete();
    }
}

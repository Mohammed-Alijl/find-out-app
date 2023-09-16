<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $sub_category = null;
        if($this->subCategory)
            $sub_category = [
                'id' => $this->subCategory->id,
                'name' => $this->subCategory->name
            ];

        $images = [];
        foreach ($this->images as $image){
            $images[] = asset('storage/img/' . $image->path);
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
            'facebook_link' => $this->facebook_link,
            'instagram_link' => $this->instagram_link,
            'twitter_link' => $this->twitter_link,
            'fixing_place' => $this->fixing_place,
            'details' => $this->details,
            'parent_category' => [
                'id' => $this->category->id,
                'name' => $this->category->name
            ],
            'images' => $images,
            'sub_category' => $sub_category,
            'zones' => $this->zones,
            'cities' => $this->cities,
            'advertisements' => $this->advertisements
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdvertisementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $created_by = !$this->user_id ? 'admin' : $this->customer->name;

        $images = [];
        foreach ($this->images as $image) {
            $images[] = asset('storage/img/' . $image->path);
        }
        $city = null;
        if ($this->city)
            $city = [
                'id' => $this->city->id,
                'name' => $this->city->name
            ];
        return [
            'id' => $this->id,
            'name' => $this->name,
            'display_place' => $this->display_place,
            'created_by' => $created_by,
            'status' => $this->status,
            'images' => $images,
            'category_type' => [
                'id' => $this->categoryType->id,
                'name' => $this->categoryType->name
            ],
            'service' => [
                'id' => $this->service->id,
                'name' => $this->service->name,
            ],
            'city' => $city
        ];
    }
}

<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OfficeSpaceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            //id, name, slug, duration, price, thumbnail, about, city, photos, benefits
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'address' => $this->address,
            'duration' => $this->duration,
            'price' => $this->price,
            'thumbnail' => $this->thumbnail,
            'about' => $this->about,
            // Perbedaan untuk new dan collection adalah untuk yang new itu hanya akan menampilkan satu data aja (To One)
            // sedangkan untuk yang collection itu nanti adalah menampilkan lebih dari satu data atau list
            'city' => new CityResource($this->whenLoaded('city')),
            'photos' => OfficeSpacePhotoResource::collection($this->whenLoaded('photos')),
            'benefits' => OfficeSpaceBenefitResource::collection($this->whenLoaded('benefits')),
        ];
    }
}

<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OfficeSpacePhotoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //ini nanti dimunculin di API nya dari si OfficeSpaceResource
        return [
            'id' => $this->id,
            'photo' => $this->photo,
        ];
    }
}

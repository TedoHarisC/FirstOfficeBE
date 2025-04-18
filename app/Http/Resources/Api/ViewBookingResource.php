<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

// Digunakan untuk API View dari semua API yang ada di Halaman Resources maupun yang ada di aplikasi ini
class ViewBookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone_number' => $this->phone_number,
            'booking_trx_id' => $this->booking_trx_id,
            'is_paid' => $this->is_paid,
            'duration' => $this->duration,
            'total_amount' => $this->total_amount,
            'started_at' => $this->started_at,
            'ended_at' => $this->ended_at,
            'office' => new OfficeSpaceResource($this->whenLoaded('officeSpace')),
        ];
    }
}

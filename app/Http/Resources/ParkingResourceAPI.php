<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ParkingResourceAPI extends JsonResource
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
            'type' => $this->type,
            'name' => $this->name,
            'cover_url' => $this->cover_url,
            'booked_count' => $this->booked_count,
            'total_space' => $this->total_space,
            'is_full' => $this->booked_count >= $this->total_space,
            'images' => json_decode($this->images, true),
            'maps_url' => $this->maps_url,
            'open_time' => Carbon::createFromFormat("H:i:s", $this->open_time)->format("H:i"),
            'close_time' => Carbon::createFromFormat("H:i:s", $this->close_time)->format("H:i"),
            'is_24hour' => $this->is_24hour,
            'price_per_hour' => $this->price_per_hour,
            'public_transport_nearby' => json_decode($this->public_transport_nearby, true)
        ];
    }
}

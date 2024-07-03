<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MapResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->map_name,
            'image' => $this->map_image,
            'events' => EventResource::collection($this->whenLoaded('events')),
            'events_count' => $this->whenCounted('events')
        ];
    }
}

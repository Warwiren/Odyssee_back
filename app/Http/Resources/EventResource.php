<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /*
          id: number;
  name: string;
  description: string;
  dice_test: number;
  location: string;
  location_image: string;
  type: string;
  map_id: number;
        */
        return [
            'id' => $this->id,
            'name' => $this->event_name,
            'description' => $this->description,
            'dice_test' => $this->dice_test,

            'location' => $this->location,
            'location_image' => $this->location_image,
            'type' => $this->type,
            'map_id' => $this->map_id,
            'monsters' => MonsterResource::collection($this->whenLoaded('monsters')),
            'completed' => $this->completed ?? false
        ];
    }
}

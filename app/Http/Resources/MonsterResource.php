<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MonsterResource extends JsonResource
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
            'name' => $this->monster_name,
            'image' => $this->monster_image,
            'skill' => $this->skill
        ];
        // $data = parent::toArray($request);

        // if(isset($data['pivot'])) {
        //     unset($data['pivot']);
        // }

        // return $data;

    }
}

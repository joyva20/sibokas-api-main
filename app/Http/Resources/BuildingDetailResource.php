<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\ClassroomResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BuildingDetailResource extends JsonResource
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
            'building_code' => $this->building_code,
            'name' => $this->name,
            'photo' => $this->photo,
            'classrooms' => ClassroomResource::collection($this->whenLoaded('classroom'))
            // 'classrooms' => ClassroomResource::collection($this->whenLoaded('classroom')->loadMissing(['picRoom:id,name', 'building:id,building_code,name']))
        ];
    }
}

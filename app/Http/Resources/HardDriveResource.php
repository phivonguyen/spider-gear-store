<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HardDriveResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'hard_drive_id' => $this->hard_drive_id,
            'hard_drive_type' => $this->hard_drive_type,
            'hard_drive_capacity' => $this->hard_drive_capacity,
        ];
    }
}

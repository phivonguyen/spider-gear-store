<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'ram_id' => $this->ram_id,
            'ram_amount' => $this->ram_amount,
            'ram_slot_left' => $this->ram_slot_left,
        ];
    }
}

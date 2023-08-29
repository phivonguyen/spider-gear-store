<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HeadphoneResource extends JsonResource
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
            'product' => new ProductResource($this->product),
            'brand' => new BrandResource($this->brand),
            'type' => $this->type,
            'color' => $this->color,
            'microphone' => $this->microphone,
            'impedance' => $this->impedance,
            'battery' => $this->battery,
            'in_the_box' => $this->in_the_box
        ];
    }
}

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
            'headphone_id' => $this->headphone_id,
            'product' => new ProductResource($this->product),
            'category' => new CategoryResource($this->category),
            'brand' => new BrandResource($this->brand),
            'headphone_model' => $this->headphone_model,
            'headphone_type' => $this->headphone_type,
            'headphone_color' => $this->headphone_color,
            'microphone' => $this->microphone,
            'impedance' => $this->impedance,
            'headphone_battery' => $this->headphone_battery,
            'headphone_itb' => $this->headphone_itb,
            'headphone_create_date' => $this->headphone_create_date,
            'headphone_update_date' => $this->headphone_update_date,
        ];
    }
}

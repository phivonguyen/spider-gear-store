<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MouseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'mouse_id' => $this->mouse_id,
            'product' => new ProductResource($this->product),
            'category' => new ProductResource($this->category),
            'brand' => new BrandResource($this->brand),
            'mouse_model' => $this->mouse_model,
            'mouse_connection_type' => $this->mouse_connection_type,
            'technology' => $this->technology,
            'mouse_color' => $this->mouse_color,
            'mouse_led' => $this->mouse_led,
            'dpi' => $this->dpi,
            'mouse_battery' => $this->mouse_battery,
            'mouse_weight' => $this->mouse_weight,
            'mouse_create_date' => $this->mouse_create_date,
            'mouse_update_date' => $this->mouse_update_date,
        ];
    }
}

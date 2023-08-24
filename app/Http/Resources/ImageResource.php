<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'img_id' => $this->img_id,
            'product' => new ProductResource($this->product),
            'image_create_date' => $this->image_create_date,
            'image_update_date' => $this->image_update_date,
        ];
    }
}
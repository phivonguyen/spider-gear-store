<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductDescriptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'product_description_id' => $this->product_description_id,
            'product' => new ProductResource($this->product),
            'content' => $this->content,
            'des_create_date' => $this->description_create_date,
            'des_update_date' => $this->description_update_date,
        ];
    }
}

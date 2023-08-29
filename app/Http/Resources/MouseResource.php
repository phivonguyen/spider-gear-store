<?php

namespace App\Http\Resources;

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
            'id' => $this->id,
            'product' => new ProductResource($this->product),
            'brand' => new BrandResource($this->brand),
            'model' => $this->model,
            'connection_type' => $this->connection_type,
            'technology' => $this->technology,
            'color' => $this->color,
            'led' => $this->led,
            'dpi' => $this->dpi,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}


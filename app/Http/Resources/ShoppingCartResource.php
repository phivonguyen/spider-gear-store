<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShoppingCartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'shopping_cart_id' => $this->shopping_cart_id,
            'user' => new UserResource($this->user),
            'shopping_cart_status' => $this->shopping_cart_status,
            'total' => $this->total,
        ];
    }
}

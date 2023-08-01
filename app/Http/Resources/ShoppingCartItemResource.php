<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShoppingCartItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'shopping_cart_item_id' => $this->shopping_cart_item_id,
            'shopping_cart' => new ShoppingCartResource($this->shopping_cart),
            'product' => new ProductResource($this->product),
            'quantity' => $this->quantity,
        ];
    }
}

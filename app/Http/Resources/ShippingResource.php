<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShippingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'shipping_id' => $this->shipping_id,
            'shipping_method' => $this->shipping_method,
            'shipping_type' => $this->shipping_type,
            'shipping_fee' => $this->shipping_fee,
        ];
    }
}

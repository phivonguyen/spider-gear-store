<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'order_id' => $this->order_id,
            'user' => new UserResource($this->user),
            'order_status' => $this->order_status,
            'tax' => $this->tax,
            'discount' => $this->discount,
            'user_description' => $this->user_description,
            'receive_address' => $this->receive_address,
            'shipping' => new ShippingResource($this->shipping),
            'order_create_date' => $this->order_create_date,
            'order_update_date' => $this->order_update_date,
        ];
    }
}

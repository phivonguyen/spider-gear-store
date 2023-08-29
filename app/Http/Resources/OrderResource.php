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
            'id' => $this->id,
            'user' => new UserResource($this->user),
            'user_description' => $this->description,
            'received_address' => $this->received_address,
            'voucher' => new VoucherResource($this->voucher),
            'shipping' => new ShippingResource($this->shipping),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}

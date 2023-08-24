<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VoucherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'voucher_id' => $this->voucher_id,
            'code' => $this->code,
            'voucher_type' => $this->voucher_type,
            'voucher_discount' => $this->voucher_discount,
            'quantity' => $this->quantity,
            'expire_date' => $this->expire_date
        ];
    }
}
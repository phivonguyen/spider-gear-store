<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'invoice_id' => $this->invoice_id,
            'user' => new UserResource($this->user),
            'order' => new OrderResource($this->order),
            'invoice_create_date' => $this->invoice_create_date,
            'invoice_update_date' => $this->invoice_update_date,
        ];
    }
}

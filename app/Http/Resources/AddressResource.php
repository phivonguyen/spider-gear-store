<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user' => new UserResource($this->user),
            'number' => $this->number,
            'street' => $this->street,
            'ward' => $this->ward,
            'district' => $this->city,
            'country' => $this->country,
            'update_date' => $this->update_date
        ];
    }
}

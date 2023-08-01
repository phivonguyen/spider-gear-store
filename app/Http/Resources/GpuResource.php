<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GpuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'gpu_id' => $this->gpu_id,
            'gpu_brand' => $this->gpu_brand,
            'gpu_model' => $this->gpu_model,
            'gpu_ram' => $this->gpu_ram,
        ];
    }
}

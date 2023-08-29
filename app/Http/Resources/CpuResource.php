<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CpuResource extends JsonResource
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
            'brand' => new BrandResource($this->brand),
            'name' => $this->name,
            'mode' => $this->model,
            'threads' => $this->threads,
            'cores' => $this->cores,
            'cache' => $this->cache
        ];
    }
}

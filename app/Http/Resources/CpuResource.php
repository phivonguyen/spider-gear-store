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
            'cpu_id' => $this->cpu_id,
            'cpu_brand' => $this->cpu_brand,
            'cpu_model' => $this->cpu_model,
            'threads' => $this->threads,
            'cores' => $this->cores,
            'cache' => $this->cache,
        ];
    }
}

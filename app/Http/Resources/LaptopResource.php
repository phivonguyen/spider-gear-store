<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LaptopResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id',
            'product' => new ProductResource($this->product),
            'brand' => new BrandResource($this->brand),
            'model' => $this->model,
            'cpu' => new CpuResource($this->cpu),
            'gpu' => new GpuResource($this->gpu),
            'ram' => new RamResource($this->ram),
            'hard_drive' => new HardDriveResource($this->hard_drive),
            'screen' => $this->screen,
            'camera' => $this->camera,
            'connectivity' => $this->connectivity,
            'bluetooth_connection' => $this->bluetooth_connection,
            'wifi_connection' => $this->wifi_connection,
            'os' => $this->os,
            'battery' => $this->battery,
            'color' => $this->color,
            'weight' => $this->weight,
            'in_the_box' => $this->in_the_box,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}

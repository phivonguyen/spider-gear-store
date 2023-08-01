<?php

namespace App\Http\Resources;

use App\Models\Brand;
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
            'laptop_id' => $this->laptop_id,
            'product' => new ProductResource($this->product),
            'category' => new CategoryResource($this->category),
            'brand' => new Brand($this->brand),
            'laptop_model' => $this->laptop_model,
            'cpu' => new CpuResource($this->cpu),
            'gpu' => new GpuResource($this->gpu),
            'ram' => new RamResource($this->ram),
            'hard_drive' => new HardDriveResource($this->hard_drive),
            'screen' => $this->screen,
            'speaker' => $this->speaker,
            'camera' => $this->camera,
            'connectivity' => $this->connectivity,
            'bluetooth_connection' => $this->bluetooth_connection,
            'wifi_connection' => $this->wifi_connection,
            'os' => $this->os,
            'laptop_battery' => $this->laptop_battery,
            'laptop_color' => $this->laptop_color,
            'laptop_weight' => $this->laptop_weight,
            'laptop_itb' => $this->laptop_itb,
            'laptop_create_date' => $this->laptop_create_date,
            'laptop_update_date' => $this->laptop_update_date,
        ];
    }
}

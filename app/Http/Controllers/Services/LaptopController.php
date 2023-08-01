<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\LaptopResource;
use App\Models\Laptop;
use Illuminate\Http\Request;

class LaptopController extends Controller
{
    private function returnData($laptops)
    {
        if ($laptops->isEmpty()) {
            return Payload::toJson(null, 'Data Not Found', 404);
        }

        return Payload::toJson(LaptopResource::collection($laptops), 'Ok', 200);
    }

    public function getAllLaptop()
    {
        $laptops = LaptopResource::all();

        return $this->returnData($laptops);
    }

    public function getLaptopByCpuId(int $id)
    {
        $laptops = LaptopResource::where('cpu_id', '=', $id);

        return $this->returnData($laptops);
    }

    public function getLaptopByGpuId(int $id)
    {
        $laptops = LaptopResource::where('gpu_id', '=', $id);

        return $this->returnData($laptops);
    }

    public function getLaptopByHardDriveId(int $id)
    {
        $laptops = LaptopResource::where('hard_drive_id', '=', $id);

        return $this->returnData($laptops);
    }

    public function getLaptopByBrandId(int $id)
    {
        $laptops = LaptopResource::where('brand_id', '=', $id);

        return $this->returnData($laptops);
    }
}

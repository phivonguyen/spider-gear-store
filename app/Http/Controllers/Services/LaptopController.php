<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\LaptopResource;
use App\Models\Laptop;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaptopController extends Controller
{
    public function getAll()
    {
        $laptops = Laptop::all();

        if ($laptops->isEmpty()) return Payload::toJson(null, "Data Not Found", 404);

        return Payload::toJson(LaptopResource::collection($laptops), "OK", 200);
    }

    public function getLaptopById($id)
    {
        $laptop = Laptop::where('id', $id)->first();

        if ($laptop->null) return Payload::toJson(null, "Data Not Found", 404);

        return Payload::toJson(new LaptopResource($laptop), "OK", 200);
    }

    public function getAllByBrandId($id)
    {
        $laptops = Laptop::where('brand_id', $id)->get();

        if ($laptops->isEmpty()) return Payload::toJson(null, "Data Not Found", 404);

        return Payload::toJson(LaptopResource::collection($laptops), "OK", 200);
    }

    public function getAllByCpuId($id)
    {
        $laptops = Laptop::where('cpu_id', $id)->get();

        if ($laptops->isEmpty()) return Payload::toJson(null, "Data Not Found", 404);

        return Payload::toJson(LaptopResource::collection($laptops), "OK", 200);
    }

    public function getAllByGpuId($id)
    {
        $laptops = Laptop::where('gpu_id', $id)->get();

        if ($laptops->isEmpty()) return Payload::toJson(null, "Data Not Found", 404);

        return Payload::toJson(LaptopResource::collection($laptops), "OK", 200);
    }

    public function getAllByRamId($id)
    {
        $laptops = Laptop::where('ram_id', $id)->get();

        if ($laptops->isEmpty()) return Payload::toJson(null, "Data Not Found", 404);

        return Payload::toJson(LaptopResource::collection($laptops), "OK", 200);
    }

    public function getAllByHardDriveId($id)
    {
        $laptops = Laptop::where('hard_drive_id', $id)->get();

        if ($laptops->isEmpty()) return Payload::toJson(null, "Data Not Found", 404);

        return Payload::toJson(LaptopResource::collection($laptops), "OK", 200);
    }

    public function getAllByOs($os)
    {
        $laptops = Laptop::where('os', $os)->get();

        if ($laptops->isEmpty()) return Payload::toJson(null, "Data Not Found", 404);

        return Payload::toJson(LaptopResource::collection($laptops), "OK", 200);
    }

    public function getAllByPrice($from, $to)
    {
    }

    public function save($req)
    {
        DB::beginTransaction();
        try {
            $laptop = new Laptop();

            $laptop->fill([
                'product_id' => $req->product_id,
                'brand_id' => $req->brand_id,
                'model' => $req->model,
                'cpu_id' => $req->cpu_id,
                'gpu_id' => $req->gpu_id,
                'ram_id' => $req->ram_id,
                'hard_drive_id' => $req->hard_drive_id,
                'screen' => $req->screen,
                'camera' => $req->camera,
                'connectivity' => $req->connectivity,
                'bluetooth_connection' => $req->bluetooth_connection,
                'os' => $req->os,
                'battery' => $req->battery,
                'color' => $req->color,
                'weight' => $req->weight,
                'in_the_box' => $req->in_the_box,
            ]);

            $laptop->save();
            DB::commit();
            return Payload::toJson(true, 'Created Successfully', 201);
        } catch (Exception $ex) {
            DB::rollBack();
            throw $ex;
        }
    }

    public function update($req)
    {
        DB::beginTransaction();
        try {
            $result = Laptop::where('id', $req->id)->update([
                'product_id' => $req->product_id,
                'brand_id' => $req->brand_id,
                'model' => $req->model,
                'cpu_id' => $req->cpu_id,
                'gpu_id' => $req->gpu_id,
                'ram_id' => $req->ram_id,
                'hard_drive_id' => $req->hard_drive_id,
                'screen' => $req->screen,
                'camera' => $req->camera,
                'connectivity' => $req->connectivity,
                'bluetooth_connection' => $req->bluetooth_connection,
                'os' => $req->os,
                'battery' => $req->battery,
                'color' => $req->color,
                'weight' => $req->weight,
                'in_the_box' => $req->in_the_box,
            ]);

            if ($result) {
                DB::commit();
                return Payload::toJson(true, 'Updated Successfully', 200);
            }

            return Payload::toJson(false, 'Update fail', 404);
        } catch (Exception $ex) {
            DB::rollBack();
            return $ex;
        }
    }

    public function remove($id)
    {
        DB::beginTransaction();
        try {
            $result = Laptop::where('id', $id)->delete();

            if ($result) {
                DB::commit();
                return Payload::toJson(true, 'Removed Successfully', 201);
            }
        } catch (Exception $ex) {
            DB::rollBack();
            throw $ex;
        }
    }
}

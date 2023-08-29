<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\BrandResource;
use App\Models\Brand;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function getAll()
    {
        $brands = Brand::all();

        if ($brands->isEmpty()) {
            return Payload::toJson(null, "Data not found", 404);
        }

        return Payload::toJson(BrandResource::collection($brands), "OK", 200);
    }

    public function getBrandById($id)
    {
        $brand = Brand::where('id', $id)->first();

        if ($brand == null) {
            return Payload::toJson(null, "Data not found", 404);
        }

        return Payload::toJson(new BrandResource($brand), "OK", 200);
    }

    public function save($req)
    {
        DB::beginTransaction();
        try {
            $brand = new Brand();

            $brand->fill([
                'name' => $req->name
            ]);

            $brand->save();
            DB::commit();
            return Payload::toJson(true, 'Created Successfully', 201);
        } catch (Exception $ex) {
            DB::rollBack();
            throw $ex;
        }
    }

    public function remove($req)
    {
        DB::beginTransaction();

        try {
            $result = Brand::where('id', $req->id)->delete();

            if ($result) {
                DB::commit();
                return Payload::toJson(true, 'Updated Successfully', 200);
            } else {
                return Payload::toJson(false, "Update fail", 404);
            }
        } catch (Exception $ex) {
            DB::rollBack();
            throw $ex;
        }
    }
}

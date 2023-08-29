<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\HeadphoneResource;
use App\Models\Headphone;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HeadphoneController extends Controller
{
    public function getAll()
    {
        $headphones = Headphone::all();

        if ($headphones->isEmpty()) return Payload::toJson(null, 'Data Not Found', 404);

        return Payload::toJson(HeadphoneResource::collection($headphones), 'OK', 200);
    }

    public function getAllByColor($color)
    {
        $headphones = Headphone::where('color', $color)->get();

        if ($headphones->isEmpty()) return Payload::toJson(null, 'Data Not Found', 404);

        return Payload::toJson(HeadphoneResource::collection($headphones), 'OK', 200);
    }

    public function getHeadphoneById($id)
    {
        $headphone = Headphone::where('id', $id)->first();

        if ($headphone->isEmpty()) return Payload::toJson(null, 'Data Not Found', 404);

        return Payload::toJson(new HeadphoneResource($headphone), 'OK', 200);
    }

    // public function getHeadphoneByPrice($from, $to)
    // {
    //     $headphones = { 1 = 2};

    //     if ($headphones->isEmpty()) return Payload::toJson(null, 'Data Not Found', 404);

    //     return Payload::toJson(HeadphoneResource::collection($headphones), 'OK', 200);
    // }

    public function getAllByBrandId($id)
    {
        $headphones = Headphone::where('brand_id', $id)->get();

        if ($headphones->isEmpty()) return Payload::toJson(null, 'Data Not Found', 404);

        return Payload::toJson(HeadphoneResource::collection($headphones), 'OK', 200);
    }

    public function getAllByType($type)
    {
        $headphones = Headphone::where('type', $type)->get();

        if ($headphones->isEmpty()) return Payload::toJson(null, 'Data Not Found', 404);

        return Payload::toJson(HeadphoneResource::collection($headphones), 'OK', 200);
    }

    public function save($req)
    {
        DB::beginTransaction();
        try {
            $headphone = new Headphone();

            $headphone->fill([
                'product_id' => $req->product_id,
                'brand_id' => $req->brand_id,
                'model' => $req->model,
                'type' => $req->type,
                'color' => $req->color,
                'microphone' => $req->microphone,
                'impedance' => $req->impedance,
                'battery' => $req->battery,
                'in_the_box' => $req->in_the_box,
            ]);

            $headphone->save();
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
            $result = Headphone::where('id', $req->id)->update([
                'product_id' => $req->product_id,
                'brand_id' => $req->brand_id,
                'model' => $req->model,
                'type' => $req->type,
                'color' => $req->color,
                'microphone' => $req->microphone,
                'impedance' => $req->impedance,
                'battery' => $req->battery,
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
            $result = Headphone::where('id', $id)->delete();

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

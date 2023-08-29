<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\ShippingResource;
use App\Models\Shipping;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShippingController extends Controller
{
    public function getAll()
    {
        $shippings = Shipping::all();

        if ($shippings->isEmpty()) return Payload::toJson(null, 'Data Not Found', 404);

        return Payload::toJson(ShippingResource::collection($shippings), 'OK', 200);
    }

    public function getShippingById($id)
    {
        $shipping = Shipping::where('id', $id)->first();

        if ($shipping->isEmpty()) return Payload::toJson(null, 'Data Not Found', 404);

        return Payload::toJson(new ShippingResource($shipping), 'OK', 200);
    }

    public function save($req)
    {
        DB::beginTransaction();
        try {
            $shipping = new Shipping();

            $shipping->fill([
                'method' => $req->method,
                'fee' => $req->fee,
            ]);

            $shipping->save();
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
            $result = Shipping::where('id', $req->id)->update([
                'method' => $req->method,
                'fee' => $req->fee,
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
            $result = Shipping::where('id', $id)->delete();

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

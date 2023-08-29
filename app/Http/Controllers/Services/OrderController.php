<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function getAll()
    {
        $orders = Order::all();

        if ($orders->isEmpty()) return Payload::toJson(null, 'Data Not Found', 404);

        return Payload::toJson(OrderResource::collection($orders), "OK", 200);
    }

    public function getOrderById($id)
    {
        $order = Order::where('user_id', $id)->first();

        if ($order == null) return Payload::toJson(null, 'Data Not Found', 404);

        return Payload::toJson(new OrderResource($order), "OK", 200);
    }

    public function getAllByUserId($id)
    {
        $orders = Order::where('user_id', $id)->get();

        if ($orders->isEmpty()) return Payload::toJson(null, 'Data Not Found', 404);

        return Payload::toJson(OrderResource::collection($orders), "OK", 200);
    }

    public function getAllByShippingId($id)
    {
        $orders = Order::where('shipping', $id)->get();

        if ($orders->isEmpty()) return Payload::toJson(null, 'Data Not Found', 404);

        return Payload::toJson(OrderResource::collection($orders), "OK", 200);
    }

    public function getAllByStatus($status)
    {
        $orders = Order::where('status', $status)->get();

        if ($orders->isEmpty()) return Payload::toJson(null, 'Data Not Found', 404);

        return Payload::toJson(OrderResource::collection($orders), "OK", 200);
    }

    // TODO
    public function getAllByDate($start, $end)
    {
    }

    public function save($req)
    {
        DB::beginTransaction();
        try {
            $order = new Order();

            $order->fill([
                'user_id' => $req->user_id,
                'user_description' => $req->user_description,
                'received_address' => $req->received_address,
                'voucher' => $req->voucher,
                'shipping_id' => $req->shipping_id,
            ]);

            $order->save();
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
            $result = Order::where('id', $req->id)->update([
                'user_id' => $req->user_id,
                'user_description' => $req->user_description,
                'received_address' => $req->received_address,
                'voucher' => $req->voucher,
                'shipping_id' => $req->shipping_id,
                'status' => $req->status
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
            $result = order::where('id', $id)->delete();

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

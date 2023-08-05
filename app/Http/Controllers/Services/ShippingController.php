<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\ShippingResource;
use App\Models\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function getAllShipping()
    {
        $shipping = Shipping::all();

        if ($shipping->isEmpty()) {
            return Payload::toJson(null, 'Data Not Found', 404);
        }

        return Payload::toJson(ShippingResource::collection($shipping), 'Ok', 200);
    }

    public function getShippingById(int $id)
    {
        $shipping = Shipping::where('shipping_id', '=', $id)->get();

        if ($shipping->count() === 0) {
            return Payload::toJson(null, 'Data Not Found', 404);
        }

        return Payload::toJson(ShippingResource::collection($shipping), 'Ok', 200);
    }
}

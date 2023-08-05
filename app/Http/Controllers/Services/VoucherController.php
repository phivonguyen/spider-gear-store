<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\VoucherResource;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function getAllVoucher()
    {
        $vouchers = Voucher::all();

        if ($vouchers->count() === 0) {
            return Payload::toJson(null, 'Data Not Found', 404);
        }

        return Payload::toJson(VoucherResource::collection($vouchers), 'Ok', 200);
    }

    public function getVoucherById(string $id)
    {
        $voucher = Voucher::where('user_id', '=', $id)->first();

        if ($voucher->isEmpty()) {
            return Payload::toJson(null, 'Data Not Found', 404);
        }

        return Payload::toJson(VoucherResource::collection($voucher), 'Ok', 200);
    }
}

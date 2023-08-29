<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function getAllByUserId($id)
    {
        $addresses = Address::where('user_id',  $id)->get();

        if ($addresses->isEmpty()) {
            return Payload::toJson(null, "Data not found", 404);
        }

        return Payload::toJson(AddressResource::collection($addresses), "OK", 200);
    }

    public function getByCountry($country)
    {
        $addresses = Address::where('country',  $country)->get();

        if ($addresses->isEmpty()) {
            return Payload::toJson(null, "Data not found", 404);
        }

        return Payload::toJson(AddressResource::collection($addresses), "OK", 200);
    }

    public function save($req)
    {
        DB::beginTransaction();
        try {
            $address = new Address();

            $address->fill([
                'user_id' => $req->user_id,
                'number' => $req->number,
                'street' => $req->street,
                'ward' => $req->ward,
                'district' => $req->district,
                'city' => $req->city,
                'country' => $req->country
            ]);

            $address->save();
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
            $result = Address::where([['user_id', $req->user_id]])->update([
                'number' => $req->number,
                'street' => $req->street,
                'ward' => $req->ward,
                'district' => $req->district,
                'city' => $req->city,
                'country' => $req->country
            ]);

            DB::commit();
            if ($result != 1) {
                return Payload::toJson(false, "Update fail", 202);
            }

            return Payload::toJson(true, "Update success", 202);
        } catch (Exception $ex) {
            DB::rollBack();
            throw $ex;
        }
    }
}

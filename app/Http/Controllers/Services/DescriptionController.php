<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\DescriptionResource;
use App\Models\Description;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DescriptionController extends Controller
{

    public function getAllByProductId($id)
    {
        $descriptions = Description::where('product_id', $id)->get();

        if ($descriptions->isEmpty()) return Payload::toJson(null, 'Data not found', 404);

        return Payload::toJson(DescriptionResource::collection($descriptions), "OK", 200);
    }

    public function save($req)
    {
        DB::beginTransaction();
        try {
            $description = new Description();

            $description->fill([
                'product_id' => $req->product_id,
                'content' => $req->content,
            ]);

            $description->save();
            DB::commit();
            return Payload::toJson(true, 'Created Successfully', 201);
        } catch (Exception $ex) {
            DB::rollBack();
            throw $ex;
        }
    }

    public function update($req)
    {
        DB::transaction();
        try {
            $result = Description::where('id', $req->id)->update([
                'content' => $req->content
            ]);

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

    public function remove($id)
    {
        DB::transaction();
        try {
            $result = Description::where('id', $id)->delete();

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

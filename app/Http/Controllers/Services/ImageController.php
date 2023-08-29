<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\ImageResource;
use App\Models\Image;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function getAllByProductId($id)
    {
        $images = Image::where('product_id', $id)->get();

        if ($images->isEmpty()) return Payload::toJson(null, 'Data Not Found', 404);

        return Payload::toJson(ImageResource::collection($images), "OK", 200);
    }

    public function save($req)
    {
        DB::beginTransaction();
        try {
            $image = new Image();

            $image->fill([
                'product_id' => $req->product_id,
                'name' => $req->name,
            ]);

            $image->save();
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
            $result = Image::where('id', $req->id)->update([
                'product_id' => $req->product_id,
                'name' => $req->name
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
            $result = Image::where('id', $id)->delete();

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

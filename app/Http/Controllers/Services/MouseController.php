<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\MouseResource;
use App\Models\Mouse;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MouseController extends Controller
{
    public function getAll()
    {
        $mice = Mouse::all();

        if ($mice->isEmpty()) return Payload::toJson(null, "Data Not Found", 404);

        return Payload::toJson(MouseResource::collection($mice), "OK", 200);
    }

    public function getMouseById($id)
    {
        $mouse = Mouse::where('id', $id)->first();

        if ($mouse == null) return Payload::toJson(null, "Data Not Found", 404);

        return Payload::toJson(new MouseResource($mouse), "OK", 200);
    }

    public function getAllByBrandId($id)
    {
        $mice = Mouse::where('brand_id', $id)->get();

        if ($mice->isEmpty()) return Payload::toJson(null, "Data Not Found", 404);

        return Payload::toJson(MouseResource::collection($mice), "OK", 200);
    }

    public function getMouseByModel($model)
    {
        $mouse = Mouse::where('model', $model)->first();

        if ($mouse == null) return Payload::toJson(null, "Data Not Found", 404);

        return Payload::toJson(new MouseResource($mouse), "OK", 200);
    }

    public function getAllByConnectionType($type)
    {
        $mice = Mouse::where('connection_type', $type)->get();

        if ($mice->isEmpty()) return Payload::toJson(null, "Data Not Found", 404);

        return Payload::toJson(MouseResource::collection($mice), "OK", 200);
    }

    public function getAllByTechnology($technology)
    {
        $mice = Mouse::where('technology', $technology)->get();

        if ($mice->isEmpty()) return Payload::toJson(null, "Data Not Found", 404);

        return Payload::toJson(MouseResource::collection($mice), "OK", 200);
    }

    public function getAllByColor($color)
    {
        $mice = Mouse::where('color', $color)->get();

        if ($mice->isEmpty()) return Payload::toJson(null, "Data Not Found", 404);

        return Payload::toJson(MouseResource::collection($mice), "OK", 200);
    }

    // public function getAllByDPI($maxDPI)
    // {
    //     $mice = Mouse::where('brand_id', $id)->get();

    //     if ($mice->isEmpty()) return Payload::toJson(null, "Data Not Found", 404);

    //     return Payload::toJson(MouseResource::collection($mice), "OK", 200);
    // }

    public function save($req)
    {
        DB::beginTransaction();
        try {
            $mouse = new Mouse();

            $mouse->fill([
                'product_id' => $req->product_id,
                'brand_id' => $req->brand_id,
                'model' => $req->model,
                'connection_type' => $req->connection_type,
                'technology' => $req->technology,
                'color' => $req->color,
                'led' => $req->led,
                'dpi' => $req->dpi,
            ]);

            $mouse->save();
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
            $result = Mouse::where('id', $req->id)->update([
                'product_id' => $req->product_id,
                'brand_id' => $req->brand_id,
                'model' => $req->model,
                'connection_type' => $req->connection_type,
                'technology' => $req->technology,
                'color' => $req->color,
                'led' => $req->led,
                'dpi' => $req->dpi,
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
            $result = mouse::where('id', $id)->delete();

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

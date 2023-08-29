<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function getAll()
    {
        $categories = Category::all();

        if ($categories->isEmpty()) {
            return Payload::toJson(null, "Data not found", 404);
        }

        return Payload::toJson(CategoryResource::collection($categories), "OK", 200);
    }

    public function getCategoryById($id)
    {
        $category = Category::where('id', $id)->first();

        if ($category->isEmpty()) {
            return Payload::toJson(null, "Data not found", 404);
        }

        return Payload::toJson(new CategoryResource($category), "OK", 200);
    }

    public function save($req)
    {
        DB::beginTransaction();
        try {
            $brand = new Category();

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

    public function update($req)
    {
        DB::transaction();
        try {
            $result = Category::where('id', $req->id)->update([
                'name' => $req->name
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
        DB::beginTransaction();
        try {
            $result = Category::where('id', $id)->delete();

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

<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getAll()
    {
        $products = Product::all();

        if ($products->isEmpty()) return Payload::toJson(null, 'Data Not Found', 404);

        return Payload::toJson(ProductResource::collection($products), 'OK', 200);
    }

    public function getProductById($id)
    {
        $product = Product::where('id', $id)->first();

        if ($product->isEmpty()) return Payload::toJson(null, 'Data Not Found', 404);

        return Payload::toJson(new ProductResource($product), 'OK', 200);
    }

    public function getAllByKeywords($keywords)
    {
    }

    public function getAllByCategoryId($id)
    {
        $products = Product::where('category_id', $id);

        if ($products->isEmpty()) return Payload::toJson(null, 'Data Not Found', 404);

        return Payload::toJson(ProductResource::collection($products), 'OK', 200);
    }

    public function getAllByPrice($from, $to)
    {
    }

    public function getAllByDate($start, $end)
    {
    }

    public function save($req)
    {
        DB::beginTransaction();
        try {
            $product = new Product();

            $product->fill([
                'name' => $req->name,
                'category_id' => $req->category_id,
                'qty_in_stock' => $req->qty_in_stock,
                'price' => $req->price,
            ]);

            $product->save();
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
            $result = Product::where('id', $req->id)->update([
                'name' => $req->name,
                'category_id' => $req->category_id,
                'qty_in_stock' => $req->qty_in_stock,
                'price' => $req->price,
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
            $result = Product::where('id', $id)->delete();

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

<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    // public function save(Request $req)
    // {
    //     DB::beginTransaction();
    //     try {
    //         $image = new Image();

    //         $image->fill([
    //             'product_id' => $req->product_id,
    //             'name' => $req->name,
    //         ]);

    //         $image->save();
    //         DB::commit();
    //         return Payload::toJson(true, 'Created Successfully', 201);
    //     } catch (Exception $ex) {
    //         DB::rollBack();
    //         throw $ex;
    //     }
    // }

    // public function update(Request $req)
    // {
    //     DB::beginTransaction();
    //     try {
    //         $result = Image::where('id', $req->id)->update([
    //             'product_id' => $req->product_id,
    //             'name' => $req->name
    //         ]);

    //         if ($result) {
    //             DB::commit();
    //             return Payload::toJson(true, 'Updated Successfully', 200);
    //         }

    //         return Payload::toJson(false, 'Update fail', 404);
    //     } catch (Exception $ex) {
    //         DB::rollBack();
    //         return $ex;
    //     }
    // }

    // public function remove($id)
    // {
    //     DB::beginTransaction();
    //     try {
    //         $result = Image::where('id', $id)->delete();

    //         if ($result) {
    //             DB::commit();
    //             return Payload::toJson(true, 'Removed Successfully', 201);
    //         }
    //     } catch (Exception $ex) {
    //         DB::rollBack();
    //         throw $ex;
    //     }
    // }
}

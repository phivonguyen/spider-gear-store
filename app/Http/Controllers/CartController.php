<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CartController extends Controller
{

    public function index() {
        $result = DB::table('product')->where('product_id', "HIAPTE")
                                    ->select('*')->get();

        // $cartList = DB::table('cart')->get();
        // $total = 0;

        // foreach($cartList as $item) {
        //     $total += ($item->price * $item->quantity);
        // }

        dd($result);

        // return view('clients/cart/index')->with(['cartList'=>$cartList, 'total'=>$total]);
        return view('clients/cart/index')->with(['result'=>$result]);
    }


    public function delete($id) {
        $b = DB::table('cart')->where('id', intval($id))
                              ->delete();

       return redirect()->action([CartController::class, 'index']);
    }

    public function updateQuantity(int $id, string $quanity) {
        $b = DB::table('cart')->where('id', intval($id))
        ->update(
                [
                    'quantity'=>$quanity
                ]
        );


        // return redirect()->action([CartController::class, 'index']);
        return response()->json(['quantity'=>$quanity]);

    }
}
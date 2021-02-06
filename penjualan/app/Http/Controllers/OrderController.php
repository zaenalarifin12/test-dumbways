<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $cycle = DB::table("cycle")->where("id",$request->cycle_id)->first();

        $cartId = DB::table("cart")->insertGetId(
            [
                "total" => $cycle->price
            ]
        );

        DB::table("cart_product")->insert(
            [
                "cart_id"   => $cartId,
                "cycle_id"  => $request->cycle_id,
                "quantity"  => 1,
                "total"     => $cycle->price
            ]
        );

        return redirect("/cart")->with("msg", "anda berhasil memasukan sepeda ke cart");
    }

    public function update(Request $request)
    {
        $jumlah = count($request->idCartProduct);

        $total_semua = 0;
        // update cart product
        for ($i=0; $i < $jumlah; $i++) { 
            
            $cartProduct = DB::table("cart_product")
                            ->join("cycle", "cart_product.cycle_id", "=", "cycle.id")
                            ->select(
                                "cart_product.*",
                                "cycle.id AS idCycle",
                                "cycle.price"
                            )
                            ->where("cart_product.id", $request->idCartProduct[$i])->first();

            $totalCycle = $cartProduct->price * $request->qty[$i];

            DB::table("cart_product")->where("cart_product.id", $request->idCartProduct[$i])->update([
                "quantity"  => $request->qty[$i],
                "total"     => $totalCycle
            ]);

            $total_semua += $totalCycle;
        }

        // TODO update cart

        return redirect("/cart")->with("msg", "keranjang berhasil diperbarui");

    }
}

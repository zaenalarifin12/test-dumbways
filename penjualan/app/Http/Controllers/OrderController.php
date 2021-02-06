<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $cycle = DB::table("cycle")->where("id",$request->cycle_id)->first();

        $cycle = DB::table("cycle")->where("id",$request->cycle_id)->update([
            "stock" => $cycle->stock - 1
        ]);

        DB::table("cart_product")->insert(
            [
                "cycle_id"  => $request->cycle_id,
                "quantity"  => 1,
            ]
        );

        return redirect("/cart")->with("msg", "anda berhasil memasukan sepeda ke cart");
    }

    public function update(Request $request, $id)
    {

        $cartP = DB::table("cart_product")->where("cart_product.id", $id)->first();

        $cy = DB::table("cycle")->where("id", $cartP->cycle_id)->first();

        // uji , apakah jumlah kuantity > jumlah p
        if (($cy->stock + $cartP->quantity) >= $request->qty) {
            
            DB::table("cart_product")->where("cart_product.id", $id)->update([
                "quantity"  => $request->qty,
            ]);

            $cy = DB::table("cycle")->where("id", $cartP->cycle_id)->update([
                "stock" => ($cy->stock + $cartP->quantity) - $request->qty
            ]);

        }

        return redirect("/cart")->with("msg", "keranjang berhasil diperbarui");
    }

    public function destroy($id)
    {
        $p = DB::table("cart_product")->where("id", $id)->first();

        $px = DB::table("cycle")->where("id", $p->cycle_id)->update([
            "stock" => $p->quantity
        ]);

        DB::table("cart_product")->where("id", $id)->delete();

        return redirect("/cart")->with("msg", "keranjang berhasil diperbarui");
    }
}

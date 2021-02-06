<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cartProduct = DB::table("cart_product")
                        ->join("cart", "cart.id", "=", "cart_product.cart_id")
                        ->join("cycle", "cart_product.cycle_id", "=", "cycle.id")
                        ->select(
                            "cycle.name",
                            "cart_product.quantity",
                            "cart_product.total",
                            "cycle.image",
                            "cycle.price",
                            "cart_product.id AS idCartProduct",
                            "cart.id AS idCart"
                        )
                        ->get();
        
        
        return view("cart.index", compact("cartProduct"));
    }
}

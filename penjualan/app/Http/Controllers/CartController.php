<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cartProduct = DB::table("cart_product")
                        ->join("cycle", "cart_product.cycle_id", "=", "cycle.id")
                        ->select(
                            "cycle.name",
                            "cart_product.quantity",
                            "cycle.image",
                            "cycle.price",
                            "cart_product.id AS idCartProduct",
                        )
                        ->get();
        
        
        return view("cart.index", compact("cartProduct"));
    }
}

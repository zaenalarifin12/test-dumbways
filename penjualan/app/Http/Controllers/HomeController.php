<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cycle = DB::table("cycle")
                ->join("merk", "cycle.id_merk", "=", "merk.id")
                ->select("cycle.*", "merk.name")
                ->get();

        return view('home', compact("cycle"));
    }
}

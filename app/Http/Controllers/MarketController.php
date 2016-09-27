<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests;

class MarketController extends Controller
{
    public function index(){

        $products = Product::get(12);

        return view('market.market',['products' => $products]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests;

class MarketController extends Controller
{

    public function index(){
        $products = Product::paginate(5);

        return view('market.market',['products' => $products]);
    }

    public function addCarrinho(Request $request){
        $produto = Product::findOrFail($request->id);

        $item = [
            'id' => $produto->id,
            'nome' => $produto->nome,
            'preco' => random_int(10, 100)
        ];

        $request->session()->push('carrinho', $item);

        return response()->json(['success' => true]);
    }

    public function mostraCarrinho(Request $request){
        return $request->session()->get('carrinho');
    }

}

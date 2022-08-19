<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get(['id','name', 'price','slug']);
        
        $cartTotal = \Cart::getTotal();
        $cartCount = \Cart::getContent()->count();

        return view('frontend.homepage', compact('products', 'cartTotal', 'cartCount'));
    }

    public function getProducts(){
        $products = Product::with('category')->get(['id','name', 'price','slug']);

        return response()->json([
            'status' => 200,
            'products' => $products
        ]);
    }
}

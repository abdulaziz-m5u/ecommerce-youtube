<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('category','tags')->get();

        return view('frontend.homepage', compact('products'));
    }
}

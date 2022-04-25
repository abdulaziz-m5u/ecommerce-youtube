<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index($slug = null){
        return view('frontend.shop.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = \Cart::getContent();

        return view('frontend.cart.index', compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$sessionKey = null)
    {
        $product = Product::findOrFail($request->productId);

		$item = [
			'id' => md5($product->id),
			'name' => $product->name,
			'price' => $product->price,
			'quantity' => isset($request->quantity) ? $request->quantity : 1,
			'associatedModel' => $product,
		];

        if ($sessionKey) {
            \Cart::add($item);
            return response()->json([
                'status' => 200,
                'message' => 'Successfully Added to Cart !',
            ]);
        }else {
            $carts = \Cart::add($item);
            return response()->json([
                'status' => 200,
                'message' => 'Successfully Added to Cart !',
            ]);
        }
        
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCart(Request $request)
    {
        $carts = \Cart::getContent();
        $cart_total = \Cart::getTotal();

        return response()->json([
            'status' => 200,
            'carts' => $carts,
            'cart_total' => $cart_total,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cart_id)
    {
        $cartUpdate = \Cart::update($cart_id,[
            'quantity' => [
                'relative' => false,
                'value' => $request->quantity,
            ],
        ]);

        $carts = \Cart::getContent();
        $cart_total = \Cart::getTotal();

        return response()->json([
            'status' => 200,
            'message' => 'Successfully updated Cart !',
            'carts' => $carts,
            'cart_total' => $cart_total,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cart_id)
    {
        \Cart::remove($cart_id);
        $cart_total = \Cart::getTotal();

        return response()->json([
            'status' => 200,
            'message' => 'Successfully deleted Cart !',
            'cart_total' => $cart_total,
        ]);
    }
}

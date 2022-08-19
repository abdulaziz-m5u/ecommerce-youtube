<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $cartTotal = \Cart::getTotal();
        $cartCount = \Cart::getContent()->count();

        return view('frontend.shop.index', compact('cartTotal', 'cartCount'));
    }

    public function getProducts(Request $request,$slug = null){

        $sorting = $request->sortingBy;

        switch ($sorting) {
            case 'popularity':
                $sortField = 'id';
                $sortType = 'desc';
                break;
            case 'low-high':
                $sortField = 'price';
                $sortType = 'asc';
                break;
            case 'high-low':
                $sortField = 'price';
                $sortType = 'desc';
                break;
            default:
                $sortField = 'id';
                $sortType = 'asc';
        }

        $products = Product::with('category');

        if(!is_null($slug)){
            $category = Category::whereSlug($slug)->firstOrFail();
            
            
            if (is_null($category->category_id)) {
        
                $categoriesIds = Category::whereCategoryId($category->id)->pluck('id')->toArray();
                $categoriesIds[] = $category->id;
                $products = $products->whereHas('category', function ($query) use ($categoriesIds) {
                    $query->whereIn('id', $categoriesIds);
                });               

            } else {
                $products = $products->whereHas('category', function ($query) use ($slug) {
                    $query->where([
                        'slug' => $slug,
                    ]);
                });

            }
        }

        $products = $products->orderBy($sortField, $sortType)->get();

        return response()->json([
            'message' => 'Success',
            'products' => $products
        ]);

    }

    public function tag(Request $request, $slug)
    {
        $sorting = $request->sortingBy;
        switch ($sorting) {
            case 'popularity':
                $sortField = 'id';
                $sortType = 'desc';
                break;
            case 'low-high':
                $sortField = 'price';
                $sortType = 'asc';
                break;
            case 'high-low':
                $sortField = 'price';
                $sortType = 'desc';
                break;
            default:
                $sortField = 'id';
                $sortType = 'asc';
        }

        $products = Product::with('tags');

        $products = $products->whereHas('tags', function ($query) use($slug) {
            $query->where([
                'slug' => $slug,
            ]);
        })
        ->orderBy($sortField, $sortType)
        ->paginate(6);

        return view('frontend.shop.index', compact('products','slug'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request,$slug = null)
    {
        switch ($request->sortingBy) {
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

        if ($slug == '') {
            $products = $products;
        } else {
            $category = Category::whereSlug($slug)->first();
            
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

        $products = $products->orderBy($sortField, $sortType)->paginate(6);
        
        return view('frontend.shop.index', compact('products','slug'));
    }

    public function tag(Request $request, $slug)
    {
        switch ($request->sortingBy) {
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

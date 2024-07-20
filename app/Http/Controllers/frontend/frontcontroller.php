<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\category;
use Illuminate\Support\Facades\Auth;

class frontcontroller extends Controller
{
    public function index()
    {
        $featured_products = Product::where ('trending', '1')->take(15)->get();
        $trending_category = category::where('popular', '1')->take(15)->get();
        return view('frontend.index', compact('featured_products','trending_category'));
    }

    public function category()
    {
        $category = category::where('status','0')->get();
        return view('frontend.category', compact('category'));
    }
    public function viewcategory($meta_title)
    {
        if (category::where('meta_title', $meta_title)->exists()) {
            $category  = category::where('meta_title', $meta_title)->first();
            $products = Product::where('cate_id', $category->id)->where('status', '0')->get();
            return view('frontend.products.index', compact('category', 'products'));
        } else {
            return redirect('/')->with('status', "meta_title does not exists");
        }
    }
    public function productview($cate_meta_title, $prod_meta_title)
    {
        if (category::where('meta_title', $cate_meta_title)->exists()) 
        {
            if (Product::where('meta_title', $prod_meta_title)->exists()) 
            {
                $products = Product::where('meta_title', $prod_meta_title)->first();
                return view('frontend.products.view', compact('products'));
                return view('frontend.products.view', compact('products', 'ratings', 'rating_value', 'reviews', 'user_rating'));
            } else {
                return redirect('/')->with('status', "The Link Was Broken");
            }
        } else {
            return redirect('/')->with('status', "No Such Category Found");
        }
    }
}

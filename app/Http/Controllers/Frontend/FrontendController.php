<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::where('status', '0')->get();
        $trendingProduct = Product::where('trending', '1')->latest()->take(15)->get();
        return view('frontend.index', compact('sliders', 'trendingProduct'));
    }

    public function newArrival()
    {
     $newArrivalsProducts = Product::latest()->take(16)->get();
     return view('frontend.pages.new-arrival', compact('newArrivalsProducts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function categories()
    {
        $categories = Category::where('status', '0')->get();
        return view('frontend.collections.category.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function products($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            return view('frontend.collections.products.index', compact('category'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function productView(string $category_slug, $product_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {

            $product = $category->products()->where('slug', $product_slug)->where('status', '0')->first();
            if ($product) {
                return view('frontend.collections.products.view', compact('product', 'category'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

   public function thankyou()
   {
    return view('frontend.thank-you');
   }


}

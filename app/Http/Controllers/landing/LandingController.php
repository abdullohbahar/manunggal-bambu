<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all()->take(6);
        return view('landing.landing', compact('products'));
    }

    public function publicProduct()
    {
        $active = "product";
        $products = Product::paginate(9);

        return view('landing.product.index', compact('active', 'products'));
    }

    public function publicDetailProduct($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $images = Image::where('product_slug', $slug)->get();
        $randProduct = Product::inRandomOrder()->limit(6)->get();

        return view('landing.product.detail', compact('product', 'images', 'randProduct'));
    }
}

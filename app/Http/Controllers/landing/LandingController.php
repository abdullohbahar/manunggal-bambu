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
        $metaContent = "Kerajinan Bambu Yogyakarta | Kerajinan Bambu Gunungkidul | Kerajinan Bambu | Jual Kerajinan Bambu | Mainan Bambu | Mainan Tradisional Dari Bambu";
        return view('landing.landing', compact('products', 'metaContent'));
    }

    public function publicProduct()
    {
        $active = "product";
        $products = Product::paginate(9);
        $metaContent = "Kerajinan Bambu Yogyakarta | Kerajinan Bambu Gunungkidul | Kerajinan Bambu | Jual Kerajinan Bambu | Mainan Bambu | Mainan Tradisional Dari Bambu";


        return view('landing.product.index', compact('active', 'products', 'metaContent'));
    }

    public function publicDetailProduct($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $images = Image::where('product_slug', $slug)->get();
        $randProduct = Product::inRandomOrder()->limit(6)->get();
        $metaContent = $product->nama_produk . " | " . $product->nama_produk . " Bambu | Kerajinan Bambu | Jual Kerajinan Bambu | Mainan Bambu | Mainan Tradisional Dari Bambu";

        return view('landing.product.detail', compact('product', 'images', 'randProduct', 'metaContent'));
    }
}

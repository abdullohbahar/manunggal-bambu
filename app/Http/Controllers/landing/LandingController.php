<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
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
}

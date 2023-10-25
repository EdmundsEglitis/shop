<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function view(){
        $products = Product::all();
        //dd($products);
        return view("products", ["products" => $products]);
    }
}

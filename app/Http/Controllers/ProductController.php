<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        //dd($products);
        return view("products.index", ["products" => $products]);
    }

    public function create() {
        return view("products.create");
    }

    public function store(Request $request, Product $product) {

        $validatedData = $request->validate(
            [
                "name" => ["required", "min:5", "max:50"],
                "description" => ["required", "min:5", "max:255"],
                "price" => ["required", "numeric"],
                "imageURL" => ["required", "image", "max:10240"],
            ]
        );

        $product->name=$request->name;
        $product->description=$request->description;
        $product->price=$request->price;

        $image = $request ->file('imageURL');
        $fileName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images'), $fileName);

        $product->imageURL = "./images/".$fileName;
        //$product->imageURL=$request->imageURL;

        $product->save();
   }
}

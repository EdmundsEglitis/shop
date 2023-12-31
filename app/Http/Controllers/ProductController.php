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

        $product->imageURL = "/images/".$fileName;
        //$product->imageURL=$request->imageURL;

        $product->save();
   }

   public function show(Request $request, $id) {
        $product = Product::find($id);
        if ($product){
            return view("products.show", ["product" => $product]);
        }

        return redirect("/products");
   }

   public function edit($id){
        $product = Product::find($id);
        if ($product){
            return view("products.edit", ["product" => $product]);
        }

        return redirect("/products");
   }
   public function update(Request $request, $id){
        $product= Product::find($id);
        $request->validate(
            [
                "name" => ["required", "min:5", "max:50"],
                "description" => ["required", "min:5", "max:255"],
                "price" => ["required", "numeric"],
            ]
        );
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
        return redirect("/products/$id");
   }
   public function destroy($id){
       $product = Product::find($id);
       $product->delete();
       return redirect("/products/{$id}");
   }

}


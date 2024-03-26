<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductApiController extends Controller
{
    //Select : GET
    //Insert : POST
    //Delete : DELETE
    //Update : PUT/PATCH

    //Get A Product
    public function get(Request $request ,$id){
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    //Get All Products
    public function all(Request $request){
        $products = Product::all();
        return response()->json($products);
    }

    //Save a Product
    public function store(Request $request){
        $product = Product::create($request->all());
        return response()->json($product);
    }

    //Update a Product 
    public function update(Request $request, $id){
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return response()->json($product);
    }

    //Delete a Product
    public function destroy(Request $request, $id){
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['message'=>'Deleted Successfully']);
    }
}

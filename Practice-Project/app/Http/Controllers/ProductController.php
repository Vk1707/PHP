<?php

namespace App\Http\Controllers;

use App\Events\InsertEvent;
use App\Mail\NewProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{
    public function addProductForm(Request $req){
        return view('addproducts');
    }

    public function addProduct(Request $req){

        //Validating Data
        $validated = $req->validate([
            'Pname' => 'required|max:10',
            'Pcategory' => 'required',
            'Pprice' => 'required|numeric'
        ]);

        // // save data in database
        // $data = $req->all();
        // $product = Product::create($data);

        $product=new Product();
        $product->Pname=$req->Pname;
        $product->Pcategory=$req->Pcategory;
        $product->Pprice=$req->Pprice;
        $product->save();

        Mail::to("vivekmahto1707@gmail.com")
        ->send(new NewProduct($product));
               
        event(new InsertEvent(['name'=>$product->Pname]));
            
        return redirect()->route('productlist');
    }

    public function allProducts(Request $req){

    // Fetch all records
        $products = Product::all();
        return view('productlist', compact('products'));
    }

    public function deleteProduct(Request $request, $id){

        $product = Product::find($id);
        $product->delete();

        return redirect()->route('productlist');
    }

    public function updateProductForm(Request $req, $id)
    {
        $product = Product::find($id);
        return view('update-product',compact('product'));
    }
    
    public function updateProduct(Request $req, $id){

        $validated = $req->validate([
            'Pname' => 'required|max:20',
            'Pcategory' => 'required|max:20',
            'Pprice' => 'required|numeric'
        ]);

        $data = Arr::except($req->all(), ['_token']);
        $product = Product::updateOrCreate(['id'=>$id], $data);


        return redirect()->route('productlist');
        // return response('Product Updated Succefully');
    }

    
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function addProductForm(Request $request){
        $categories = Category::all();
        return view('product.add-product', compact('categories'));
    }


    public function addProduct(Request $request){
        //Method 1
        // Product::create([
        //     'name'=>'Galaxy S21',
        //     'category'=>'Smart Phone',
        //     'price'=>56000,
        //     'image'=>''
        // ]);

        //Method 2
        // $product=new Product();
        // $product->name='Apple Iphone 14';
        // $product->category='Smart Phone';
        // $product->price=78000;
        // $product->image='';
        // $product->save();

        // return response("Record Added Successfully");

        //Method 3

        //Validating Data
        $validated = $request->validate([
            'name' => 'required|max:10',
            'category_id' => 'required',
            'price' => 'required|numeric'
        ]);

        // $product=new Product();
        // $product->name=$request->name;
        // $product->category_id=$request->category_id;
        // $product->price=$request->price;
        // $product->image=$request->image;
        // $product->save();

        $data = Arr::except($request->all(), ['_token','image']);
        $product = Product::create($data);

        foreach($request->images as $productImage){
            //$productImage = $request->image;
            $fileName = uniqid() . '-' . $productImage->getClientOriginalName();
            Storage::disk('public')->put($fileName, file_get_contents($productImage));
            
            $data = [];
            $data['url'] = $fileName;
            $data['thumbnail'] = 0;

            $product->images()->create($data);
        }

        return redirect()->route('all-products');

    }

    public function allProducts(Request $request){
        //Eloquent Queries

            //1. Find a record by id
            //$product = Product::find(1);

            //2. Find a record by where query
            //$product = Product::where('name','Galaxy S22')->firstOrNull();

            //3. Find all records by where query
            //$products = Product::where('name','Galaxy S22')->get();

            //4. Fetch only selected fields
            //$products = Product::select('name','price')->get();

            //5. Find selected fields with matching criteria
            //$products = Product::where('name','Galaxy S22')->select('name','price')->get();

            //6. Fetch records using multiple conditions
            //$products = Product::where('category','Smart Phone')->where('price','>',50000)->get();

            //7. Fetch records using multiple conditions
            //$products = Product::where('category','Smart Phone')->whereOr('category','Tablet')->get();

    

    //8. Fetch all records
        $products = Product::all();
        return view('product.all-products', compact('products'));
    }

    public function updateProductForm(Request $request, $id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('product.update-product',compact('product','categories'));
    }

    public function updateProduct(Request $request, $id){
        //Method 1
        // $product = Product::find(2);
        // $product->update([
        //     'price'=>99999
        // ]);

        //Method 1
        // $product = Product::find(2);
        // $product->price=79999;
        // $product->save();

        $validated = $request->validate([
            'name' => 'required|max:10',
            'category_id' => 'required|numeric',
            'price' => 'required|numeric'
        ]);

        $data = Arr::except($request->all(), ['_token','image']);
        $product = Product::updateOrCreate(['id'=>$id], $data);

        //Save Image in Image table
        foreach($request->images as $productImage){
            //$productImage = $request->image;
            $fileName = uniqid() . '-' . $productImage->getClientOriginalName();
            Storage::disk('public')->put($fileName, file_get_contents($productImage));
            
            $data = [];
            $data['url'] = $fileName;
            $data['thumbnail'] = 0;

            $product->images()->create($data);
        }

        return redirect()->route('all-products');
        // return response('Product Updated Succefully');
    }

    public function deleteProduct(Request $request, $id){

        //Method 1
        // $product = Product::find(2);
        // $product->delete();

        //Method 2
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('all-products');
    }
}

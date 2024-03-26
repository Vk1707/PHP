<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function addCategoryForm(Request $request)
    {
        return view('product.add-category');
    }

    public function addCategory(Request $request)
    {
        // Method 1
        // $category=new Category();
        // $category->name='Smartphone';
        // $category->description='Smartphone Category is here';
        // $category->image='';
        // $category->save();

        // return response("Category Record Added Successfully");

        // Method 2
        // $validated = $request->validate([
        //     'name' => 'required|max:10',
        //     'description' => 'required|max:250',
        //     'image' => 'file|size:512',
        // ]);

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:10',
            'description' => 'required|max:250',
            'image' => 'file|size:512',
        ], [
            'required' => 'The :attribute field is required. (Custom Message)',
            'file' => 'The : attribute is must be image'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $request->image;
        $category->save();

        return response("Category Record Added Successfully");
    }

    public function allCategories(Request $request)
    {
        //Fetch all records
        $categories = Category::all();
        return view('category.all-categories', compact('categories'));
    }

    public function updateCategory(Request $request)
    {
        //Method 1
        $category = Category::find(2);
        $category->price = 79999;
        $category->save();

        return response('Category Updated Succefully');
    }

    public function deleteCategory(Request $request, $id)
    {

        //Method 1
        $category = Category::find($id);
        foreach($category->products as $product){
            $product->delete();
        }
        $category->delete();

        return redirect()->route('all-categories');
    }
}

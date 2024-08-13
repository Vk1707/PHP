<?php

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

//Routes with closure functions.

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/account', function(){
//     return view('account');
// })->middleware('auth');

// Route::get('/contact', function(){
//     return view('contact');
// });


//Routes with Controllers
Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('account', [HomeController::class, 'account'])->name('account')->middleware('auth');

Route::get('contact', [HomeController::class, 'contact'])->name('contact');

Route::get('test', [HomeController::class, 'test'])->name('test');

Route::get('login', [HomeController::class, 'login'])->name('login');

Route::get('add-product', [ProductController::class, 'addProductForm'])->name('add-product-form');
Route::post('add-product', [ProductController::class, 'addProduct'])->name('add-product');

Route::get('update-product/{id}', [ProductController::class, 'updateProductForm'])->name('update-product-form');
Route::post('update-product/{id}', [ProductController::class, 'updateProduct'])->name('update-product');

Route::get('delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('delete-product');

Route::get('add-category', [CategoryController::class, 'addCategoryForm'])->name('add-category-form');
Route::post('add-category', [CategoryController::class, 'addCategory'])->name('add-category');

Route::get('delete-category/{id}', [CategoryController::class, 'deleteCategory'])->name('delete-category');

Route::get('update-category/{id}', [CategoryController::class, 'updateCategoryForm'])->name('update-category-form');
Route::post('update-category/   {id}', [CategoryController::class, 'updateCategory'])->name('update-category');

Route::get('all-products', [ProductController::class, 'allProducts'])->name('all-products');

Route::get('all-categories', [CategoryController::class, 'allCategories'])->name('all-categories');

Route::get('my-image', function(){
    // echo Storage::disk('public')->exists('boatbt1.jpg');
    // echo Storage::disk('public')->get('boatbt.jpg');
    // echo Storage::disk('public')->download('boatbt.jpg');
    // echo Storage::disk('public')->url('boatbt.jpg');
});
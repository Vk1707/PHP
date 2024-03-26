<?php

use App\Http\Controllers\BroadcastingController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserAuthController;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', function () {
    return view('welcome');
});


Route::middleware('visitor')->prefix('admin')->group(function(){
    Route::get('addproduct', [ProductController::class, 'addProductForm'])->name('addproductform')->middleware('visitor');
    Route::post('addproduct', [ProductController::class, 'addProduct'])->name('addproduct');

    Route::get('productlist', [ProductController::class, 'allProducts'])->name('productlist');
    Route::get('delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('delete-product');

    Route::get('update-product/{id}', [ProductController::class, 'updateProductForm'])->name('update-product-form');
    Route::post('update-product/{id}', [ProductController::class, 'updateProduct'])->name('update-product');
});


//Cookie
Route::get('cookie-demo', [CookieController::class, 'cookieDemo'])->name('cookie-demo');
Route::post('add-cookie', [CookieController::class, 'addCookie'])->name('add-cookie');
Route::get('delete-cookie/{name}', [CookieController::class, 'deleteCookie'])->name('delete-cookie');

// Session
// Route::view('login', [UserAuthController::class, 'login'])->name('login');
// Route::post('user', [UserAuthController::class, 'login'])->name('login');

Route::view('profile','profile');
// Route::post('user', [UserAuth::class,'login']);

// Route::get('/login', function () {
// });

Route::get('/logout', function () {
    if(session()->has('user')){
       session()->forget('user'); 
    }
    return redirect('login');
});

Route::get('/welcome-mail', function(){


    Mail::to("vivekmahto1707@gmail.com")
    ->send(new WelcomeMail());

    return "Mail Sent Successfully";
});

Route::get('subscribe', [BroadcastingController::class, 'subscribe']);
Route::get('broadcast', [BroadcastingController::class, 'broadcast']);

Route::get('admin-subscribe', [BroadcastingController::class, 'adminsubscribe']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

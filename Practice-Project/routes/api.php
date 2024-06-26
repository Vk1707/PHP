<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/product/{id}", [ProductApiController::class, "get"]);
Route::get("products", [ProductApiController::class, "all"]);
Route::post("product", [ProductApiController::class, "store"]);
Route::put("/product/{id}", [ProductApiController::class, "update"]);
Route::delete("/product/{id}", [ProductApiController::class, "destroy"]);

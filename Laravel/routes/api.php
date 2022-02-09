<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SubcategoryController;

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
/**Routing Category */
Route::get('/categories',[CategoryController::class,'index']);
Route::post('/categories',[CategoryController::class,'store']);
Route::get('/categories/{category}',[CategoryController::class,'show']);
Route::put('/categories/{category}',[CategoryController::class,'update']);
Route::delete('/categories/{category}',[CategoryController::class,'delete']);

/**Routing Admin */
Route::get('/admins',[AdminController::class,'index']);
Route::post('/admins',[AdminController::class,'store']);
Route::get('/admins/{admin}',[AdminController::class,'show']);
Route::put('/admins/{admin}',[AdminController::class,'update']);
Route::delete('/admins/{admin}',[AdminController::class,'delete']);

/**Routing SubCategory */
Route::get('/subcategories',[SubcategoryController::class,'index']);
Route::post('/subcategories',[SubcategoryController::class,'store']);
Route::get('/subcategories/{subcategory}',[SubcategoryController::class,'show']);
Route::put('/subcategories/{subcategory}',[SubcategoryController::class,'update']);
Route::delete('/subcategories/{subcategory}',[SubcategoryController::class,'delete']);

/**Routing Favorite */
Route::get('/favorites',[FavoriteController::class,'index']);
Route::post('/favorites',[FavoriteController::class,'store']);
Route::get('/favorites/{favorite}',[FavoriteController::class,'show']);
Route::put('/favorites/{favorite}',[FavoriteController::class,'update']);
Route::delete('/favorites/{favorite}',[FavoriteController::class,'delete']);

/**Routing Order */
Route::get('/orders',[OrderController::class,'index']);
Route::post('/orders',[OrderController::class,'store']);
Route::get('/orders/{order}',[OrderController::class,'show']);
Route::put('/orders/{order}',[OrderController::class,'update']);
Route::delete('/orders/{order}',[OrderController::class,'delete']);

/**Routing product */
Route::get('/products',[ProductController::class,'index']);
Route::post('/products',[ProductController::class,'store']);
Route::get('/products/{product}',[ProductController::class,'show']);
Route::put('/products/{product}',[ProductController::class,'update']);
Route::delete('/products/{product}',[ProductController::class,'delete']);

/**Routing carts */
Route::get('/carts',[CartController::class,'index']);
Route::post('/carts',[CartController::class,'store']);
Route::get('/carts/{cart}',[CartController::class,'show']);
Route::put('/carts/{cart}',[CartController::class,'update']);
Route::delete('/carts/{cart}',[CartController::class,'delete']);


/**Routing customers */
Route::get('/customers',[CustomerController::class,'index']);
Route::post('/customers',[CustomerController::class,'store']);
Route::get('/customers/{customer}',[CustomerController::class,'show']);
Route::put('/customers/{customer}',[CustomerController::class,'update']);
Route::delete('/customers/{customer}',[CustomerController::class,'delete']);

/**Routing ratings */
Route::get('/ratings',[RatingController::class,'index']);
Route::post('/ratings',[RatingController::class,'store']);
Route::get('/ratings/{rating}',[RatingController::class,'show']);
Route::put('/ratings/{rating}',[RatingController::class,'update']);
Route::delete('/ratings/{rating}',[RatingController::class,'delete']);

/**Routing store */
Route::get('/stores',[StoreController::class,'index']);
Route::post('/stores',[StoreController::class,'store']);
Route::get('/stores/{store}',[StoreController::class,'show']);
Route::put('/stores/{store}',[StoreController::class,'update']);
Route::delete('/stores/{store}',[StoreController::class,'delete']);

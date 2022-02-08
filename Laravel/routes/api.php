<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Sub_CategoryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\OrderController;


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
Route::get('/subcategories',[Sub_CategoryController::class,'index']);
Route::post('/subcategories',[Sub_CategoryController::class,'store']);
Route::get('/subcategories/{sub_category}',[Sub_CategoryController::class,'show']);
Route::put('/subcategories/{sub_category}',[Sub_CategoryController::class,'update']);
Route::delete('/subcategories/{sub_category}',[Sub_CategoryController::class,'delete']);

/**Routing Favorite */
Route::get('/favorites',[FavoriteController::class,'index']);
Route::post('/favorites',[FavoriteController::class,'store']);
Route::get('/favorites/{sub_category}',[FavoriteController::class,'show']);
Route::put('/favorites/{sub_category}',[FavoriteController::class,'update']);
Route::delete('/favorites/{sub_category}',[FavoriteController::class,'delete']);

/**Routing Order */
Route::get('/orders',[OrderController::class,'index']);
Route::post('/orders',[OrderController::class,'store']);
Route::get('/orders/{order}',[OrderController::class,'show']);
Route::put('/orders/{order}',[OrderController::class,'update']);
Route::delete('/orders/{order}',[OrderController::class,'delete']);

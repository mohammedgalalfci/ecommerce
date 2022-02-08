<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;

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

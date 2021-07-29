<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::post('login',[AuthController::class,'login']);
Route::post('register',[AuthController::class,'register']);

// Only Logged in user can see our product

Route::group(['middleware' => ['auth:sanctum']],function(){
    Route::get('products/search',[ProductController::class,'search']);
    Route::resource('products',ProductController::class);
    Route::resource('categories',CategoryController::class);
    Route::post('logout',[AuthController::class,'logout']);
    Route::resource('invoice',InvoiceController::class);

    Route::post('profileupdate',[AuthController::class,'update']);
});
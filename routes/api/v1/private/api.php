<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CatalogueController;


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

//
//Route::middleware('auth:sanctum')->group(function () {
//    Route::get('logout',[AuthController::class, 'logout']);
//});
// Products
Route::get('products', [ProductController::class, 'index']);
Route::get('products/{product}', [ProductController::class, 'show']);
Route::post('products', [ProductController::class, 'store']);
Route::put('products/{product}', [ProductController::class, 'update']);
Route::delete('products/{product}', [ProductController::class, 'destroy']);

// Catalogue
Route::get('catalogues', [CatalogueController::class, 'index']);

// cars
Route::get('cars', [CarController::class, 'index']);
Route::get('cars/{car}', [CarController::class, 'show']);
Route::post('cars', [CarController::class, 'store']);
Route::put('cars/car}', [CarController::class, 'update']);
Route::delete('cars/car}', [CarController::class, 'destroy']);

// Sale
Route::get('cars', [SaleController::class, 'index']);
Route::get('cars/{car}', [SaleController::class, 'show']);
Route::post('cars', [SaleController::class, 'store']);

// User
Route::get('users', [UserController::class, 'index']);
Route::get('users/{user}', [UserController::class, 'show']);
Route::put('users/user}', [UserController::class, 'update']);
Route::delete('users/user}', [UserController::class, 'destroy']);

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\AuthController;
use App\Models\User;


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


Route::middleware('auth:sanctum')->group(function () {

    Route::group(['middleware' => ['role:admin']], function () {
        Route::post('products', [ProductController::class, 'store']);
        Route::put('products/{product}', [ProductController::class, 'update']);
        Route::delete('products/{product}', [ProductController::class, 'destroy']);

        Route::get('users', [UserController::class, 'index']);
    });
        Route::get('products', [ProductController::class, 'index']);
        // Products
        Route::get('products/{product}', [ProductController::class, 'show']);
        Route::get('products-male', [ProductController::class, 'productMale']);
        Route::get('products-female', [ProductController::class, 'productFemale']);
        Route::get('products', [ProductController::class, 'index']);

        // Catalogue
        Route::get('gender-catalogues', [CatalogueController::class, 'getGender']);
        Route::get('category-catalogues', [CatalogueController::class, 'getCategory']);
        Route::get('color-catalogues', [CatalogueController::class, 'getColor']);
        Route::get('size-catalogues', [CatalogueController::class, 'getSize']);
        // cars
        Route::get('cars', [CarController::class, 'index']);
        Route::get('cars/{car}', [CarController::class, 'show']);
        Route::post('cars', [CarController::class, 'store']);
        Route::put('cars/{car}', [CarController::class, 'update']);
        Route::delete('cars/{car}', [CarController::class, 'destroy']);

        // Sale
        Route::get('sales', [SaleController::class, 'index']);
        Route::get('sales-user', [SaleController::class, 'salesByUser']);
        Route::get('sales/{sale}', [SaleController::class, 'show']);
        Route::post('sales', [SaleController::class, 'store']);

        // User
        Route::get('users', [UserController::class, 'index']);
        Route::get('users-profile', [UserController::class, 'show']);
        Route::put('users/{user}', [UserController::class, 'update']);
        Route::delete('users/{user}', [UserController::class, 'destroy']);

        // Chat
        Route::post('messages', [ChatController::class, 'message']);


    Route::get('logout',[AuthController::class, 'logout']);
});




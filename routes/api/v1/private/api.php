<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteController;



Route::middleware('auth:sanctum')->group(function () {

    Route::group(['middleware' => ['role:admin']], function () {
        Route::post('products', [ProductController::class, 'store']);
        Route::put('products/{product}', [ProductController::class, 'update']);
        Route::delete('products/{product}', [ProductController::class, 'destroy']);
        Route::get('sales', [SaleController::class, 'index']);
        Route::get('users', [UserController::class, 'index']);
    });
        Route::get('products', [ProductController::class, 'index']);
        // Products
        Route::get('products/{product}', [ProductController::class, 'show']);
        Route::get('products-software', [ProductController::class, 'productSoftware']);
        Route::get('products-marketing', [ProductController::class, 'productMarketing']);
        Route::get('products', [ProductController::class, 'index']);

        // favorites
        Route::get('favorites', [FavoriteController::class, 'index']);
        Route::post('favorites', [FavoriteController::class, 'store']);
        Route::delete('favorites/{favorite}', [FavoriteController::class, 'destroy']);

        // Catalogue
        Route::get('carrer-catalogues', [CatalogueController::class, 'getCarrer']);
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
        Route::get('sales-user', [SaleController::class, 'salesByUser']);

        Route::get('sales/{sale}', [SaleController::class, 'show']);
        Route::get('sales-create', [SaleController::class, 'store']);
        // User
        Route::get('users', [UserController::class, 'index']);
        Route::get('users-profile', [UserController::class, 'show']);
        Route::put('users-update', [UserController::class, 'update']);
        Route::delete('users/{user}', [UserController::class, 'destroy']);
        // Chat
        Route::post('messages', [ChatController::class, 'message']);
    Route::get('logout',[AuthController::class, 'logout']);
});

Route::get('download-sales/{sale}', [SaleController::class, 'downloadSale']);
Route::put('users-admin/{user}', [UserController::class, 'assignRoleAdmin']);
Route::put('users-client/{user}', [UserController::class, 'revokeRoleAdmin']);




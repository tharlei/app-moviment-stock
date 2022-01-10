<?php

use App\Core\Http\Controllers\API\Product\ProductController;
use App\Core\Http\Controllers\API\ProductStockMovement\ProductStockMovementController;
use App\Core\Http\Controllers\API\SkuStockMovementController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return response()->json(config('app.name'));
});

Route::post('/products', [ProductController::class, 'store'])->name('product.store');

Route::resource('/product-stock-movements', ProductStockMovementController::class)->only('index', 'store');
Route::get('sku/{sku}/stock-movements', [SkuStockMovementController::class, 'show'])->name('sku.stock.movements.show');

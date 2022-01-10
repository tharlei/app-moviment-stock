<?php

use App\Admin\Http\Controllers\API\ProductSkuController;
use Illuminate\Support\Facades\Route;

Route::get('/products/skus', [ProductSkuController::class, 'index'])->name('product.index');

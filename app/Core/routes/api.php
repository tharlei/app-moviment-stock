<?php

use App\Core\Http\Controllers\API\Product\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return response()->json(config('app.name'));
});

Route::resource('/products', ProductController::class)->except('create', 'edit');

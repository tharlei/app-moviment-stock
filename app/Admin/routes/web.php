<?php

use App\Admin\Http\Controllers\Web\VueController;
use Illuminate\Support\Facades\Route;

Route::get('/', [VueController::class, 'index']);
Route::get('/{any}', [VueController::class, 'index'])->where('any', '.*');

<?php

namespace App\Core\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
  public function index(): JsonResponse
  {
    return response()->json();
  }
}

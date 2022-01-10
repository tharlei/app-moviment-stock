<?php

namespace App\Admin\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Modules\Product\Queries\ListAllSkuQuery;
use Illuminate\Http\JsonResponse;

class ProductSkuController extends Controller
{
    private ListAllSkuQuery $listAllSkuQuery;

    public function __construct(
        ListAllSkuQuery $listAllSkuQuery
    ) {
        $this->listAllSkuQuery = $listAllSkuQuery;
    }

    public function index(): JsonResponse
    {
        $skus = $this->listAllSkuQuery->execute();

        return response()->json($skus);
    }
}

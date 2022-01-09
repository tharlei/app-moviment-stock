<?php

namespace App\Core\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Modules\ProductStockMovement\Queries\ListStockMovement\ListStockMovementOfSkuQuery;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class SkuStockMovementController extends Controller
{
    private ListStockMovementOfSkuQuery $listStockMovementOfSkuQuery;

    public function __construct(
        ListStockMovementOfSkuQuery $listStockMovementOfSkuQuery
    ) {
        $this->listStockMovementOfSkuQuery = $listStockMovementOfSkuQuery;
    }

    public function show(string $sku): JsonResponse
    {
        $movements = Cache::remember("sku-{$sku}-stock-movements", 60 * 20, function () use ($sku) {
            return $this->listStockMovementOfSkuQuery->execute($sku);
        });

        return response()->json($movements, 200);
    }
}

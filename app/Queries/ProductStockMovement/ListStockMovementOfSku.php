<?php

namespace App\Queries\ProductStockMovement;

use App\Models\ProductStockMovement as ProductStockMovementModel;
use App\Modules\ProductStockMovement\Queries\ListStockMovement\ListStockMovementOfSkuQuery;
use App\Modules\ProductStockMovement\Queries\ListStockMovement\StockMovementData;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class ListStockMovementOfSku implements ListStockMovementOfSkuQuery
{
    private ProductStockMovementModel $productStockMovementModel;

    public function __construct(
        ProductStockMovementModel $productStockMovementModel
    ) {
        $this->productStockMovementModel = $productStockMovementModel;
    }

    public function execute(string $sku): Collection
    {
        $productStockMovements = $this->productStockMovementModel
            ->where('sku', $sku)
            ->orderBy('created_at', 'DESC')
            ->get();

        return $productStockMovements->map(function(ProductStockMovementModel $productStockMovement) {
            return new StockMovementData(
                $productStockMovement->amount,
                $productStockMovement->is_add ? '+' : '-',
                (new Carbon($productStockMovement->created_at))->format('d/m/Y H:i:s')
            );
        });
    }
}

<?php

namespace App\Queries\ProductStockMovement;

use App\Models\ProductStockMovement as ProductStockMovementModel;
use App\Modules\ProductStockMovement\Queries\ListStockMovement\ListStockMovementData;
use App\Modules\ProductStockMovement\Queries\ListStockMovement\ListStockMovementQuery;
use App\Modules\ProductStockMovement\Queries\ListStockMovement\StockMovementData;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class ListStockMovement implements ListStockMovementQuery
{
    private ProductStockMovementModel $productStockMovementModel;

    public function __construct(
        ProductStockMovementModel $productStockMovementModel
    ) {
        $this->productStockMovementModel = $productStockMovementModel;
    }

    public function execute(bool $paginator = false): ListStockMovementData
    {
        $productStockMovements = $this->productStockMovementModel
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        $productStockMovements = new ListStockMovementData(
            $productStockMovements->map(function(ProductStockMovementModel $productStockMovement) {
                return new StockMovementData(
                    $productStockMovement->sku,
                    $productStockMovement->amount,
                    $productStockMovement->is_add ? '+' : '-',
                    (new Carbon($productStockMovement->created_at))->format('d/m/Y H:i:s')
                );
            }),
            $paginator ? $productStockMovements : null,
        );

        return $productStockMovements;
    }
}

<?php

namespace App\Queries\ProductStockMovement;

use App\Models\ProductStockMovement as ProductStockMovementModel;
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

    public function execute(): Collection
    {
        $productStockMovements = $this->productStockMovementModel
            ->orderBy('created_at', 'DESC')
            ->paginate(15);

        return $productStockMovements->map(function(ProductStockMovementModel $productStockMovement) {
            return new StockMovementData(
                $productStockMovement->amount,
                $productStockMovement->is_add ? '+' : '-',
                (new Carbon($productStockMovement->created_at))->format('d/m/Y H:i:s')
            );
        });
    }
}

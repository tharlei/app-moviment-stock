<?php

namespace App\Modules\ProductStockMovement\Queries\ListStockMovement;

use Illuminate\Support\Collection;

interface ListStockMovementOfSkuQuery
{
    public function execute(string $sku): Collection;
}

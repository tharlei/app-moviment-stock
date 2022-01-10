<?php

namespace App\Modules\ProductStockMovement\Queries\ListStockMovement;

interface ListStockMovementQuery
{
    public function execute(): ListStockMovementData;
}

<?php

namespace App\Modules\ProductStockMovement\Queries\ListStockMovement;

use Illuminate\Support\Collection;

interface ListStockMovementQuery
{
    public function execute(): Collection;
}

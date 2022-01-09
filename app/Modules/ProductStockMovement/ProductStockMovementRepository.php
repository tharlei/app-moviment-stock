<?php

namespace App\Modules\ProductStockMovement;

use App\Modules\ProductStockMovement\Domain\ProductStockMovement;

interface ProductStockMovementRepository
{
    public function persist(ProductStockMovement $productStockMovement): void;
}

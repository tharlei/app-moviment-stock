<?php

namespace App\Modules\ProductStockMovement\Queries\ListStockMovement;

class StockMovementData
{
    public string $sku;
    public int $amount;
    public string $operation;
    public string $createdAt;

    public function __construct(
        string $sku,
        int $amount,
        string $operation,
        string $createdAt
    ) {
        $this->sku = $sku;
        $this->amount = $amount;
        $this->operation = $operation;
        $this->createdAt = $createdAt;
    }
}

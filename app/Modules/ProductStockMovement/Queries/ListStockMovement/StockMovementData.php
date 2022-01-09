<?php

namespace App\Modules\ProductStockMovement\Queries\ListStockMovement;

class StockMovementData
{
    public int $amount;
    public string $operation;
    public string $createdAt;

    public function __construct(
        int $amount,
        string $operation,
        string $createdAt
    ) {
        $this->amount = $amount;
        $this->operation = $operation;
        $this->createdAt = $createdAt;
    }
}
